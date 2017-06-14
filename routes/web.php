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

Route::group(['prefix'=>'admin'], function (){

  Route::group(['prefix'=>'post'], function (){

    Route::get('list', 'PostController@getList');

    Route::get('add', 'PostController@getAdd');
    Route::post('add', 'PostController@postAdd');

    Route::get('edit/{id}', 'PostController@getEdit');
    Route::post('edit/{id}', 'PostController@postEdit');

    Route::get('delete/{id}', 'PostController@getDelete');

  });

});