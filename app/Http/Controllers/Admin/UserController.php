<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    // public function create()
    // {
    // 	return view('admin.users.create');
    // }

//     public function edit(User $user)
//     {
//     	return view('admin.users.edit', compact('user'));
//     }

//     public function store (Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'name'  =>  'required|string|alpha_dash|max:255|min:6',
//             'email' =>  'required|email|string|max:255|unique:users',
//             'password' => ['required', 'string', 'min:8', 'confirmed'],
//         ]);

//         if ($validator->fails()) {

//             if($request['image']) {
//                 unlink($request['image']);
//             }

//             return redirect()->route('admin.users.create')
//                         ->withErrors($validator)
//                         ->withInput();
//         }

//     	$user = User::create([
//             'name'  =>  $request['name'],
//             'email' =>  $request['email'],
//             'password' => Hash::make($request['password']),
//             'image' => $request['image'],
//         ]);

//         return redirect()->route('admin.users.index');
//     }

//     public function update(Request $request, User $user)
//     {
//         $validator = Validator::make($request->all(), [
//             'name'  => 'required|string|alpha_dash|max:255|min:6',
//             'email' => ['required',
//                         'string',
//                         'email',
//                         'max:255',
//                         Rule::unique('users')->ignore(request('user'))],
//          ]);

//         if ($validator->fails()) {

//             if($request['image']) {
//                 unlink($request['image']);
//             }


//             return redirect()->route('admin.users.edit', $user)
//                         ->withErrors($validator)
//                         ->withInput();
//         }

//         if($request['image']) {
//             unlink($user->image);
//         }

//         $user->update($request->only(['name', 'email', 'image']));

//         return redirect()->route('admin.users.index');
//     }

//     public function destroy(User $user)
//     {
//         if($user->image) {
//             unlink($user->image);
//         }
        
//         $user->delete();
//         return redirect()->route('admin.users.index');
//     }
}
