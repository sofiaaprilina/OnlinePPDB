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
    return view('frontpage');
});

Auth::routes();

//login admin
Route::get('/admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminAuthController@postLogin');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth:admin')->group(function(){
    Route::get('/dashboard', 'HomeController1@index')->name('admin.home');
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
Route::post('/konfirmasi', 'PendaftarController@confirm')->name('pendaftar.konfirmasi');
Route::get('/add/{id}', 'PendaftarController@add')->name('pendaftar.add');
Route::post('/olah/{id}', 'PendaftarController@olah')->name('pendaftar.olah');
Route::get('/koneksi', 'PendaftarController@connect')->name('pendaftar.connect');

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
});

//Form
Route::resource('form','FormController');
Route::get('/index', 'FormController@index')->name('form.index');
Route::get('/create', 'FormController@create')->name('form.create');

//Biodata
Route::resource('biodata','BiodataController');
Route::get('/index', 'BiodataController@index')->name('biodata.index');
Route::get('/create', 'BiodataController@create')->name('biodata.create');
Route::get('/edit', 'BiodataController@edit')->name('biodata.edit');
Route::get('/edit/{id}', 'BiodataController@edit')->name('biodata.edit');
Route::get('/show', 'BiodataController@show')->name('biodata.show');
Route::get('/show/{id}', 'BiodataController@show')->name('biodata.show');
Route::post('/store', 'BiodataController@store')->name('biodata.store');
Route::put('/update/{id}', 'BiodataController@update')->name('biodata.update');
Route::delete('/destroy', 'BiodataController@destroy')->name('biodata.destroy');
Route::delete('/destroy{id}', 'BiodataController@destroy')->name('biodata.destroy');

//Berkas
Route::resource('berkas','BerkasController');
Route::get('/index', 'BerkasController@index')->name('berkas.index');
Route::get('/create', 'BerkasController@create')->name('berkas.create');
Route::get('/edit', 'BerkasController@edit')->name('berkas.edit');
Route::get('/edit/{id}', 'BerkasController@edit')->name('berkas.edit');
Route::get('/show', 'BerkasController@show')->name('berkas.show');
Route::get('/show/{id}', 'BerkasController@show')->name('berkas.show');
Route::post('/store', 'BerkasController@store')->name('berkas.store');
Route::put('/update/{id}', 'BerkasController@update')->name('berkas.update');
Route::delete('/destroy', 'BerkasController@destroy')->name('berkas.destroy');
Route::delete('/destroy{id}', 'BerkasController@destroy')->name('berkas.destroy');

//Cetak
Route::resource('cetak','CetakController');
Route::get('/index', 'CetakController@index')->name('cetak.index');
Route::get('/create', 'CetakController@create')->name('cetak.create');
Route::get('/edit', 'CetakController@edit')->name('cetak.edit');
Route::get('/edit/{id}', 'CetakController@edit')->name('cetak.edit');
Route::get('/show', 'CetakController@show')->name('cetak.show');
Route::get('/show/{id}', 'CetakController@show')->name('cetak.show');
Route::post('/store', 'CetakController@store')->name('cetak.store');
Route::put('/update/{id}', 'CetakController@update')->name('cetak.update');
Route::delete('/destroy', 'CetakController@destroy')->name('cetak.destroy');
Route::delete('/destroy{id}', 'CetakController@destroy')->name('cetak.destroy');
Route::get('/cetak_pdf', 'CetakController@cetak')->name('cetak.cetak_pdf');