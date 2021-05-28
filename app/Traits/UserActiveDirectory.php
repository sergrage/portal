<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use LdapRecord\Container;
use Carbon\Carbon;


trait UserActiveDirectory {
    public function ad($request) {
        $connection = $this->activeDirectoryConnection();
        $this->userIsInActiveDirectory($request, $connection);
    }
    // подключение к АД
    public function activeDirectoryConnection() {
        return Container::getDefaultConnection();
    }
    // проверк, есть ли User в АД
    public function userIsInActiveDirectory(Request $request, $connection)
    {

        $userActiveDirectoryName = $this->prepareUserName($request['accountName']);
        $userActiveDirectoryPassword = $request['activeDirectoryPassword'];
        $userActiveDirectoryAccount = $connection->
                                      query()->
                                      where('sAMAccountName', '=', $userActiveDirectoryName)->get();

        // есть ли user в АД. правильно ли указан аккаунт
        if(!$userActiveDirectoryAccount) {
            return redirect()->route('app')->with('accountName', 'Введены неправильные данные');
        }

        $distinguishedname = $userActiveDirectoryAccount[0]['distinguishedname'][0];

        // проверка авторизации в АД. Правильно ли указан пароль
        $userInActiveDirectory = $connection->auth()->attempt($distinguishedname, $userActiveDirectoryPassword);
        if(!$userInActiveDirectory) {
            return redirect()->route('app')->with('activeDirectoryPassword', 'Введен неправильный пароль');
        }

        $userFullName = $userActiveDirectoryAccount[0]['cn'][0];
        $userEmail =  Str::lower($userActiveDirectoryAccount[0]['mail'][0]);
        $userPassword = Hash::make($userEmail);
        $userGroups = $this->getUserRolesGroups($userActiveDirectoryAccount);

        if(!$userGroups) {
            return redirect()->route('app')->with('accountName', 'Вы не имеете доступа к порталу');
        }

        //  тут проверить есть юзер в БД сайта
        $userExist = $this->userExistInDatabase($userActiveDirectoryName);

        if($userExist) {
             $userExist->update([
                'lastLogin_at' => Carbon::now()->timestamp,
            ]);
            //  авторизация
            $request['email'] = $userExist->email;
            $request['password'] = $userExist->email;
        } else {

            $newUser = $this->createNewUser($userFullName, $userActiveDirectoryName, $userPassword, $userEmail, $userGroups);
            $request['email'] = $newUser->email;
            $request['password'] = $newUser->email;
        }
    }

    // обработка имени учетной записи
    public function prepareUserName($userName){
        $userNameLower = Str::lower($userName);
        $userLastname = ucfirst(Str::before($userNameLower, '.'));
        $userInitials = Str::upper(Str::after($userNameLower, '.'));
        return  $userLastname . '.' . $userInitials;
    }

    // находим и собираем в массив все группы пользователя из АД, связанные с сайтом
    public function getUserRolesGroups($userActiveDirectoryAccount){
        $userTechportalGroups = [];
        foreach( $userActiveDirectoryAccount[0]['memberof'] as $group) {
            if(Str::contains($group, 'Techportal')) {
                $group = Str::after($group, 'CN=');
                $firstCommaPosition = strpos($group, ',');
                $group = mb_substr($group, 0, $firstCommaPosition);
                $userTechportalGroups[] = $group;
            }
        }
        return $userTechportalGroups;
    }

    public function createNewUser($name, $account, $password, $email, $userTechportalGroups) {
        $user = User::create([
            'name'  =>  $name,
            'account' => $account,
            'email' =>  $email,
            'password' => $password,
            'lastLogin_at' => Carbon::now()->timestamp,
        ]);
        $roles_id = $this->userRoleId($userTechportalGroups);
        $user->roles()->sync($roles_id);

        return $user;
    }

    public function userRoleId($userTechportalGroups) {
        $roleId = [];
        foreach($userTechportalGroups as $group){
            $role = Role::where('roleName', $group)->first();
            if($role) {
                $roleId[] = $role->id;
            } else {
                $role = Role::create([
                    'roleName'  =>  $group,
                ]);
                $roleId[] = $role->id;
            }
        }
        return $roleId;
    }

    public function userExistInDatabase($account) {
         return User::where('account', $account)->first();
    }
}
