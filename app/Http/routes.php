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
 //基础功能
Route::get('/', 'PageController@welcome');
Route::get('/about','PageController@about');
Route::get('/mboard', 'PageController@mboard');
Route::get('/feed', 'PageController@feed');
//文章详细
Route::get('article/{id}', 'ArticleController@show');
//认证
Route::controller('auth', 'Auth\AuthController');
//各种检索
Route::group([  'prefix' => 'search'],function(){
    Route::get('categories', 'SearchController@searchArticleByCategories');
    Route::get('archive', 'SearchController@searchArticleByDate');
});
//后台
Route::group([
    'middleware' => [
        'auth'
    ],
    'prefix' => 'admin'
], function () {
    
    // 目前使用get方式，如果使用方法欺骗，则需要ajax。暂时不考虑。放到优化阶段
    Route::get('article/del/{id}', 'ArticleController@destroy');
    Route::resource('article', 'ArticleController');
    
    Route::get('categories/del/{id}', 'CategoriesController@destroy');
    Route::resource('categories', 'CategoriesController',
         ['only' => ['index', 'store']]);
});
