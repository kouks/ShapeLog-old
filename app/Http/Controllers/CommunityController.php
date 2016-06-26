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
            'newest'        => \App\User::orderBy('created_at', 'desc')->limit(9)->get(),
            'friends'       => [ ],
        ]);  
    }

    /**
     * Display a detail of given resource
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    { 
        return \View::make('community', [
            'title'         => 'Community',
            'user'          => \App\User::where(['fbid' => $_SESSION["fbid"]])->first(),
            'newest'        => \App\User::orderBy('created_at', 'desc')->limit(9)->get(),
            'friends'       => [ ],
        ]);  
    }

    /**
     * Filtering users db with ajax
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    { 
        $users = \App\User::where('first_name', 'regexp', $request->pattern)
                          ->orWhere('last_name', 'regexp', $request->pattern)->limit(8)->get()->toArray();

        return json_encode($users);
    }
}
