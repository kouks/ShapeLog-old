<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GraphsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = \App\User::where(['fbid' => $_SESSION["fbid"]])->first();

        $data = [];
        foreach($user->records as $record)
        {
            $time = date('j. n. Y', strtotime($record->created_at));
            $data[] = [ 
                'date' => $time,
                'data' => array_merge( [ 'WEIGHT' => $record->weight, 'KCAL' => $record->kcal ], unserialize($record->data))
            ];
        }

        return \View::make('graphs', [
            'title'         => 'Graphs',
            'user'          => $user,
            'data'          => $data,
        ]);  
    }
}
