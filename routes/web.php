<?php

Auth::routes();

Route::get('/', function () { return view('welcome');});
Route::get('/home', array('as'=>'index','uses'=>'HomeController@index'));
Route::get('/muhasebe', array('uses'=>'HomeController@muhasebe'));
Route::get('/araclar', array('uses'=>'HomeController@araclar'));
Route::get('/qrcode/{sase?}', array('uses'=>'NoAuthController@qrCode'));

Route::group(['prefix' => 'admin', 'middleware' => 'role:super-admin'], function(){
    Route::get('/home', 'AdminGetController@index')->name('adminHome');

    Route::get('/kullanicilar', 'AdminGetController@kullanicilar');
    Route::post('/kullanicilar', 'AdminPostController@kullanicilar');

    Route::post('/uyeOnay', 'AdminPostController@uyeOnay');
    Route::get('/show', 'AdminGetController@show');

    Route::get('/profile','AdminGetController@profile');
    Route::post('/profile','AdminPostController@kullanicilar');

    Route::get('/araclar', 'AdminGetController@araclar')->name('adminAraclar');

    Route::get('/muhasebe', 'AdminGetController@muhasebe')->name('adminMuhasebe');

});

Route::group(['prefix' => 'uye', 'middleware' => ['role:super-admin|uye']], function () {
    Route::get('/home', 'UyeGetController@index')->name('uyeHome');
    Route::get('/profile', 'UyeGetController@profil')->name('uyeProfil');
    Route::get('/muhasebe', 'UyeGetController@muhasebe')->name('uyeMuhasebe');
    Route::get('/araclar', 'UyeGetController@araclar')->name('uyeAraclar');
    Route::post('/aracPost', 'UyePostController@aracPost')->name('uyeAracPost');
    Route::get('/aracDetay/{sase}', 'UyeGetController@aracDetay')->name('uyeAracDetay');
    Route::post('/hesapguncelle','UyePostController@hesapguncelle')->name('hesapguncelle');
    Route::post('/ticariGuncelle','UyePostController@ticariGuncelle')->name('ticariGuncelle');
});

Route::group(['prefix' => 'tedarikci', 'middleware' => ['role:super-admin|tedarikci']], function () {
    Route::get('/home', 'TedarikciGetController@index')->name('tedarikciHome');
    Route::get('/profile', 'TedarikciGetController@profil')->name('tedarikciProfil');
    Route::get('/muhasebe', 'TedarikciGetController@muhasebe')->name('tedarikciMuhasebe');
});

Route::group(['prefix' => 'reload'], function(){
    Route::get('/uye/araclar', 'UyeReloadController@araclar');
    Route::get('/admin/araclar', 'AdminReloadController@araclar');
    Route::get('/admin/kullanicilar', 'AdminReloadController@kullanicilar');
    Route::get('/admin/basvurular', 'AdminReloadController@basvuruOnayla');
});
