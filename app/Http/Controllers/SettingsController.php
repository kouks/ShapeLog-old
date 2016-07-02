<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      	return \View::make('settings', [
            'title'         => trans('page.settings'),
            'user'          => \App\User::where('id', \Cookie::get('uid'))->first(),
        ]);  
    }

    /**
     * Save the data on DB
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        \App\User::where('id', \Cookie::get('uid'))->update([
            'birthday'      => strtotime($request->birthday),
            'metric'        => $request->metric,
            'locale'        => $request->locale,
        ]);

        \Cookie::forever('locale', $request->locale);

        \App::setLocale($request->locale);

        return \Redirect::to('profile/settings')->with('message', trans('page.settings.updated'))
                                       ->withCookie(\Cookie::forever('locale', $request->locale));
    }
}
