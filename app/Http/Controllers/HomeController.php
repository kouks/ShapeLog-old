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
        $fb = new \Facebook\Facebook([
            'app_id' => '1643582335963261',
            'app_secret' => 'cdfbfc4f92550998fc068c17c4c4cd68',
            'default_graph_version' => 'v2.5',
            'persistent_data_handler'=>'session'
        ]);

        /*
         * Generating login url
         */
        $loginUrl = $fb->getRedirectLoginHelper()->getLoginUrl('http://' . $_SERVER["SERVER_NAME"] . '/login');

        /*
         * Temporary bugfix
         */
        if(isset($_SESSION["fbid"]) && !\App\User::where('id', \Session::get('uid'))->count())
            unset($_COOKIE["laravel_session"]);

        return \View::make('home', [
            'title' => 'Home',
            'loginUrl' => $loginUrl,
            'user' => \App\User::where('id', \Session::get('uid'))->first(),
        ]);  
    }


    /**
     * Handles FB login response
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => '1643582335963261',
            'app_secret' => 'cdfbfc4f92550998fc068c17c4c4cd68',
            'default_graph_version' => 'v2.5',
            'persistent_data_handler'=>'session'
        ]);

        $helper = $fb->getRedirectLoginHelper();

        /*
         * Passing security token
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
            return \Redirect::to('')->with('message', 'Login failed');
        }
        catch(\Facebook\Exceptions\FacebookSDKException $e)
        {
            return \Redirect::to('')->with('message', 'Login failed');
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
         * Storing the user id
         */ 
        \Session::put('uid', \App\User::where('fbid', $user->id)->first()->id);

        return \Redirect::to('setup')->with('message', 'Setup your account');
    }
}