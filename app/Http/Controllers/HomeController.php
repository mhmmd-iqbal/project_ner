<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Traits\DocxConversion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('apps.pages.home');
    }

    public function search(Request $request)
    {
        $input = $request->input();

        $documents = Document::with('files')->get();

        return view('apps.pages.search', compact('documents'));
    }

    public function show(Request $request, Document $document)
    {
        return view('apps.pages.detail', compact('document'));
    }

    public function login()
    {
        return view('apps.login');
    }
}
