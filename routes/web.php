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


Route::get('/', 'Auth\UserAuthController@index');
Route::get('/register', 'RegisterController@index')->middleware('guest');

Route::post('/register', 'RegisterController@store');

Route::get('/login', 'Auth\UserAuthController@index')->name('login')->middleware('guest');
Route::post('/login', 'Auth\UserAuthController@loginPost');
Route::post('/logout',  'Auth\UserAuthController@logout' );
Route::view('/master', 'layouts.master');


Route::group(['middleware' => ['auth']] , function(){

    Route::get('/home', 'HomeController@index');
    
    Route::resource('biodata','BiodataController');
    
    Route::view('/contact', 'contact'
    );
    Route::view('/about', 'about'
    );
    
    Route::get('posts/{slug}', 'PostController@show');


    //Master Data
    Route::get('/master', 'MasterDataController@index');
    Route::get('/master-posisi-karyawan', 'MasterDataController@posisiKaryawan');
    Route::post('/add-posisi-karyawan', 'MasterDataController@addPosisiKaryawan');
    Route::get('/change-posisi-karyawan/{id}', 'MasterDataController@changeStatusPosisi');
    Route::post('/edit-posisi-karyawan', 'MasterDataController@editPosisi');

    //Notifikasi
    Route::get('/get-notification', 'NotifikasiController@index');
    Route::get('/get-count-notification', 'NotifikasiController@getCountNotification')->name('get-count-notification');
    Route::get('/get-count-messages', 'NotifikasiController@getCountMessages')->name('get-count-messages');
    Route::get('/get-messages', 'NotifikasiController@getMessages')->name('get-messages');
    

    //Message
    Route::get('/get-messages-detail/{id}', 'MessageController@getDetail');
    Route::post('/send-messages', 'MessageController@sendMessage')->name('send-messages');
    Route::get('/list-messages', 'MessageController@getListMessages');


    //Approval Register

    Route::get('/get-approval-register/{id}/{id_notif}', 'RegisterController@getApprovalRegister');
    Route::post('/approval-register', 'RegisterController@approvalRegister');
    
    //Pelatihan
    Route::get('/pelatihan', 'PelatihanController@index');
    Route::post('/pelatihan', 'PelatihanController@pengajuanPelatihan');
    Route::get('/detail-pelatihan/{id}/{id_notif}', 'PelatihanController@getPelatihan');
    Route::post('/approval-pelatihan', 'PelatihanController@approvalPelatihan');


});




