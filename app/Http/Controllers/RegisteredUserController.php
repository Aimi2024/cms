<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    // public function create()
    // {
    //      // Since the middleware is applied directly in the route, you can
    //     // assume the user is an admin here, but you can add a fallback check:

    //     if (Auth::check() && Auth::user()->type !== 'admin') {
    //         // If the user is logged in but is not an admin, redirect them
    //         return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
    //     }

    //     $query = $request->input('query');

    //     if ($query) {
    //         // Perform search if query is provided
    //         $medicines = Medicine::where('m_name', 'LIKE', "%{$query}%")
    //             ->orWhere('m_da', 'LIKE', "%{$query}%")
    //             ->paginate(5);
    //     } else {
    //         // Show all medicines by default
    //         $medicines = Medicine::latest()->paginate(5);
    //     }

    //     return view('medicine', ['medicines' => $medicines]);

    //     // If the user is an admin, return the 'accounts' view
    //     return view('accounts');
    // }


    public function create(Request $request)
{
    // Since the middleware is applied directly in the route, you can
    // assume the user is an admin here, but you can add a fallback check:

    if (Auth::check() && Auth::user()->type !== 'admin') {
        // If the user is logged in but is not an admin, redirect them
        return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
    }

    // Get the search query if it exists
    $query = $request->input('query');

    // If a query is provided, filter the users based on the query
    if ($query) {
        $users = user::where('username', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(5);
    } else {
        // If no query is provided, show all users
        $users = user::latest()->paginate(5);
    }

    // Return the 'users' view with the filtered users
    return view('accounts', ['users' => $users]);
}


    public function createAccount()
    {
        // Since the middleware is applied directly in the route, you can
        // assume the user is an admin here, but you can add a fallback check:

        if (Auth::check() && Auth::user()->type !== 'admin') {
            // If the user is logged in but is not an admin, redirect them
            return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
        }

        // If the user is an admin, return the 'accounts' view
        return view('account.add-account');
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
        return redirect()->route('accounts.register');
    }

    public function edit(User $user)
    {
        // Only admins can edit accounts
        if (Auth::user()->type !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized.');
        }

        return view('account.update_account', compact('user'));
    }

    // Update user method
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['nullable', 'string', 'max:255', 'unique:users,username,' . $user->id],  // Allow name to be changed
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email,' . $user->id],  // Allow email to be changed
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],  // Password is optional, only required if provided
            'type' => ['nullable', 'string'],  // Type is optional
        ]);

        // Update user details if fields are provided, otherwise retain the current value
        $user->update([
            'username' => $request->name ?? $user->username,  // Update if 'name' is provided
            'email' => $request->email ?? $user->email,  // Update if 'email' is provided
            'type' => $request->type ?? $user->type,  // Update if 'type' is provided
            'password' => $request->password ? Hash::make($request->password) : $user->password,  // Update password if provided
        ]);

        return redirect()->route('accounts.create')->with('success', 'Account updated successfully!');
    }
}




