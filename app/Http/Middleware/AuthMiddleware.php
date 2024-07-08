<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                return redirect()->route('home')->with('fail', 'Access denied. Admins only.');
            }
        } else {
            return redirect()->route('login')->with('fail', 'You must be logged in.');
        }
    
    }
}
