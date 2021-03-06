<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/posts', 'PostsController@index');

Route::post('/register', 'UsersController@register');
Route::post('/login', 'UsersController@login');

Route::post('/post', 'PostsController@store');
Route::post('/comment', 'UsersController@store');

Route::post('/userInfo', 'UsersController@userInfo');
Route::post('/userPosts', 'UsersController@userPosts');