<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('/users', 'App\Http\Controllers\UsersController@index');

Route::namespace('App\Http\Controllers')
    ->prefix('/comments')
    ->group(function() {
        Route::get('/', 'CommentController@index');
        Route::post('/', 'CommentController@store');
        Route::post('/reply', 'ReplyController@store');
        Route::post('/reply/sub', 'SubReplyController@store');
    });

