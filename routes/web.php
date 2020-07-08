<?php

Auth::routes();

Route::get('/', function () { return view('welcome');});
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/admin/home', array('as'=>'index','uses'=>'HomeController@index'));

Route::group(['prefix' => 'admin', 'middleware' => 'role:super-admin'], function(){
    Route::get('/kullanicilar', 'AdminGetController@kullanicilar');
    Route::post('/kullanicilar', 'AdminPostController@kullanicilar');
    Route::get('/profile','AdminGetController@profile');
    Route::post('/kullaniciUp','AdminPostController@kullaniciUp');
});
Route::group(['prefix' => 'reload'], function(){
    Route::get('/admin/kullanicilar', 'AdminReloadController@kullanicilar');
});

Route::group(['prefix' => 'uye', 'middleware' => ['role:super-admin|uye']], function () {
    Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));
});

Route::group(['middleware' => ['role:super-admin','auth:web']], function () {

    Route::get('/permissions', 'RoleManager@permissionsIndex')
        ->name('permissions.index')
        ->middleware('permission:KullaniciGor');

    Route::get('/roles', 'RoleManager@rolesIndex')
        ->name('roles.index')
        ->middleware('permission:RolleriGor');

    Route::post('/roles/{role}/assign/{user}', 'RoleManager@rolesAddUser')
        ->name('roles.addUser')
        ->middleware('permission:RoleAta');

    Route::post('/roles/{role}/unassign/{user}', 'RoleManager@rolesRemoveUser')
        ->name('roles.removeUser')
        ->middleware('permission:RoleKaldir');
});
