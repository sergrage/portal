<?php

namespace App\Services\Admin;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserService {

    function createUser(CreateRequest $request) {
        $roles_id = $this->rolesIds($request);
        $user = User::create([
            'name'  =>  $request['name'],
            'email' =>  $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->roles()->sync($roles_id);
    }

    function updateUser(UpdateRequest $request, User $user) {
        $user->update($request->only(['name', 'email']));
        $user->roles()->sync($this->rolesIds($request));
    }

    public function rolesIds(Request $request)
    {
        $roles_id = [];
        if($request->input('roles')) {
            foreach($request->input('roles') as $roleName) {
                $role = Role::where('roleName', $roleName)->first();
                $roles_id[] = $role->id;
            }
        }
        return $roles_id;
    }
}
