<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fb = new \Facebook\Facebook(config('services.facebook'));

        /*
         * Generating login url
         */
        $loginUrl = $fb->getRedirectLoginHelper()->getLoginUrl('http://' . $_SERVER["SERVER_NAME"] . '/login');

        return \View::make('home', [
            'title' => trans('page.home'),
            'loginUrl' => $loginUrl,
            'user' => \App\User::where('id', \Cookie::get('uid'))->first(),
        ]);  
    }


    /**
     * Handles FB login response
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $fb = new \Facebook\Facebook(config('services.facebook'));

        $helper = $fb->getRedirectLoginHelper();

        /*
         * Passing access token
         */
        $_SESSION['FBRLH_state'] = $_GET['state'];

        /*
         * Getting data from FB
         */
        try
        {
            $accessToken = $helper->getAccessToken();
            $fb->setDefaultAccessToken($accessToken);
            $response = $fb->get('/me?fields=birthday,first_name,last_name,gender');
            $user = json_decode($response->getGraphUser());
        } 
        catch(\Facebook\Exceptions\FacebookResponseException $e)
        {
            return \Redirect::to('')->with('message', trans('master.l_failed'));
        }
        catch(\Facebook\Exceptions\FacebookSDKException $e)
        {
            return \Redirect::to('')->with('message', trans('master.l_failed'));
        }
        
        /*
         * Saving on DB
         */
        if(!\App\User::where('fbid', $user->id)->count())
        {
            \App\User::create([
                'fbid'          => $user->id,
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'birthday'      => isset($user->birthday) ? strtotime($user->birthday) : 0,
                'gender'        => $user->gender,
            ]);

            $uid = \App\User::where('fbid', $user->id)->first()->id;

            \App\Tag::create([
                'user_id'   => $uid,
                'name'      => 'BICEPS',
                'unit'      => 'cm'
            ]);

            \App\Tag::create([
                'user_id'   => $uid,
                'name'      => 'CHEST',
                'unit'      => 'cm'
            ]);
        }

        /*
         * Storing the user id and redirecting
         */
        return \Redirect::to('setup')
            ->with('message', trans('master.need_data'))
            ->withCookie('uid', \App\User::where('fbid', $user->id)->first()->id, 10080);
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