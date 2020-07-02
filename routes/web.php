<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));

// Route::group(['prefix' => '/user'], function(){
// 	Route::get('/proile', 'UserController@index');
// }); kaydetsene :)
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
