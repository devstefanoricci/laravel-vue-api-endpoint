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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', 'UserController@index');
//Route::get('list/{page}', 'UserController@paging');

Route::group(['prefix' => 'user'], function () {
//    Route::post('add', 'UserController@add');
    Route::get('show/{id}', 'UserController@show');
//    Route::get('edit/{id}', 'UserController@edit');
//    Route::post('update/{id}', 'UserController@update');
    Route::delete('delete/{id}', 'UserController@delete');
});
