<?php

Auth::routes();

Route::get('/', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));

Route::group(['prefix' => '/admin'], function(){
    Route::get('/kullanicilar', 'AdminGetController@kullanicilar');
    Route::post('/kullanicilar', 'AdminPostController@kullanicilar');
});
Route::group(['prefix' => '/reload'], function(){
    Route::get('/admin/kullanicilar', 'AdminReloadController@kullanicilar');
});
