<?php

Auth::routes();

Route::get('/', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/admin/home', array('as'=>'index','uses'=>'HomeController@index'));

Route::group(['prefix' => '/admin'], function(){
    Route::get('/kullanicilar', 'AdminGetController@kullanicilar');
    Route::post('/kullanicilar', 'AdminPostController@kullanicilar');
    Route::get('/profile','AdminGetController@profile');
    Route::post('/kullaniciUp','AdminPostController@kullaniciUp');
});
Route::group(['prefix' => '/reload'], function(){
    Route::get('/admin/kullanicilar', 'AdminReloadController@kullanicilar');
});
