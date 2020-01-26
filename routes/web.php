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
// Kasir Pos
Route::get('/','Beranda\Beranda_controller@index');
Route::get('/yajra','Beranda\Beranda_controller@yajra');
Route::get('/get/{id}','Beranda\Beranda_controller@get');
Route::post('/submit/{code}','Beranda\Beranda_controller@submit');
Route::get('/hapus-temp/{id}/{code}','Beranda\Beranda_controller@hapus_temp');
Route::post('/selesai/{code}/{total}','Beranda\Beranda_controller@selesai');
Route::get('/hapus-transaksi/{code}','Beranda\Beranda_controller@hapus_transaksi');

Route::post('/simpan-transaksi/{code}','Beranda\Beranda_controller@simpan_transaksi');

Route::get('/open-transaksi/{code}','Beranda\Beranda_controller@open_transaksi');

Route::get('/new-transaksi/{code}','Beranda\Beranda_controller@new_transaction');

// Admin ============================================================================================

Route::group(['middleware'=>'auth'],function(){
	// Reranda
	Route::get('/admin', 'Admin\Beranda_controller@index');

	// Barang
	Route::get('/admin/barang','Admin\Barang_controller@index');
	Route::get('/admin/barang/yajra','Admin\Barang_controller@yajra');
	Route::post('/admin/barang','Admin\Barang_controller@store');
	Route::get('/admin/barang/get/{id}','Admin\Barang_controller@getData');
	Route::put('/admin/barang/{id}','Admin\Barang_controller@update');

	// Transaksi
	Route::get('/admin/transaksi','Admin\Transaksi_controller@index');
	Route::get('/admin/transaksi/yajra','Admin\Transaksi_controller@yajra');
	Route::get('/admin/transaksi/tanggal','Admin\Transaksi_controller@periksa');
	Route::get('/admin/transaksi/yajra/{tgl1}/{tgl2}','Admin\Transaksi_controller@yajra_tanggal');

	// Jasa
	Route::get('/admin/jasa','Admin\Jasa_controller@index');

	// Keluar
	Route::get('/keluar','Beranda\Beranda_controller@keluar');
});

Auth::routes();

Route::get('/home', function(){
	return redirect('admin');
});
