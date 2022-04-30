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
    return view('pages.halaman.welcome');
});

Route::resource('/dashboard','Admin\AdminController');
Route::resource('/produk', 'Admin\ProdukController');
Route::resource('/umkm', 'Admin\UmkmController');


Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth'], function () {
Route::resource('dashboard', 'Admin\AdminController');
Route::get('logout', 'AuthController@logout')->name('logout');
});
