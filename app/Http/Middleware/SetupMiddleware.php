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
        if(!\Cookie::get('uid'))
            return \Redirect::to('')->with('message', trans('master.not_logged'));
        
        if(!empty(\App\User::where('id', \Cookie::get('uid'))->first()->username))
            return \Redirect::to('profile/feed')->with('message', trans('master.l_successful'));

        return $next($request);
    }
}
