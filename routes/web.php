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
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/later/{id}', 'CartController@later')->name('cart.later');
Route::post('/cart/latertocart/{id}', 'CartController@laterToCart')->name('cart.laterToCart');
Route::delete('/cart/latertocart/{id}', 'CartController@laterDestroy')->name('cart.laterDestroy');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');


Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::resource('products', 'ProductController')->only(['index', 'show']);

Route::resource('checkout', 'CheckoutController');

