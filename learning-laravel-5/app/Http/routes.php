<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/






/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/',function(){
        return 'This is the homepage of Laravel 5';
    });
    Route::get('/about', 'PagesController@about');
    Route::get('/contact', 'PagesController@contact');

    Route::resource('articles','ArticlesController');

    Route::get('foo',['middleware'=>'manager',function(){
        return 'This page may be only be viewed by manager';
    }]);

    Route::get('tags/{tags}', 'TagsController@show');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
