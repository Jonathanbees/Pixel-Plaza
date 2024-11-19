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
            // if (Auth::user()->getIsAdmin()) {
            // It didn't work. There's no direct connection between the customUser model (with the function) and the user here, so it's not accessible.
            if (Auth::user()->is_admin) {
                return $next($request);
            } else {
                return redirect()->route('home.index');
            }
        }

        return $next($request);
    }
}
