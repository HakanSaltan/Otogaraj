<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));

// Route::group(['prefix' => '/user'], function(){
// 	Route::get('/proile', 'UserController@index');
// });

