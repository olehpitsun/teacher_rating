<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    protected $table = 'bio_gr_articles';

    protected $fillable = [
        'id', 'surname', 'name', 'fathername', 'scholar', 'image', 'text', 'href', 'created_at'
    ];
}
