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

}
