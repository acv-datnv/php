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
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth', 'namespace' => 'Admin'], function (){
  Route::resource('user','UsersController');
  Route::resource('category','CategoriesController');
  Route::resource('post','PostController');
  Route::resource('comment','CommentController');
  Route::post('user/checkemail', 'UsersController@checkEmailAjax');
  Route::get('user/export', 'UsersController@export');
});

Route::group(['prefix'=>'site', 'middleware'=>'auth'], function (){
    Route::resource('comment-site','CommentController');
    Route::resource('post-site','PostController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
