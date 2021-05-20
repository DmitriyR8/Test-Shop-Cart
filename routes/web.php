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

Route::get('products', 'ProductController@index');
Route::get('products/all', 'ProductController@getProducts');
Route::get('cart', 'CartController@index');
Route::post('cart/add', 'CartController@addToCart');
Route::post('cart/remove', 'CartController@removeProductFromCart');
Route::post('cart/clear', 'CartController@clearCart');
Route::post('cart/trash', 'CartController@trash');
Route::get('shipping', 'ShippingController@index');
Route::post('shipping/create', 'ShippingController@store');

Route::get('products/image/{id}', 'ProductController@getImage');

Route::get('cart/total', 'CartController@getTotalProducts');
