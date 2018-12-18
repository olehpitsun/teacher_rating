<?php
use App\Mail\KiFound;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('/welcome');
});*/
Route::get('/', 'IndexController@index')->name('home');

Route::get('/index', 'IndexController@index');
Route::get('/abiturient', 'AbiturientController@index');
Route::post('/abiturient', 'AbiturientController@store');

Route::get('/randomize', 'RandomizeController@index');
Route::post('/randomize', 'RandomizeController@store');
Route::post('/randomize_cleare', 'RandomizeController@randomize_cleare');



Route::group(['middleware' => 'visitors'], function(){
    Route::get('/register', 'RegistrationController@register');
    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@postLogin');

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');

});



Route::post('/logout', 'LoginController@logout');

Route::get('/earnings','AdminController@earnings')->middleware('admin') ;

Route::get('/tasks','ManagerController@tasks')->middleware('manager') ;

Route::get('/activate/{email}/{activationCode}','ActivationController@activate');


Route::get('/profile/{username}', 'ProfileController@profile');

Route::get('/posts/create', 'PostsController@create');
Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');

Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::put('/posts/{id}', 'PostsController@update');
Route::delete('/posts/{id}', 'PostsController@destroy');

//Route::post('/posts/store', 'PostsController@store');
Route::get('/manageusers/create', 'ManageusersController@create');
Route::post('/manageusers', 'ManageusersController@postRegister');
Route::get('/manageusers', 'ManageusersController@index')->middleware('admin');
Route::put('/manageusers/{id}', 'ManageusersController@update')->middleware('admin');
Route::delete('/manageusers/{id}', 'ManageusersController@destroy')->middleware('admin');
Route::get('/manageusers/{id}/edit', 'ManageusersController@edit')->middleware('admin');



Route::get('/manageparticipants', 'ManageparticipantsController@index')->middleware('admin');
Route::get('/manageparticipants/create', 'ManageparticipantsController@create')->middleware('admin');
Route::post('/manageparticipants', 'ManageparticipantsController@store')->middleware('admin');
Route::get('/manageparticipants/{id}/edit', 'ManageparticipantsController@edit')->middleware('admin');
Route::put('/manageparticipants/{id}', 'ManageparticipantsController@update')->middleware('admin');
Route::delete('/manageparticipants/{id}', 'ManageparticipantsController@destroy')->middleware('admin');

Route::get('/managenews', 'ManagenewsController@index')->middleware('admin');
Route::get('/managenews/create', 'ManagenewsController@create')->middleware('admin');
Route::post('/managenews', 'ManagenewsController@store')->middleware('admin');
Route::get('/managenews/{id}/edit', 'ManagenewsController@edit')->middleware('admin');
Route::put('/managenews/{id}', 'ManagenewsController@update')->middleware('admin');
Route::delete('/managenews/{id}', 'ManagenewsController@destroy')->middleware('admin');

Route::get('/manageteachers', 'ManageteachersController@index')->middleware('admin');
Route::get('/manageteachers/create', 'ManageteachersController@create')->middleware('admin');
Route::post('/manageteachers', 'ManageteachersController@store')->middleware('admin');
Route::get('/manageteachers/{id}/edit', 'ManageteachersController@edit')->middleware('admin');
Route::put('/manageteachers/{id}', 'ManageteachersController@update')->middleware('admin');
Route::delete('/manageteachers/{id}', 'ManageteachersController@destroy')->middleware('admin');

Route::get('/manageabiturients', 'ManageabiturientsController@index')->middleware('admin');
Route::delete('/manageabiturients/{id}', 'ManageabiturientsController@destroy')->middleware('admin');
Route::get('/manageabiturients/{id}', 'ManageabiturientsController@incrementStatus')->middleware('admin');


Route::post('/sendmail', 'ManageabiturientsController@sendMail')->middleware('admin');


Route::match(['get', 'post'], '/feedback', function (Request $request) {
    //return $request;

    return App\Feedback::create($request->all());
});


Route::get('/page/not/found',function($closure){
    abort(404, 'Page Not found');
});

/*
Route::get('/', function () {
    // send an email to "batman@batcave.io"
    Mail::to('pichyn7@gmail.com')->send(new KiFound());

    return view('manageabiturients');
});*/