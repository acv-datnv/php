<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth', 'namespace' => 'Admin'], function (){
    Route::resource('user','UsersController');
    Route::resource('category','CategoriesController');
    Route::resource('post','PostController');
    Route::resource('comment','CommentController');
});
