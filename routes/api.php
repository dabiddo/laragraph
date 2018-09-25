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
Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');


Route::middleware('jwt.auth')->get('/user', function () {
    Route::get('auth/user', 'AuthController@user');
});

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::post('logout', 'AuthController@logout');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
