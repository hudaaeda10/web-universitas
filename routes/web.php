<?php

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

Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');
Route::get('/about', 'SiteController@about');

Route::get('/login', 'AuthController@login')->name('login'); // memberi nama login untuk route
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// memasukkan route ke dalam grup untuk melakukan authentifikasi
Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::post('/mahasiswa/create','MahasiswaController@create');
    Route::get('/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit');
    Route::post('/mahasiswa/{mahasiswa}/update', 'MahasiswaController@update');
    Route::get('/mahasiswa/{mahasiswa}/delete', 'MahasiswaController@delete');
    Route::get('/mahasiswa/{mahasiswa}/profile', 'MahasiswaController@profile');
    Route::post('/mahasiswa/{id}/addnilai', 'MahasiswaController@addnilai');
    Route::get('/mahasiswa/{mahasiswa}/{idmapel}/deletenilai', 'MahasiswaController@deletenilai');
    Route::get('/mahasiswa/exportExcel', 'MahasiswaController@exportExcel');
    Route::get('/mahasiswa/exportPdf', 'MahasiswaController@exportPdf'); 
    Route::get('/dosen/{id}/profile', 'DosenController@profile');    
  });

Route::group(['middleware' => ['auth', 'checkRole:admin,mahasiswa']],function(){
  Route::get('/dashboard', 'DashboardController@index');
});
