<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Supported locales
     */
    public const SUPPORTED_LOCALES = ['vi', 'en', 'zh', 'ko'];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->get('lang')
            ?: Session::get('locale')
            ?: $request->cookie('locale')
            ?: config('app.locale', 'vi');

        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = config('app.locale', 'vi');
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        $response = $next($request);

        if ($request->has('lang') && in_array($request->get('lang'), self::SUPPORTED_LOCALES, true)) {
            return $response->withCookie(cookie()->forever('locale', $locale));
        }

        return $response;
    }
}
