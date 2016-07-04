<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RecordsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return \View::make('records', [
            'title'         => trans('page.records'),
            'user'          => \App\User::where('id', \Cookie::get('uid'))->first(),
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
        
        return \Redirect::to('profile/records')->with('message', trans('page.records.added'));
    }

    /**
     * Handles deleting of a record
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if(!\App\Record::where(['id' => $request->id, 'user_id' => \Cookie::get('uid')])->delete())
            return \Redirect::to('/profile/tags')->with('message', trans('page.records.doesnt_exist'));
        
        return \Redirect::to('profile/records')->with('message', trans('page.records.deleted'));
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
        
        return \Redirect::to('')
            ->with('message', trans('master.lo_successful'))
            ->withCookie(\Cookie::forget('uid'));;
    }
}
