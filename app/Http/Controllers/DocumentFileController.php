<?php

namespace App\Http\Controllers;

use App\Models\DocumentFile;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentFileController extends Controller
{
    //
    public function index()
    {
        return view('pages.documents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pages.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentFile  $documentFile
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentFile $documentFile)
    {
        return response()->json($documentFile, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentFile  $documentFile
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentFile $documentFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentFile  $documentFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentFile $documentFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentFile  $documentFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentFile $documentFile)
    {
        //
    }
}
