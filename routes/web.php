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

/* 記事一覧を表示する */
Route::get('join.us', 'ArticleController@index')->name('articles.index');

Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth'); 

Route::resource('/articles', 'ArticleController')->only(['show']);

/* いいね機能*/
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

/*タグ別記事一覧画面を表示する */
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

/* ユーザーページを表示する */
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
/*フォロー中・フォロワー一覧を表示する*/
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');

/*フォロー機能 */
Route::middleware('auth')->group(function () {
    Route::put('/{name}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
});

/*マッチング機能 */
Route::get('/matching', 'MatchingController@index')->name('matching'); 

});

