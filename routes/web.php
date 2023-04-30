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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard', 'HomeController@dashboard')->name('admin');



Route::group(['middleware'=>['auth','IsAdmin:admin']],function(){
// Dashboard Admin
	Route::get('/admin/dashboard', 'HomeController@dashboard')->name('admin');

// Manage User
	Route::get('/admin/list_user','HomeController@list_user');
	Route::get('/admin/list_user/hapus_user/{id}', 'HomeController@delete_user');
	Route::get('/admin/list_user/tambah_user', 'HomeController@tambah_user');
	Route::get('/admin/list_user/edit_user/{id}', 'HomeController@edit_user');
	Route::post('/admin/tambah_user/upload', 'HomeController@upload_user');
	Route::post('/admin/edit_user/update', 'HomeController@update_user');
	Route::post('/cek_user', 'HomeController@cek_user')->name('cek_user');
	Route::post('/cek_email', 'HomeController@cek_email')->name('cek_email');


// Manage outlet
	Route::get('/admin/list_outlet','HomeController@list_outlet');
	Route::get('/admin/list_outlet/tambah_outlet', 'HomeController@tambah_outlet');
	Route::post('/admin/tambah_outlet/upload', 'HomeController@upload_outlet');
	Route::get('/admin/list_outlet/hapus_outlet/{id}', 'HomeController@delete_outlet');
	Route::get('/admin/list_outlet/edit_outlet/{id}', 'HomeController@edit_outlet');
	Route::post('/admin/edit_outlet/update', 'HomeController@update_outlet');
	Route::get('/admin/list_outlet/pdf','HomeController@outlet_pdf');


// Manage member
	Route::get('/admin/list_member','HomeController@list_member');
	Route::get('/admin/list_member/pdf','HomeController@member_pdf');
	Route::get('/admin/list_member/tambah_member', 'HomeController@tambah_member');
	Route::post('/admin/tambah_member/upload', 'HomeController@upload_member');
	Route::get('/admin/list_member/hapus_member/{id}', 'HomeController@delete_member');
	Route::get('/admin/list_member/edit_member/{id}', 'HomeController@edit_member');
	Route::post('/admin/edit_member/update', 'HomeController@update_member');


// Manage paket
	Route::get('/admin/list_paket','HomeController@list_paket');
	Route::get('/admin/list_paket/tambah_paket', 'HomeController@tambah_paket');
	Route::post('/admin/tambah_paket/upload', 'HomeController@upload_paket');
	Route::get('/admin/list_paket/hapus_paket/{id}', 'HomeController@delete_paket');
	Route::get('/admin/list_paket/edit_paket/{id}', 'HomeController@edit_paket');
	Route::post('/admin/edit_paket/update', 'HomeController@update_paket');
	Route::post('/admin/list_paket/pdf','HomeController@paket_pdf');


	Route::get('/admin/tambah_transaksi/upload/{outlet}', 'HomeController@upload_transaksi');
	Route::post('/admin/tambah_transaksi/update', 'HomeController@update_transaksi');
	Route::post('/admin/tambah_transaksi/update_bayar', 'HomeController@update_bayar');
	Route::post('/admin/tambah_transaksi/update_biaya', 'HomeController@update_biaya');
	Route::get('/admin/list_transaksi/tambah_transaksi/{id}', 'HomeController@tambah_transaksi');
// Manage transaksi

	Route::get('/admin/list_transaksi','HomeController@menu_transaksi');
	Route::get('/admin/{id}/list_transaksi','HomeController@list_transaksi');
	Route::get('/admin/list_transaksi/hapus_transaksi/{id}', 'HomeController@delete_transaksi');
	Route::get('/admin/list_transaksi/bayar/{id}', 'HomeController@bayar_transaksi');
	Route::get('/admin/list_transaksi/batal_bayar/{id}', 'HomeController@batal_transaksi');
	Route::post('/admin/detail_transaksi/status', 'HomeController@update_status')->name('update_status');
	Route::post('/admin/detail_transaksi/status1', 'HomeController@update_status1')->name('update_status1');
	Route::post('/admin/list_transaksi/pdf','HomeController@transaksi_pdf');
	Route::post('/cek_harga', 'HomeController@cek_harga')->name('cek_harga');

	// Detail Transaksi
	Route::get('/admin/list_transaksi/detail_transaksi/{id}', 'HomeController@tambah_detail');
	Route::get('/admin/detail_transaksi/{id}', 'HomeController@detail_transaksi');
	Route::post('/admin/tambah_transaksi/detail/upload', 'HomeController@upload_detail');
	Route::get('/admin/invoice/{id}','HomeController@invoice');
});

