<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';

}
