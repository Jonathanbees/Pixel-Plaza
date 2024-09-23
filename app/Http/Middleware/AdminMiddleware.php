<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            Log::info('User is authenticated', ['user_id' => Auth::id(), 'is_admin' => Auth::user()->is_admin]);
            if (Auth::user()->is_admin) {
                return $next($request);
            } else {
                // User is authenticated but not an admin
                return redirect('/')->with('error', 'You do not have admin access.');
            }
        }

        // User is not authenticated
        Log::info('User is not authenticated', ['session' => session()->all()]);
        return $next($request);
    }
}