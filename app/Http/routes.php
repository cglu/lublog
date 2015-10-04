<?php
use lublog\Article;
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
Route::get('/about', function () {
    $article = Article::where('title', '=', '关于')->first();
    return view('article_detailed')->with('article', $article);
});
Route::get('/mboard', function () {
    $article = Article::where('title', '=', '留言板')->first();
    return view('article_detailed')->with('article', $article);
});
Route::controller('auth', 'Auth\AuthController');

Route::group([
    'middleware' => [
        'auth'
    ],
    'prefix' => 'admin'
], function () {
    
    // 目前使用get方式，如果使用方法欺骗，则需要ajax。暂时不考虑。放到优化阶段
    Route::get('article/del/{id}', 'ArticleController@destroy');
    Route::resource('article', 'ArticleController');
});
