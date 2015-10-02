<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get('/', 'ArticleController@index2');
Route::get('article/{id}', 'ArticleController@show');
Route::get('/about', function () {return view('about');});
Route::controller('auth', 'Auth\AuthController');



Route::group([
    'middleware' => [
        'auth'
    ],
    'prefix' => 'admin'
], function () {
    
    Route::resource('article', 'ArticleController');
});
