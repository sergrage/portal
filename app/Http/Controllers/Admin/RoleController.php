<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\RoleService;
use App\Models\Role;


class RoleController extends Controller
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
    	$roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $this->service->updateRole($request, $role);
    	return redirect()->route('administrator.roles.index');
    }
}
