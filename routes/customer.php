<?php

$router->get('/customer/index', 'App\Controllers\CustomerController@index');
$router->get('/customer/admin', 'App\Controllers\CustomerController@admin');
$router->get('/customer/product-detail/(\d+)', 'App\Controllers\CustomerController@detail');
$router->get('/customer/edit/(\d+)', 'App\Controllers\CustomerController@showEditPage');
$router->post('/customer/(\d+)', 'App\Controllers\CustomerController@update');
$router->get('/customer/delete/(\d+)', 'App\Controllers\CustomerController@delete');
$router->get('/customer/add', 'App\Controllers\CustomerController@showAddPage');
$router->post('/customer/create', 'App\Controllers\CustomerController@create');
$router->post('/customer/product-detail/(\d+)', 'App\Controllers\CustomerController@order');
$router->get('/customer/cart', 'App\Controllers\CustomerController@cart');
$router->get('/customer/cart/delete/(\d+)', 'App\Controllers\CustomerController@deleteProductInCart');
$router->get('/customer/cart/updateQuantity/(\d+)/(\d+)', 'App\Controllers\CustomerController@updateQuantity');
$router->post('/customer/cart', 'App\Controllers\CustomerController@createBill');
$router->get('/customer/allBill', 'App\Controllers\CustomerController@bill');