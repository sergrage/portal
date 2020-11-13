<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
    	$roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {

    	$role = Role::create([
            'name'  =>  $request['name'],
            'description'  =>  $request['description'],
       ]);


    	return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
    	dd(123);
    }

    public function update(Request $request, Role $role)
    {
    	$role->update([
            'name'  =>  $request['name'],
       ]);

    	return redirect()->route('admin.roles.index');
    }


    public function destroy(Role $role)
    {
    	$role->delete();
        return redirect()->route('admin.roles.index');
    }
}
