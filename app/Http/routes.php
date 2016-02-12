<?php

 // Route::get('/', 'Auth\AuthController@getRegister');
 // Route::get('auth/register', 'Auth\AuthController@getRegister');
 // Route::post('auth/register', 'Auth\AuthController@postRegister');
 // Route::get('auth/login', 'Auth\AuthController@getLogin');
 // Route::post('auth/login', 'Auth\AuthController@postLogin');
 Route::get('/', 'Auth\AuthController@getLogin');
 Route::get('login', 'Auth\AuthController@getLogin');
 Route::post('login', 'Auth\AuthController@postLogin');
 Route::get('register', 'MainController@registerview');
 Route::post('register', 'MainController@register');
 Route::get('home', 'MainController@home');
 Route::get('notifications', 'MainController@notifications');
 Route::get('load', 'MainController@load');
 Route::get('transactions', 'MainController@transactions');
 Route::get('bus', 'MainController@bus');
 Route::get('sales', 'MainController@sales');
 Route::get('addaccount', 'MainController@addaccount');
 Route::post('addaccount', 'MainController@addaccounts');
 Route::get('deactivatecard', 'MainController@deactivatecard');
 Route::get('users', 'MainController@users');
 Route::post('gettransactions', 'MainController@gettransactions');
 Route::get('/logout', 'Auth\AuthController@getLogout');
 ?>
 