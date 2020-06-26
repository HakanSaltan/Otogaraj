<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PagesController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => '/user'], function(){
// 	Route::get('/proile', 'UserController@index');
// }); 