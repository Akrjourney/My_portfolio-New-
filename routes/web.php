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


/* */
Route::get('join.us', function () {
    return view('welcome');
});
/*登録・ログイン */
Auth::routes();
/* 記事*/
Route::get('/', 'ArticleController@index');

