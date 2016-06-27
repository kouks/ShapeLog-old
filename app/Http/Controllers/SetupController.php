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
            'title'         => 'Setup',
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
    	]);

    	\Cookie::forever('locale', $request->locale);

        return \Redirect::to('profile')->with('message', 'Your account has been set up')
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
