<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $about = About::latest('created_at')->first();

        return view('pages.profile.index', compact('user', 'about'));
    }

    public function updateProfile(Request $request, User $user) {
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

        return redirect()->back()->with('message', 'Update Profile Successfully');
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'description'      => 'required',
        ]);

        About::create([
            'description' => $validated['description']
        ]);

        return redirect()->back()->with('message', 'Created User Successfully');
    }
}
