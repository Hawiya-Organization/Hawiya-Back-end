<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     */
    // if there are any other languages make sure to publish them and add them to this array
    private static  $languages = ['en', 'ar'];
    public function handle(Request $request, Closure $next): Response
    {
        // setting up the language for a single request
        if (
            $request->lang_code
            && in_array($request->lang_code, self::$languages)
        ) {
            // here we set the local of that request
            App::setlocale($request->lang_code);
        }


        return $next($request);
    }
}
