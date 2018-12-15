<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $table = 'bio_gr_participants';

    protected $fillable = [
        'id', 'surname', 'name', 'fathername', 'degree', 'status', 'scholar_href', 'position', 'articles', 'mail',
        'en_surname', 'en_name', 'en_fathername', 'en_degree', 'en_status'
    ];
}
