<?php

use Illuminate\Http\Request;

Route::post('enquiry/save', 'ServiceController@saveEnquiry');
Route::get('marketplace', 'MarketController@apiListContacts');
Route::get('marketplace/search/{q?}', 'MarketController@apiSearchContact');

Route::post('user/register', 'Auth\RegisterController@apiRegisterUser');
Route::post('user/login', 'Auth\LoginController@apiLogin');