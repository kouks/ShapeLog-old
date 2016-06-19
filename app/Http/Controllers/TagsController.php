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
            'title'         => 'Custom Tags',
            'user'          => \App\User::where(['fbid' => $_SESSION["fbid"]])->first(),
        ]);  
    }

    /**
     * Adds a new tag
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    { 
        \App\Tag::create([
            'user_id' => $request->user,
            'name' => $request->name,
            'unit' => $request->unit,
        ]);
    }

    /**
     * Deletes a tag
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    { 
        \App\Tag::where(['id' => $request->id])->delete();
        return \Redirect::to('/profile/tags')->with('message', 'Tag successfully deleted');
    }
}
