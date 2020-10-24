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

/*ログアウト機能 */

/* 記事一覧を表示する */
Route::get('join.us', 'ArticleController@index')->name('articles.index');

Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); 

Route::resource('/articles', 'ArticleController')->only(['show']);

/* ユーザーページを表示する */
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
});

//フォロー機能
Route::resource('users', 'UsersController', ['only' => ['show']]);

Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('followings', 'UsersController@followings')->name('followings');
    Route::get('followers', 'UsersController@followers')->name('followers');
    });

Route::group(['middleware' => 'auth'], function () {
    Route::put('users', 'UsersController@rename')->name('rename');

Route::group(['prefix' => 'users/{id}'], function () {
    Route::post('follow', 'UserFollowController@store')->name('follow');
    Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });

    Route::resource('movies', 'MoviesController', ['only' => ['create', 'store', 'destroy']]);
});

