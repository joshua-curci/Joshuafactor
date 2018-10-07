<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'pets';

    public function favourite_foods()
    {
        return $this->hasMany('App\Petfood', 'pet_id', 'id');
    }


}
