<?php

namespace App\Services\Admin;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleService {

    function updateRole(Request $request, Role $role) {
        $role->update([
            'description'  =>  $request['description'],
        ]);
    }
}
