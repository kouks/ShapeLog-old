<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::where('id', \Cookie::get('uid'))->first();
        $feed = [];

    	foreach($user->following as $member)
    	{
    		$member = \App\User::where('id', $member->friend_id)->first();
    		foreach($member->records as $record)
    		{
    			$feed[$record->id] = $record;
    		}
    	}

		sort($feed);

        return \View::make('feed', [
            'title' => trans('page.feed'),
            'user' => $user,
            'feed' => $feed,
        ]);  
    }
}
