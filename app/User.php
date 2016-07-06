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

    public function following()
    {
        return $this->hasMany("App\Relationship");
    }

    public function isFollowerOf($id)
    {
        foreach($this->following as $member)
        {
            if($member->friend_id == $id)
                return true;
        }
        return false;
    }

    public function followingIds($id)
    {
        foreach($this->following as $member)
        {
            if($member->friend_id == $id)
                return true;
        }
        return false;
    }
}
