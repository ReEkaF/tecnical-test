<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCenterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated using the 'admin-center' guard
        if (Auth::guard('admin-center')->check()) {
            return $next($request);
        } else {
            return redirect()->route('login')->withErrors(['' => 'Akses tidak diizinkan']);
        }
    }
}
