<?php

Auth::routes();

Route::get('/', function () { return view('welcome');});
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));

Route::group(['prefix' => 'admin', 'middleware' => 'role:super-admin'], function(){
    Route::get('/home', 'AdminGetController@index')->name('adminHome');

    Route::get('/kullanicilar', 'AdminGetController@kullanicilar');
    Route::post('/kullanicilar', 'AdminPostController@kullanicilar');

    Route::get('/profile','AdminGetController@profile');
    Route::post('/profile','AdminPostController@kullaniciUp');
});

Route::group(['prefix' => 'uye', 'middleware' => ['role:super-admin|uye']], function () {
    Route::get('/home', 'UyeGetController@index')->name('uyeHome');
});

Route::group(['prefix' => 'tedarikci', 'middleware' => ['role:super-admin|tedarikci']], function () {
    Route::get('/home', 'TedarikciGetController@index')->name('tedarikciHome');
});

Route::group(['prefix' => 'reload'], function(){
    Route::get('/admin/kullanicilar', 'AdminReloadController@kullanicilar');
    Route::get('/admin/basvurular', 'AdminReloadController@basvuruOnayla');
});

// Route::group(['middleware' => ['role:super-admin','auth:web']], function () {

//     Route::get('/permissions', 'RoleManager@permissionsIndex')
//         ->name('permissions.index')
//         ->middleware('permission:KullaniciGor');

//     Route::get('/roles', 'RoleManager@rolesIndex')
//         ->name('roles.index')
//         ->middleware('permission:RolleriGor');

//     Route::post('/roles/{role}/assign/{user}', 'RoleManager@rolesAddUser')
//         ->name('roles.addUser')
//         ->middleware('permission:RoleAta');

//     Route::post('/roles/{role}/unassign/{user}', 'RoleManager@rolesRemoveUser')
//         ->name('roles.removeUser')
//         ->middleware('permission:RoleKaldir');
// });
