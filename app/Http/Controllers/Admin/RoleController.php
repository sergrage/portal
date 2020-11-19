<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;

use App\Services\Admin\RoleService;

use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    protected $service;

    function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
    	$roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function store(CreateRequest $request) {

        $this->service->createRole($request);
        return redirect()->route('administrator.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $this->service->createRole($request, $role);
    	return redirect()->route('administrator.roles.index');
    }


    public function destroy(Role $role)
    {
    	$role->delete();
        return redirect()->route('administrator.roles.index');
    }
}
