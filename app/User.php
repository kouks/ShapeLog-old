<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{  

    public function records()
    {
        return $this->hasMany("App\Record")->orderBy('id', 'desc');
    }

    public function tags()
    {
        return $this->hasMany("App\Tag");
    }

    public function follows()
    {
        return $this->hasMany("App\Relationship");
    }

    public function isFollowerOf($id)
    {
        $friends = \App\Relationship::where('user_id', \Session::get('uid'))->get();
        foreach($friends as $friend)
        {
            if($friend->friend_id == $id)
                return true;
        }
        return false;
    }
}
