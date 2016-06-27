<?php

namespace App\Http\Middleware;

use Closure;

class SetupMiddleware
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
        
        if(!empty(\App\User::where('id', \Session::get('uid'))->first()->username))
            return \Redirect::to('profile')->with('message', 'Login successful');

        return $next($request);
    }
}
