<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommunityController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      	return \View::make('community', [
            'title'         => 'Community',
            'user'          => \App\User::where(['fbid' => $_SESSION["fbid"]])->first(),
        ]);  
    }
}
