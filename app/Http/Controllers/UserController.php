<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
