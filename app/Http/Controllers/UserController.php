<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('test1');
        // $this->middleware('test1')->only(['index', 'show']);
        // $this->middleware('test1')->except(['index', 'show']); //mais usual
        // $this->middleware(function() {
        //     dd('middleware user');        
        // })->only(['index']);
    }

    public function index()
    {
        return 'Hello World';
    }

    public function show(Request $request, User $user)
    {
        return $user;
        // dd($user);
    }
}
