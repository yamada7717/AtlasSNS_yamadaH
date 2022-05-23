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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

//新規登録した際にバリデーションの適用
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {

Route::get('/top','PostsController@show');

//デリート
Route::get('post/{id}/delete','PostsController@delete');
Route::get('post/{id}/delete','PostsController@delete');

Route::post('/create','PostsController@create');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');
Route::get('/searchlist','UsersController@searchlist');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

// ユーザー投稿の一覧表示画面

});

//ログアウトした時ログイン画面に遷移する
Route::get('/logout', 'Auth\LoginController@logout');