Route::group(['middleware'=>['auth','IsAdmin:owner']],function(){
// Dashboard Admin
	Route::get('/owner/dashboard', 'OwnerController@dashboard')->name('owner');

// Manage User
	Route::get('/owner/list_user','OwnerController@list_user');
	Route::get('/owner/list_user/hapus_user/{id}', 'OwnerController@delete_user');
	Route::get('/owner/list_user/tambah_user', 'OwnerController@tambah_user');
	Route::get('/owner/list_user/edit_user/{id}', 'OwnerController@edit_user');
	Route::post('/owner/tambah_user/upload', 'OwnerController@upload_user');
	Route::post('/owner/edit_user/update', 'OwnerController@update_user');


// Manage outlet
	Route::get('/owner/list_outlet','OwnerController@list_outlet');
	Route::get('/owner/list_outlet/tambah_outlet', 'OwnerController@tambah_outlet');
	Route::post('/owner/tambah_outlet/upload', 'OwnerController@upload_outlet');
	Route::get('/owner/list_outlet/hapus_outlet/{id}', 'OwnerController@delete_outlet');
	Route::get('/owner/list_outlet/edit_outlet/{id}', 'OwnerController@edit_outlet');
	Route::post('/owner/edit_outlet/update', 'OwnerController@update_outlet');
	Route::get('/owner/list_outlet/pdf','OwnerController@outlet_pdf');


// Manage member
	Route::get('/owner/list_member','OwnerController@list_member');
	Route::get('/owner/list_member/pdf','OwnerController@member_pdf');
	Route::get('/owner/list_member/tambah_member', 'OwnerController@tambah_member');
	Route::post('/owner/tambah_member/upload', 'OwnerController@upload_member');
	Route::get('/owner/list_member/hapus_member/{id}', 'OwnerController@delete_member');
	Route::get('/owner/list_member/edit_member/{id}', 'OwnerController@edit_member');
	Route::post('/owner/edit_member/update', 'OwnerController@update_member');


// Manage paket
	Route::get('/owner/list_paket','OwnerController@list_paket');
	Route::get('/owner/list_paket/tambah_paket', 'OwnerController@tambah_paket');
	Route::post('/owner/tambah_paket/upload', 'OwnerController@upload_paket');
	Route::get('/owner/list_paket/hapus_paket/{id}', 'OwnerController@delete_paket');
	Route::get('/owner/list_paket/edit_paket/{id}', 'OwnerController@edit_paket');
	Route::post('/owner/edit_paket/update', 'OwnerController@update_paket');
	Route::post('/owner/list_paket/pdf','OwnerController@paket_pdf');


	Route::get('/owner/tambah_transaksi/upload/{outlet}', 'OwnerController@upload_transaksi');
	Route::post('/owner/tambah_transaksi/update', 'OwnerController@update_transaksi');
	Route::post('/owner/tambah_transaksi/update_bayar', 'OwnerController@update_bayar');
	Route::post('/owner/tambah_transaksi/update_biaya', 'OwnerController@update_biaya');
	Route::get('/owner/list_transaksi/tambah_transaksi/{id}', 'OwnerController@tambah_transaksi');
// Manage transaksi

	Route::get('/owner/list_transaksi','OwnerController@menu_transaksi');
	Route::get('/owner/{id}/list_transaksi','OwnerController@list_transaksi');
	Route::get('/owner/list_transaksi/hapus_transaksi/{id}', 'OwnerController@delete_transaksi');
	Route::get('/owner/list_transaksi/bayar/{id}', 'OwnerController@bayar_transaksi');
	Route::get('/owner/list_transaksi/batal_bayar/{id}', 'OwnerController@batal_transaksi');
	Route::post('/owner/list_transaksi/pdf','HomeController@transaksi_pdf');

	// Detail Transaksi
	Route::get('/owner/list_transaksi/detail_transaksi/{id}', 'OwnerController@tambah_detail');
	Route::get('/owner/detail_transaksi/{id}', 'OwnerController@detail_transaksi');
	Route::post('/owner/tambah_transaksi/detail/upload', 'OwnerController@upload_detail');
	Route::get('/owner/invoice/{id}','OwnerController@invoice');
});

