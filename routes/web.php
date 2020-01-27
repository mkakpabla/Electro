<?php

// Cart route
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{id}/store', 'CartController@store')->name('cart.store');
Route::post('/cart/{id}/store', 'CartController@store')->name('cart.store');
Route::get('/cart/{id}/delete', 'CartController@destroy')->name('cart.delete');
Route::delete('/cart/{id}/delete', 'CartController@destroy')->name('cart.delete');
Route::post('/cart/later/{id}', 'CartController@later')->name('cart.later');
Route::post('/cart/latertocart/{id}', 'CartController@laterToCart')->name('cart.laterToCart');
Route::delete('/cart/latertocart/{id}', 'CartController@laterDestroy')->name('cart.laterDestroy');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');

// Coupon route
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

// Shop route
Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{category}', 'ProductController@category')->name('products.category');
Route::get('/shop/products/{product}', 'ProductController@show')->name('product.show');
Route::get('/search', 'ProductController@search')->name('product.search');
Route::get('/shop/filter', 'ProductController@filter')->name('products.filter');

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


Route::group(['namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function (){
   Route::get('/admin', 'DashboardController@index')->name('admin');
   Route::get('/admin/products', 'ProductsController@index')->name('admin.products.index');
   Route::get('/admin/products/create', 'ProductsController@create')->name('admin.products.create');
   Route::get('/admin/products/{product}/edit', 'ProductsController@edit')->name('admin.products.edit');
   Route::post('/admin/products', 'ProductsController@store')->name('admin.products.store');
   Route::post('/admin/products/{product}', 'ProductsController@update')->name('admin.products.update');
   Route::delete('/admin/products/{product}', 'ProductsController@destroy')->name('admin.products.destroy');
});
