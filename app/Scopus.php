<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 27.01.2019
 * Time: 12:41
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Scopus extends Model
{
    protected $table = 'scopus';

    protected $fillable = [
        'id', 'teacher_id', 'scopus_index'
    ];
}