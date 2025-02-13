<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // display the login page
    public function login()
    {
        return view("auth.login");

    }

    //display the register page
    public function register()
    {
        return view("auth.register");

    }

    public function authenticate()
    {
        return 'auth';
    }

    public function store()
    {
        return "register";
    }
}
