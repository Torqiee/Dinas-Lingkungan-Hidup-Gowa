<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // By default, set guards to [null] if none provided
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Check if the user is already authenticated for this guard
            if (Auth::guard($guard)->check()) {
                // Redirect authenticated user to home/dashboard page
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Continue with the request chain if user is not authenticated
        return $next($request);
    }
}
