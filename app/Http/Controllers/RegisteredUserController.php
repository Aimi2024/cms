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
        return view('accounts');
    }

    public function store(Request $request)
    {
        // Validate input data
        $uservalidate = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string'],
        ]);

        // Create user with additional fields
        $user = User::create([
            'username' => $uservalidate['name'],
            'email' => $uservalidate['email'],
            'password' => Hash::make($uservalidate['password']),
            'type' => $uservalidate['type'], // 'admin' or 'user'
        ]);

        Auth::login($user);

        // Redirect after successful registration
        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }
}
