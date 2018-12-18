<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'IndexController@search'
]);

Route::get('/sortByHIndex', [
    'as' => 'api.sortByHIndex',
    'uses' => 'IndexController@sortByHIndex'
]);

/*
Route::get('/users', [
    'as' => 'api.users',
    'uses' => 'ApiUserController@index'
]);*/

Route::get('/users', function() {
    return App\Abiturients::latest()->orderBy('created_at', 'desc')->get();
});
//Route::post('/userq', 'ManageabiturientsController@store');

Route::match(['get', 'post'], '/abit', function (Request $request) {
    //return $request;

    return App\Abiturients::create($request->all());
});

Route::delete('abit/{id}','ManageabiturientsController@destroy');


Route::match(['get', 'post'], '/feedback', function (Request $request) {
    //return $request;

    return App\Feedback::create($request->all());
});


// get list of tasks
Route::get('tasks','TaskController@index');
// get specific task
Route::get('task/{id}','TaskController@show');
// delete a task
Route::delete('task/{id}','TaskController@destroy');
// update existing task
Route::put('task','TaskController@store');
// create new task
Route::post('task','TaskController@store');