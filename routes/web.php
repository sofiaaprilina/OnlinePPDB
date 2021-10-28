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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Pendaftar
Route::resource('pendaftar','PendaftarController');
Route::get('/index', 'PendaftarController@index')->name('pendaftar.index');
Route::get('/create', 'PendaftarController@create')->name('pendaftar.create');
Route::get('/edit', 'PendaftarController@edit')->name('pendaftar.edit');
Route::get('/edit/{id}', 'PendaftarController@edit')->name('pendaftar.edit');
Route::get('/show', 'PendaftarController@show')->name('pendaftar.show');
Route::get('/show/{id}', 'PendaftarController@show')->name('pendaftar.show');
Route::post('/store', 'PendaftarController@store')->name('pendaftar.store');
Route::put('/update/{id}', 'PendaftarController@update')->name('pendaftar.update');
Route::delete('/destroy', 'PendaftarController@destroy')->name('pendaftar.destroy');
Route::delete('/destroy{id}', 'PendaftarController@destroy')->name('pendaftar.destroy');

//Akun
Route::resource('akun','AkunController');
Route::get('/index', 'AkunController@index')->name('akun.index');
Route::get('/create', 'AkunController@create')->name('akun.create');
Route::get('/edit', 'AkunController@edit')->name('akun.edit');
Route::get('/edit/{id}', 'AkunController@edit')->name('akun.edit');
Route::get('/show', 'AkunController@show')->name('akun.show');
Route::get('/show/{id}', 'AkunController@show')->name('akun.show');
Route::post('/store', 'AkunController@store')->name('akun.store');
Route::put('/update/{id}', 'AkunController@update')->name('akun.update');
Route::delete('/destroy', 'AkunController@destroy')->name('akun.destroy');
Route::delete('/destroy{id}', 'AkunController@destroy')->name('akun.destroy');