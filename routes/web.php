<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'seasons'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/create', 'SeasonsController@create');
        Route::post('{id}/store', 'SeasonsController@store');
    });
});

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'errors'], function () {
   Route::get('/unauthorised', function () {
       return view('/errors/unauthorised');
   });
});
