<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
         // Since the middleware is applied directly in the route, you can
        // assume the user is an admin here, but you can add a fallback check:

        if (Auth::check() && Auth::user()->type !== 'admin') {
            // If the user is logged in but is not an admin, redirect them
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // If the user is an admin, return the 'accounts' view
        return view('accounts');
    }


    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string'],
        ]);

        // Create user with additional fields
        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type, // 'admin' or 'user'
        ]);

        // Optionally log the user in
        // Auth::login($user);

        // Redirect after successful registration
        session()->flash('success', 'Account for ' . $user->username . ' has been created successfully!');
        return redirect()->route('accounts.create');
    }
}
