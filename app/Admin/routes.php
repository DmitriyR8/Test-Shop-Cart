<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('products', 'ProductController');
    $router->resource('users', 'UserController');
    $router->resource('orders', 'OrderController');
    $router->resource('shippings', 'ShippingController');
    $router->resource('addresses', 'AddressController');
});
