<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // Show the login page or redirect to the index page if the user is authenticated
    public function create(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Prevent caching of the sign-in page
        return response(view('auth.signin'))->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
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
        return redirect()->intended(route('dashboard'));
    }

    // Handle logout
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Prevent back button use after logout
        return redirect()->route('login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
