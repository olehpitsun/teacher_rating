<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    protected $table = 'users';

    use SoftDeletes;

    protected $fillable = [
      'id', 'email', 'first_name', 'last_name', 'location'
    ];
    //protected $dates = ['deleted_at'];

    /*
    public function setLiveAttribute($value)
    {
        $this->attributes['live'] = (boolean)($value);
    }*/
}
