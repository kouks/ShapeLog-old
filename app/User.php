<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    
    public function records()
    {
        return $this->hasMany("App\Record")->orderBy('id', 'desc');
    }

}
