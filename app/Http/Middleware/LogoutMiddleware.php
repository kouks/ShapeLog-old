<?php

namespace App\Http\Middleware;

use Closure;

class LogoutMiddleware
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
        if(!\Session::get('uid'))
            return \Redirect::to('')->with('message', 'You are not logged in');

        if(!$request->is('setup/check-name') && !$request->is('setup/save') && empty(\App\User::where('id', \Session::get('uid'))->first()->username))
            return \Redirect::to('setup')->with('message', 'We still need to set up a few things...');

        return $next($request);
    }
}
