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

        if($user instanceof \App\User)
        {
            foreach($user->following as $friend)
            {
                $following[] = $friend->friend_id;
            }

            $following = \App\User::whereIn('id', $following)->orderBy('last_name', 'asc')->get();
        }

        /*
         * Facebook instance
         */        
        $fb = new \Facebook\Facebook(config('services.facebook'));

        /*
         * Generating login url
         */
        $loginUrl = $fb->getRedirectLoginHelper()->getLoginUrl('http://' . $_SERVER["SERVER_NAME"] . '/login');

      	return \View::make('community.index', [
            'title'         => trans('page.community'),
            'layout'        => $user instanceof \App\User ? 'layouts.page' : 'layouts.empty',
            'user'          => $user,
            'newest'        => \App\User::orderBy('id', 'desc')->limit(8)->get(),
            'following'     => $following,
            'loginUrl'      => $loginUrl,    
        ]);  
    }

    /**
     * Display a detail of given resource
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    { 
        $detail = \App\User::where('id', $request->id)->first();
        $user = \App\User::where('id', \Cookie::get('uid'))->first();

        if(!$detail instanceof \App\User) 
            return \Redirect::to('profile/community')->with('message', trans('page.community.not_found'));
        
        $data = [];
        foreach($detail->records as $record)
        {
            $time = date('j. n. Y', strtotime($record->created_at));
            $data[] = [ 
                'date' => $time,
                'data' => array_merge([ 'WEIGHT' => $record->weight, 'KCAL' => $record->kcal ], unserialize($record->data))
            ];
        }

        return \View::make('community.detail', [
            'title'         => $request->username,
            'layout'        => $user instanceof \App\User ? 'layouts.page' : 'layouts.empty',
            'user'          => $user,
            'detail'        => $detail,
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
