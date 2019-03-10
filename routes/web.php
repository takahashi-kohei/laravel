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

Route::get('/', function () {
    //return view('welcome');
    return view('top');
});

// 画面表示、値受け渡し
Route::get('beginner', 'BeginnerController@index');

// DBから値を取得
Route::get('sample/model/{type?}', 'SampleController@model');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//usersのCRUD機能を実装
Route::resource('users','UserController');

//postsのCRUD機能を実装
Route::resource('posts', 'PostController');
