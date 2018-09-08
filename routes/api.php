<?php

Route::post('enquiry/save', 'ServiceController@saveEnquiry');
Route::get('marketplace', 'MarketController@apiListContacts');
Route::get('marketplace/search/{q?}', 'MarketController@apiSearchContact');

Route::post('user/register', 'Auth\RegisterController@apiRegisterUser');
Route::post('user/login', 'Auth\LoginController@apiLogin');

## NEW API SPEC STARTS HERE
Route::post('login', 'API\AccountController@login');
Route::get('me', 'API\AccountController@me')->middleware('jwt.auth');

Route::resource('ads', 'API\AdsController');