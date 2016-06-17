<?php

namespace App\Http\Middleware;

use Closure;

class LogoutCheck
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
        if(!isset($_SESSION['facebook_access_token']))
            return \Redirect::to('')->with('message', 'You are not logged in');;

        return $next($request);
    }
}
