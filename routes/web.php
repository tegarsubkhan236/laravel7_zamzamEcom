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
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/team', 'UserController');
Route::resource('/customer', 'CustomerController');
Route::resource('/category', 'CategoryController');
Route::resource('/produk', 'ProdukController');
//order
Route::get('/order/create', 'OrdersController@create')->name('order.create');
Route::post('/order/create', 'OrdersController@store')->name('order.store');
Route::get('/order', 'OrdersController@index')->name('order');
Route::post('/order/action', 'OrdersController@store')->name('order.action');
