<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 29.01.18
 * Time: 19:46
 */


Route::resource('/', 'UserController');
// API
Route::resource('/api/users', 'ApiUserController');