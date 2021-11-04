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

//Siswa
Route::resource('siswa','SiswaController');
Route::get('/index', 'SiswaController@index')->name('siswa.index');
Route::get('/create', 'SiswaController@create')->name('siswa.create');
Route::get('/edit', 'SiswaController@edit')->name('siswa.edit');
Route::get('/edit/{id}', 'SiswaController@edit')->name('siswa.edit');
Route::get('/show', 'SiswaController@show')->name('siswa.show');
Route::get('/show/{id}', 'SiswaController@show')->name('siswa.show');
Route::post('/store', 'SiswaController@store')->name('siswa.store');
// Route::put('/update', 'SiswaController@update')->name('siswa.update');
Route::put('/update/{id}', 'SiswaController@update')->name('siswa.update');
Route::delete('/destroy', 'SiswaController@destroy')->name('siswa.destroy');
Route::delete('/destroy{id}', 'SiswaController@destroy')->name('siswa.destroy');

//Form
Route::resource('form','FormController');
Route::get('/index', 'FormController@index')->name('form.index');
Route::get('/create', 'FormController@create')->name('form.create');
Route::get('/edit', 'FormController@edit')->name('form.edit');
Route::get('/edit/{id}', 'FormController@edit')->name('form.edit');
Route::get('/show', 'FormController@show')->name('form.show');
Route::get('/show/{id}', 'FormController@show')->name('form.show');
Route::post('/store', 'FormController@store')->name('form.store');
Route::put('/update/{id}', 'FormController@update')->name('form.update');
Route::delete('/destroy', 'FormController@destroy')->name('form.destroy');
Route::delete('/destroy{id}', 'FormController@destroy')->name('form.destroy');
