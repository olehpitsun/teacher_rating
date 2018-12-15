<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Randomize extends Model
{
    protected $table = 'abiturients';

    protected $fillable = [
        'id', 'surname', 'name', 'fathername', 'email', 'phone', 'location', 'status', 'created_at', 'updated_at'
    ];
}