Route::group(['middleware'=>['auth','IsAdmin:kasir']],function(){

	Route::get('/kasir/dashboard', 'KasirController@dashboard')->name('kasir');
// Manage member
	Route::get('/kasir/list_member','KasirController@list_member');
	Route::get('/kasir/list_member/tambah_member', 'KasirController@tambah_member');
	Route::post('/kasir/tambah_member/upload', 'KasirController@upload_member');
	Route::get('/kasir/list_member/hapus_member/{id}', 'KasirController@delete_member');
	Route::get('/kasir/list_member/edit_member/{id}', 'KasirController@edit_member');
	Route::post('/kasir/edit_member/update', 'KasirController@update_member');


// Manage paket
	Route::get('/kasir/list_paket','KasirController@list_paket');
	Route::get('/kasir/list_paket/tambah_paket', 'KasirController@tambah_paket');
	Route::post('/kasir/tambah_paket/upload', 'KasirController@upload_paket');
	Route::get('/kasir/list_paket/hapus_paket/{id}', 'KasirController@delete_paket');
	Route::get('/kasir/list_paket/edit_paket/{id}', 'KasirController@edit_paket');
	Route::post('/kasir/edit_paket/update', 'KasirController@update_paket');


// Manage transaksi
	Route::get('/kasir/tambah_transaksi/upload', 'KasirController@upload_transaksi');
	Route::post('/kasir/tambah_transaksi/update', 'KasirController@update_transaksi');
	Route::post('/kasir/tambah_transaksi/update_bayar', 'KasirController@update_bayar');
	Route::post('/kasir/tambah_transaksi/update_biaya', 'KasirController@update_biaya');
	Route::get('/kasir/list_transaksi/tambah_transaksi/{id}', 'KasirController@tambah_transaksi');

	Route::get('/kasir/list_transaksi','KasirController@list_transaksi');
	Route::get('/kasir/list_transaksi/tambah_transaksi', 'KasirController@tambah_transaksi');
	Route::post('/kasir/tambah_transaksi/upload', 'KasirController@upload_transaksi');
	Route::get('/kasir/list_transaksi/hapus_transaksi/{id}', 'KasirController@delete_transaksi');
	Route::get('/kasir/list_transaksi/bayar/{id}', 'KasirController@bayar_transaksi');
	Route::get('/kasir/list_transaksi/batal_bayar/{id}', 'KasirController@batal_transaksi');
	Route::post('/kasir/detail_transaksi/status', 'KasirController@update_status')->name('update_status_kasir');
	Route::post('/kasir/detail_transaksi/status1', 'KasirController@update_status1')->name('update_status1_kasir');

	Route::post('/kasir/list_transaksi/pdf','HomeController@transaksi_pdf');
	Route::get('/kasir/invoice/{id}','OwnerController@invoice');
	Route::get('/kasir/list_member/pdf','HomeController@member_pdf');
	// Detail Transaksi
	Route::get('/kasir/list_transaksi/detail_transaksi/{id}', 'KasirController@tambah_detail');
	Route::get('/kasir/detail_transaksi/{id}', 'KasirController@detail_transaksi');
	Route::post('/kasir/tambah_transaksi/detail/upload', 'KasirController@upload_detail');
	Route::post('/cek_harga_kasir', 'KasirController@cek_harga')->name('cek_harga_kasir');

});