<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Utiliza Log::info para depuración
        Log::info('LanguageMiddleware: handle() ejecutado');
        if (Session::has('locale')) {
            \App::setLocale(Session::get('locale'));
        } else {
            // Establecer el idioma predeterminado si no está en sesión
            \App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
