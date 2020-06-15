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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login'); // memberi nama login untuk route
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// memasukkan route ke dalam grup untuk melakukan authentifikasi
Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
    Route::get('/mahasiswa', 'MahasiswaController@index');
    Route::post('/mahasiswa/create','MahasiswaController@create');
    Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit');
    Route::post('/mahasiswa/{id}/update', 'MahasiswaController@update');
    Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete');
    Route::get('/mahasiswa/{id}/profile', 'MahasiswaController@profile');
  });

Route::group(['middleware' => ['auth', 'checkRole:admin,mahasiswa']],function(){    
  Route::get('/dashboard', 'DashboardController@index');
});
