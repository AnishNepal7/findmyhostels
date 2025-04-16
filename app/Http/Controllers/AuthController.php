<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected function redirectToDashboard()
{
    $user = Auth::user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('hostel_owner')) {
        return redirect()->route('owner.dashboard');
    } elseif ($user->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }

    return redirect('/'); // fallback just in case
}
    // display the login page
    public function login()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(); // Send to respective dashboard
        }
        return view("auth.login");

    }

    //display the register page
    public function register()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(); // Send to respective dashboard
        }
        return view("auth.register");

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|digits:10',
            'password' => 'required|min:6|confirmed',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Create User
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        $role = Role::where('name', 'user')->first();
        if ($role) {
            $user->roles()->attach($role->id);
        }
    
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
        
    }
    public function authenticate(Request $request)
{
    // Validate the credentials
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on the user's role
        return $this->redirectToDashboard();
     
       
    }

    // If authentication fails, return with an error message
    return back()->withErrors([
        'email' => 'Invalid credentials provided.',
    ])->withInput($request->only('email'));
}

   
    public function logout(Request $request)
{
    Auth::logout(); // Logs out the authenticated user

    // Invalidate the session
    $request->session()->invalidate();
    
    // Regenerate CSRF token to prevent session fixation attacks
    $request->session()->regenerateToken();

    // Redirect to the login page (or any other page)
    return redirect('/login');
}
}
