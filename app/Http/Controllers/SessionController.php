<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // Show the login page or redirect to the index page if the user is authenticated
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route(route: 'dashboard');
        }

        return view(view: 'auth.signin');
    }

    // Handle login
    public function store(Request $request)
    {
        $uservalidate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($uservalidate)) {
            throw ValidationException::withMessages([
                'username' => 'Invalid credentials.',
            ]);
        }

        // Regenerate session to prevent session fixation
        $request->session()->regenerate();

        // Redirect to the intended page or the default index page
        return redirect()->intended(route(name: 'dashboard'));
    }

    // Handle logout
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
