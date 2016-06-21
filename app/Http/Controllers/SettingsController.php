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
            'title'         => 'Settings',
            'user'          => \App\User::where(['fbid' => $_SESSION["fbid"]])->first(),
        ]);  
    }
}
