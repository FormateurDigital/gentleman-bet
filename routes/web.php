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
        Route::post('/store', 'SeasonsController@store');
    });
});

Route::group(['prefix' => 'grandPrixs'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/create', 'GrandPrixController@create');
        Route::post('/store', 'GrandPrixController@store');
    });
    Route::get('/show/{id}', 'GrandPrixController@show');
});

Route::group(['prefix' => 'gp_pilote'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/create/{gp_id}', 'Gp_PiloteController@create');
        Route::post('/store', 'Gp_PiloteController@store');
    });
});

Route::group(['prefix' => 'pilotes'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/create', 'PilotesController@create');
        Route::post('/store', 'PilotesController@store');
    });
});

Route::group(['prefix' => 'stables'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::get('/create', 'StablesController@create');
        Route::post('/store', 'StablesController@store');
    });
});

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'errors'], function () {
   Route::get('/unauthorised', function () {
       return view('/errors/unauthorised');
   });
});
