<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OngkosKirim;

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

Route::get('/tracking-pesanan', function () {
    return view('pesan/pesanan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->name('home');;
Route::get('/pesan/{id}', 'PesanController@index')->name('home');
Route::post('/pesan/{id}', 'PesanController@pesan');
Route::get('/check-out', 'PesanController@check_out');
Route::delete('/check-out/{id}', 'PesanController@delete');
Route::get('/konfirmasi-check-out', 'PesanController@konfirmasi');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@update');

Route::get('/konfirmasi_co/', 'konfirmasi_co@index')->name('konfirmasi_co');
Route::post('/konfirmasi_co/', 'konfirmasi_co@index')->name('konfirmasi_co');
Route::get('/alamat', 'konfirmasi_co@alamat')->name('alamat');
Route::get('/tambah_alamat', 'konfirmasi_co@halaman_tambah_alamat');
Route::post('/alamat/', 'konfirmasi_co@tambah_alamat');
Route::get('/ongkir', 'konfirmasi_co@halaman_ongkir')->name('ongkir');

Route::post('/alamat_terpilih/', 'konfirmasi_co@alamat_terpilih')->name('alamat_terpilih');

Route::post('/pilih_co/', 'PesanController@pilih_co')->name('pilih_co');

Route::post('/ongkir_terpilih/', 'konfirmasi_co@ongkir_terpilih')->name('ongkir_terpilih');

Route::get('payment/', 'konfirmasi_co@payment')->name('payment');
Route::post('payment/', 'paymentController@payment_post')->name('payment_post');
Route::post('biayaongkir/', 'konfirmasi_co@payment');

Route::get('biayaongkir/', 'konfirmasi_co@payment');
Route::get('tracking_pending', 'paymentController@pending');
Route::get('tracking_dikemas', 'paymentController@dikemas');

//kota berdasar prov error
// Route::post('/provdankota/', 'konfirmasi_co@halaman_tambah_alamat')->name('provdankota');


// Route::get('alamat_terpilih', 'AjaxController@alamat_terpilih');
// Route::post('ajaxRequest', 'AjaxController@alamat_terpilih')->name('ajaxRequest.post');


//livewire
// Route::get('/ongkos-kirim','\App\Http\Livewire\Ongkir@getOngkir')->name('ongkos-kirim');
// Route::get('/ongkos_kirim','\App\Http\Livewire\OngkosKirim@render')->name('ongkos_kirim');
// Route::get('/ongkos_kirim',OngkosKirim::class);
// Route::get('/ongkos-kirim', function () {
//     return view('livewire.ongkos-kirim');
// });