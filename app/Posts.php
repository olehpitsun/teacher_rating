<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    protected $table = 'posts';

    use SoftDeletes;

    protected $fillable = [
      'user_id', 'content', 'live', 'post_on'
    ];

    protected $dates = ['post_on', 'deleted_at'];

    public function setLiveAttribute($value)
    {
        $this->attributes['live'] = (boolean)($value);
    }
}
