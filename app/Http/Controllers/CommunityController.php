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
        $user = \App\User::where('id', \Session::get('uid'))->first();

        $friends = [];
        foreach($user->friends as $friend)
        {
            $friends[] = $friend->id;
        }

        $friends = \App\User::whereIn('id', $friends)->get();

      	return \View::make('community', [
            'title'         => 'Community',
            'user'          => $user,
            'newest'        => \App\User::orderBy('created_at', 'desc')->limit(9)->get(),
            'friends'       => $friends,
        ]);  
    }

    /**
     * Display a detail of given resource
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    { 
        $user = \App\User::where('id', $request->id)->first();

        $data = [];
        foreach($user->records as $record)
        {
            $time = date('j. n. Y', strtotime($record->created_at));
            $data[] = [ 
                'date' => $time,
                'data' => array_merge([ 'WEIGHT' => $record->weight, 'KCAL' => $record->kcal ], unserialize($record->data))
            ];
        }

        return \View::make('detail', [
            'title'         => $request->username,
            'user'          => \App\User::where('id', \Session::get('uid'))->first(),
            'detail'        => $user,
            'data'          => $data,
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
                          ->orWhere('last_name', 'regexp', $request->pattern)
                          ->orWhere('username', 'regexp', $request->pattern)->limit(8)->get()->toArray();

        return json_encode($users);
    }

    /**
     * Ajax friend adding
     *
     * @return \Illuminate\Http\Response
     */
    public function addFriend(Request $request)
    { 
        \App\Relationship::create([
            'user_id'   => \Session::get('uid'),
            'friend_id'   => $request->id,
        ]);

        return 1;
    }

    /**
     * Ajax friend adding
     *
     * @return \Illuminate\Http\Response
     */
    public function removeFriend(Request $request)
    { 
        \App\Relationship::where([
            'user_id'   => \Session::get('uid'),
            'friend_id'   => $request->id,
        ])->delete();

        return 1;
    }
}
