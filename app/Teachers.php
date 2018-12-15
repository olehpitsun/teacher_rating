<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'id', 'fullname', 'scholar_href', 'scopus_href', 'created_at', 'updated_at'
    ];
}
