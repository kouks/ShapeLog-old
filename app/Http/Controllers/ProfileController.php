<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RecordsController extends Controller
{

    /**
     * Handles the logout action
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Session::flush();
        
        return \Redirect::to('')
            ->with('message', trans('master.lo_successful'))
            ->withCookie(\Cookie::forget('uid'));;
    }
}
