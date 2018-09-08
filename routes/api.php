<?php

Route::post('enquiry/save', 'ServiceController@saveEnquiry');
Route::get('marketplace', 'MarketController@apiListContacts');
Route::get('marketplace/search/{q?}', 'MarketController@apiSearchContact');

Route::post('user/register', 'Auth\RegisterController@apiRegisterUser');
Route::post('user/login', 'Auth\LoginController@apiLogin');

## NEW API SPEC STARTS HERE
Route::post('login', 'API\AccountController@login');
Route::post('signup', 'API\AccountController@signup');
Route::get('me', 'API\AccountController@me')->middleware('jwt.auth');

Route::resource('ads', 'API\AdsController');

Route::get('ping', function (){
    return response()->json('ALIVE');
});

Route::prefix('support')->group(function (){
    Route::get('countyData', 'API\SupportController@countyData');
    Route::get('location/suggest', 'API\SupportController@suggestLocation');
});