<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'bio_gr_news';

    protected $fillable = [
        'author_id', 'text', 'title', 'en_text', 'articles', 'href'
    ];
}
