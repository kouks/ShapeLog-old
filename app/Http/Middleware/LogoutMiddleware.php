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
            return \Redirect::to('')->with('message', trans('master.not_logged'));

        if(!$request->is('setup/check-name') &&
           !$request->is('setup/save') &&
           !$request->is('profile/tags/add') &&
           !$request->is('profile/tags/delete') &&
           empty(\App\User::where('id', \Session::get('uid'))->first()->username))
            return \Redirect::to('setup')->with('message', trans('master.still_need_data'));

        return $next($request);
    }
}
