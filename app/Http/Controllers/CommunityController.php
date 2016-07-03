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
        $user = \App\User::where('id', \Cookie::get('uid'))->first();

        $following = [];
        foreach($user->following as $friend)
        {
            $following[] = $friend->friend_id;
        }

        $following = \App\User::whereIn('id', $following)->orderBy('last_name', 'asc')->get();

      	return \View::make('community', [
            'title'         => trans('page.community'),
            'user'          => $user,
            'newest'        => \App\User::orderBy('id', 'desc')->limit(8)->get(),
            'following'       => $following,
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

        if(!$user instanceof \App\User) 
            return \Redirect::to('profile/community')->with('message', trans('page.community.not_found'));
        
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
            'user'          => \App\User::where('id', \Cookie::get('uid'))->first(),
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
            ->orWhere('username', 'regexp', $request->pattern)
            ->limit(8)->get()->toArray();

        return json_encode($users);
    }

    /**
     * Ajax friend adding
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    { 
        \App\Relationship::create([
            'user_id'   => \Cookie::get('uid'),
            'friend_id'   => $request->id,
        ]);
    }

    /**
     * Ajax friend adding
     *
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request)
    { 
        \App\Relationship::where([
            'user_id'   => \Cookie::get('uid'),
            'friend_id'   => $request->id,
        ])->delete();
    }
}
