<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    }
}
