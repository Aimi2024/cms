<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'admin' type
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }

        // Redirect to home or any other route if the user is not an admin
        return redirect()->route(route: 'login');
    }
}
