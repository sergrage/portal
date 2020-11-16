<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserPasswordController extends Controller
{
    function update(Request $request, User $user) {

        $password = Hash::make($request['password']);

        $user->update([
            'password' => $password
        ]);

        return redirect()->route('administrator.users.index');
    }
}
