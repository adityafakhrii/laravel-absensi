<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function() {
    if (Auth::check()){
        return redirect('/dashboard');
    }
    else{
        return view('login');
    }
})->name('login');

Route::post('/do_login', 'AuthController@do_login');
Route::get('/logout', 'AuthController@logout');

Route::get('/', function() {
    
    return redirect('/dashboard');
    
});

Route::group(['middleware' => ['auth','checkRole:admin,user']], function() {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['auth','checkRole:admin']], function() {
    Route::get('/data-karyawan', 'KaryawanController@index');
    Route::get('/data-karyawan/tambah', 'KaryawanController@create');
    Route::post('/data-karyawan/store', 'KaryawanController@store');
    Route::get('/data-karyawan/ubah/{id}', 'KaryawanController@edit');
    Route::post('/data-karyawan/update/{id}', 'KaryawanController@update');
    Route::get('/data-karyawan/hapus/{id}', 'KaryawanController@destroy');

    Route::get('/laporan', 'LaporanController@index');

});

Route::group(['middleware' => ['auth','checkRole:admin,user']], function() {
    Route::post('/data-karyawan/update/{id}', 'KaryawanController@update');
    Route::post('/absen', 'DashboardController@absen');
});