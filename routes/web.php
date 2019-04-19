<?php

// Cart route
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/later/{id}', 'CartController@later')->name('cart.later');
Route::post('/cart/latertocart/{id}', 'CartController@laterToCart')->name('cart.laterToCart');
Route::delete('/cart/latertocart/{id}', 'CartController@laterDestroy')->name('cart.laterDestroy');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');

// Coupon route
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

// Shop route
Route::get('/', 'ProductController@index')->name('shop.index');
Route::get('/boutique', 'ProductController@index')->name('shop.index');
Route::get('/boutique/products/{product}', 'ProductController@show')->name('product.show');
Route::get('/search', 'ProductController@search')->name('product.search');

Route::get('checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('guestcheckout', 'CheckoutController@index')->name('guestcheckout.index');


Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register', 'RegisterController@create')->name('register.create');
    Route::post('/register', 'RegisterController@store')->name('register.store');
    Route::get('/login', 'LoginController@create')->name('login.create');
    Route::post('/login', 'LoginController@store')->name('login.store');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/confirmed/{user}/{token}', 'ConfirmationController@store')->name('confirmed');
});
