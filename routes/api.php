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


//API ACCOUNT
Route::get('account', 'AccountController@index'); //read data
Route::post('account', 'AccountController@create'); //insert data
Route::put('account/{id}', 'AccountController@update'); //update data
Route::delete('account/{id}', 'AccountController@delete'); //delete data


//API POST
Route::get('post', 'PostController@index'); //read data
Route::post('post', 'PostController@create'); //insert data
Route::put('post/{id}', 'PostController@update'); //update data
Route::delete('post/{id}', 'PostController@delete'); //delete data