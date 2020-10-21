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


/* トップページを表示する */
Route::get('/', function () {
    return view('welcome');
});

/* 登録・ログイン機能 */
Auth::routes();

/* ログアウト後、トップページに遷移する */
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/* 記事一覧を表示する */
Route::get('join.us', 'ArticleController@index')->name('articles.index');

Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); 

Route::resource('/articles', 'ArticleController')->only(['show']);

/* ユーザーページを表示する */
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
});

