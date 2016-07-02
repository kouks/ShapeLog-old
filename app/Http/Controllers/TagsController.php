<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return \View::make('tags', [
            'title'         => trans('page.tags'),
            'user'          => \App\User::where('id', \Cookie::get('uid'))->first(),
        ]);  
    }

    /**
     * Adds a new tag
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    { 
        $tag = \App\Tag::create([
            'user_id' => $request->user,
            'name' => $request->name,
            'unit' => $request->unit,
        ]);

        return $tag->id;
    }

    /**
     * Deletes a tag
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    { 
        if(!\App\Tag::where(['id' => $request->id, 'user_id' => \Cookie::get('uid')])->delete())
            return \Redirect::to('/profile/tags')->with('message', trans('page.tags.doesnt_exist'));
        
        return \Redirect::to('/profile/tags')->with('message', trans('page.tags.deleted'));
    }
}
