<?php

namespace App\Http\Controllers;

use App\Models\About;
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

        $countDocument = 0;
        if(!is_null($keyword) && $keyword !== '') {
            $documents = Document::with('files')
            ->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('files', function($query) use ($keyword){
                $query->where('converted_text', 'LIKE', '%' . $keyword . '%');
            })
            ->get();
            $countDocument = $documents->count();

            if($countDocument === 0) {
                $documents = Document::with('files')
                    ->get();
            }
        }else{
            $documents = [];
        } 
        return view('apps.pages.search', compact('documents', 'keyword', 'countDocument'));
    }

    public function about()
    {
        $about = About::latest('created_at')->first();
        return view('apps.pages.about', compact('about'));   
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
