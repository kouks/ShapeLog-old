<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return \View::make('setup', [
            'title'         => trans('page.settings'),
            'user'          => \App\User::where('id', \Session::get('uid'))->first(),
        ]);  
    }

    /**
     * Save the data on DB
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
    	\App\User::where('id', \Session::get('uid'))->update([
    		'username' 		=> $request->username,
    		'birthday' 		=> strtotime($request->birthday),
    		'metric'		=> $request->metric,
            'locale'        => $request->locale,
    	]);

    	\Cookie::forever('locale', $request->locale);

        return \Redirect::to('profile')->with('message', trans('master.set_up'))
        							   ->withCookie(\Cookie::forever('locale', $request->locale));
    }


    /**
     * Save the data on DB
     *
     * @return \Illuminate\Http\Response
     */
    public function checkName(Request $request)
    {     	
        return \App\User::where('username', $request->username)->count();
    }
}
