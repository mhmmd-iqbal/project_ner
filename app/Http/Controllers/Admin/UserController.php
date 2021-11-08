<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $users = User::get();
        return view('pages.users.index', compact('users'));
    }

    public function create(Request $request){
        return view('pages.users.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'      => 'required|min:5',
            'username'  => 'required|min:5|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'image'     => 'required',
            'password'  => 'required|min:5'
        ]);
        User::create(
            [
                'name'      => $validated['name'],
                'username'  => $validated['username'],
                'email'     => $validated['email'],
                'image'     => $validated['image'],
                'password'  => Hash::make($validated['password'])
            ]
        );

        return redirect()->route('user.index')->with('message', 'Created User Successfully');
    }

    public function show(User $user) 
    {
        return view('pages.users.show', compact('user'));
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name'      => 'required|min:5',
            'username'  => 'required|min:5|unique:users,username, '.$user->id,
            'email'     => 'required|email|unique:users,email, '.$user->id,
            'image'     => 'required',
            'password'  => 'nullable|min:5'
        ]);

        $user->update([
            'name'      => $validated['name'] ?? $user->name,
            'email'     => $validated['email'] ?? $user->email,
            'image'     => $validated['image'] ?? $user->image,
            'password'  => is_null($validated['password']) ? $user->password : Hash::make($validated['password'])
        ]);

        return redirect()->route('user.index')->with('message', 'Update User Successfully');
    }
}
