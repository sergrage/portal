<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
        public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function store (CreateRequest $request)
    {
    	$roles_id = $this->rolesIds($request);

    	$user = User::create([
            'name'  =>  $request['name'],
            'email' =>  $request['email'],
            'password' => Hash::make($request['password']),
        ]);

    	$user->roles()->sync($roles_id);

        return redirect()->route('administrator.users.index');
    }

    public function edit(User $user)

    {
    	$roles = Role::all();
    	return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        $user->roles()->sync($this->rolesIds($request));
        return redirect()->route('administrator.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('administrator.users.index');
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
