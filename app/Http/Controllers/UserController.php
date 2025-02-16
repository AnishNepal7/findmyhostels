<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function dashboard()
    {
        // For now, just return the dashboard view without dynamic data
        return view('user.dashboard');
    }
    public function profile()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Pass the user data to the profile view
        return view('user.profile', compact('user'));
    }
}
