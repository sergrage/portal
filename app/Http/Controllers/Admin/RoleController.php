<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;

use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
    	$roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request) {

        $role = Role::create([
            'roleName'  =>  $request['roleName'],
            'description'  =>  $request['description'],
       ]);

        $roleAdmin = Role::where('roleName', 'admin')->first();
        $users = $roleAdmin->users;

        foreach($users as $user ) {
            $user->roles()->attach($role->id);
        }
        return redirect()->route('administrator.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(UpdateRequest $request, Role $role)
    {
    	$role->update([
            'roleName'  =>  $request['roleName'],
            'description'  =>  $request['description'],
       ]);

    	return redirect()->route('administrator.roles.index');
    }


    public function destroy(Role $role)
    {
    	$role->delete();
        return redirect()->route('administrator.roles.index');
    }
}
