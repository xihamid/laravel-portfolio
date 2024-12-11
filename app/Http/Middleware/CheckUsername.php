<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUsername
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->route()->getName() === 'register') {
            abort(403, 'Registration is disabled.');
        }

        if (!auth()->check()) {
            abort(403, 'User is not authenticated'); // User not logged in
        }

        // Debug to check the logged-in user's data
        // dd(auth()->user());

        if (auth()->user()->email !== 'xihamid@gmail.com') {
            abort(403, 'Not Allowed to Visit'); // User's email does not match
        }

        // Allow the request to proceed if conditions are met
        return $next($request);
    }

}
