<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Manageuser -for user activation
 * @package App
 */
class Manageuser extends Model
{
    protected $table = 'activations';

    use SoftDeletes ;

    protected $fillable = [
      'id', 'completed'
    ];
}
