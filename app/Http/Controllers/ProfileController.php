<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      return \View::make('profile', [
            'title'         => 'Profile',
            'user'          => \App\User::where(['fbid' => $_SESSION["fbid"]])->first(),
        ]);  
    }

    /**
     * Handles adding of a new record
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $fileName = '';
        
        if (\Input::hasFile('img') && \Input::file('img')->isValid())
        {
            $fileName = time() . "_" .
                        \Input::file('img')->getClientOriginalName();

            \Input::file('img')->move('uploads', $fileName);
        }

        /// REWORK ///////////////////////////
        $input = \Input::all();
        $calLevel = $input["cal_level"]; unset($input["cal_level"]);
        $height = $input["height"]; unset($input["height"]);
        $weight = $input["weight"]; unset($input["weight"]);
        $kcal = $input["kcal"]; unset($input["kcal"]);

        unset($input["_token"]);
        unset($input["img"]); 
        
        $data = serialize($input);

        $user = \App\User::where(['fbid' => $_SESSION['fbid']])->first();

        \App\Record::create([
            'user_id' => $user->id,
            'height' => $height,
            'weight' => $weight,
            'kcal' => $kcal,
            'data' => $data,
            'cal_level' => $calLevel,
            'img'  => $fileName,
        ]);
        
        return \Redirect::to('profile')->with('message', 'Successfully added');
    }

    /**
     * Handles deleting of a record
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        \App\Record::where(['id' => $request->id])->delete();
        
        return \Redirect::to('profile')->with('message', 'Successfully deleted');
    }

    /**
     * Handles the logout action
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        unset($_SESSION["fbid"]);
        unset($_SESSION["facebook_access_token"]);
        
        return \Redirect::to('')->with('message', 'Successfully logged out');
    }
}
