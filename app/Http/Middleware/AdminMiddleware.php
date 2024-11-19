<?php

//Jonathan

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (Auth::check()) {
            // Intelephense is not recognizing getIsAdmin() method, but it is working.
            if (Auth::user()->getIsAdmin()) {
                return $next($request);
            } else {
                return redirect()->route('home.index');
            }
        }

        return $next($request);
    }
}
