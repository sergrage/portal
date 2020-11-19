<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    protected $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
    	$users = User::with('roles')->get();
    	return view('admin.users.index', compact('users'));
    }

    public function store (CreateRequest $request)
    {
    	$this->service->createUser($request);
        return redirect()->route('administrator.users.index');
    }

    public function edit(User $user)
    {
    	$roles = Role::all();
    	return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $this->service->updateUser($request, $user);
        return redirect()->route('administrator.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('administrator.users.index');
    }
}
