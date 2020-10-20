<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* トップページ*/
Route::get('/', function () {
    return view('welcome');
});

/*登録・ログイン */
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/* 記事*/
Route::get('join.us', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); 
Route::resource('/articles', 'ArticleController')->only(['show']);


