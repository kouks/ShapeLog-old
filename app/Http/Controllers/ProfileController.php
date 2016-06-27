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
            'user'          => \App\User::where('id', \Session::get('uid'))->first(),
        ]);  
    }

    /**
     * Handles adding of a new record
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        
        /*
         * Parsing image name, if present
         */
        $fileName = '';
        
        if (\Input::hasFile('img') && \Input::file('img')->isValid())
        {
            $fileName = time() . "_" . \Input::file('img')->getClientOriginalName();

            \Input::file('img')->move('uploads', $fileName);
        }

        /*
         * Saving data on DB
         */
        \App\Record::create([
            'user_id' => $request->user,
            'height' => $request->height,
            'weight' => $request->weight,
            'kcal' => $request->kcal,
            'data' => serialize($request->data),
            'cal_level' => $request->cal_level,
            'img'  => $fileName,
        ]);
        
        return \Redirect::to('profile')->with('message', 'Record successfully added');
    }

    /**
     * Handles deleting of a record
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        \App\Record::where('id', $request->id)->delete();
        
        return \Redirect::to('profile')->with('message', 'Successfully deleted');
    }

    /**
     * Handles editing of a record
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(in_array($request->cat, [ 'kcal', 'height', 'weight']))
        {
            \App\Record::where("id", $request->id)->update([$request->cat => $request->value]);
        }
        else
        {
            $data = unserialize(\App\Record::where("id", $request->id)->first()->data);
            $data[$request->cat] = $request->value;
            \App\Record::where("id", $request->id)->update(['data' => serialize($data)]);
        }

        return null;
    }

    /**
     * Handles the logout action
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Session::flush();
        
        return \Redirect::to('')->with('message', 'Successfully logged out');
    }
}
