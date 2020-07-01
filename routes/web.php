<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => '/user'], function(){
// 	Route::get('/proile', 'UserController@index');
// }); kaydetsene :)