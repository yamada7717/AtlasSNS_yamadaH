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

  Route::get('/top','PostsController@index');

  //新規投稿
  Route::post('/create','PostsController@create');
  //投稿編集
  Route::post('/edit/{id}','PostsController@edit');
  Route::post('/update/{id}','PostsController@update');
  //投稿消去
  Route::get('post/{id}/delete','PostsController@delete');

  Route::get('/profile','UsersController@profile');
  Route::get('/search','UsersController@search');
  Route::get('/searchList','UsersController@searchList');
  Route::post('/updateProfile','UsersController@updateProfile');



  Route::get('/followList','FollowsController@followList');
  Route::get('/followerList','FollowsController@followerList');

  //フォロー
  Route::post('/follow','FollowsController@follow');
  //フォロー解除
  Route::post('/unFollow','FollowsController@unFollow');



});

//ログアウトした時ログイン画面に遷移する
Route::get('/logout', 'Auth\LoginController@logout');