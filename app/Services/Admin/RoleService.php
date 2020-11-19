<?php

namespace App\Services\Admin;
use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleService {

    function createRole(CreateRequest $request) {
        $role = Role::create([
            'roleName'  =>  $request['roleName'],
            'description'  =>  $request['description'],
        ]);
        $roleAdmin = Role::where('roleName', 'admin')->first();
        $users = $roleAdmin->users;
        foreach($users as $user ) {
            $user->roles()->attach($role->id);
        }
    }

    function updateRole(UpdateRequest $request, Role $role) {
        $role->update([
            'roleName'  =>  $request['roleName'],
            'description'  =>  $request['description'],
        ]);
    }
}
