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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('utenti', 'UserController@index')->name('index-users');
//Route::get('utente/mostra/{id}', 'UserController@show')->name('show-user');
//Route::delete('utente/cancella/{id}', 'UserController@destroy')->name('user-destroy');

Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');