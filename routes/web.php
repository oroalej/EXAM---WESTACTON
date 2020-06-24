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

Route::get('/', static function() {
  return redirect()->route('products.index');
});

Route::group([ 'prefix' => 'orders', 'as' => 'order.' ], static function () {
  Route::get('', 'OrderController@index')->name('index');
  Route::post('', 'OrderController@store')->name('store');
});

Route::resource('products', 'ProductController');
Route::resource('cart', 'CartController');
