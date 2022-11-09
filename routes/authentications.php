<?php

$router->get('/authentication/login', 'App\Controllers\AuthenticationController@login');
$router->post('/authentication/login', 'App\Controllers\AuthenticationController@handleLogin');
$router->get('/authentication/register', 'App\Controllers\AuthenticationController@register');
$router->post('/authentication/register', 'App\Controllers\AuthenticationController@createUser');
$router->get('/authentication/logout', 'App\Controllers\AuthenticationController@logout');


