<?php

namespace App\Http\Middleware;

use Closure;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        /*
         * This is the exact line between beautiful and gruesome code ^^
         */
        ($locale = @\App\User::where('id', \Session::get('uid'))->first()->locale) ||
        ($locale = \Cookie::get('locale')) ||
        ($locale = 'en');

        \App::setLocale($locale);

        return $next($request);
    }
}
