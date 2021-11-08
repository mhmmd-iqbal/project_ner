<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Providers\RouteServiceProvider;
use App\Traits\DocxConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('apps.pages.home');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $documents = Document::with('files')->get();

        return view('apps.pages.search', compact('documents', 'keyword'));
    }

    public function show(Request $request, Document $document)
    {
        return view('apps.pages.detail', compact('document'));
    }

    public function signin(Request $request)
    {
        return view('apps.signin');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);
        $login = Auth::attempt(['username' => $validated['username'], 'password' => $validated['password']]);
        if($login) {
            return redirect()->route('dashboard');
        }

        return back()->with([
            'error' => 'Username atau password salah',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
