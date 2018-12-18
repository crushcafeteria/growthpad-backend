<?php

Route::group(['middleware' => 'cors'], function (){
    Route::post('enquiry/save', 'ServiceController@saveEnquiry');
    Route::get('marketplace', 'MarketController@apiListContacts');
    Route::get('marketplace/search/{q?}', 'MarketController@apiSearchContact');

    Route::post('user/register', 'Auth\RegisterController@apiRegisterUser');
    Route::post('user/login', 'Auth\LoginController@apiLogin');

## NEW API SPEC STARTS HERE
    Route::post('login', 'API\AccountController@login');
    Route::post('signup', 'API\AccountController@signup');
    Route::get('me', 'API\AccountController@me')->middleware('jwt.auth');
    Route::post('location/update', 'API\AccountController@updateLocation')->middleware('jwt.auth');
    Route::post('picture/upload', 'API\AccountController@uploadPicture')->middleware(['jwt.auth', 'cors']);
    Route::post('profile/update', 'API\AccountController@updateProfile')->middleware('jwt.auth');

    # Ads
    Route::resource('ads', 'API\AdsController');
    Route::post('ads/nearby', 'API\AdsController@nearBy')->middleware(['jwt.auth', 'cors']);
    Route::post('ads/search', 'API\AdsController@search')->middleware(['jwt.auth', 'cors']);


    Route::get('ping', function (){
        return response()->json('ALIVE');
    });

    Route::prefix('support')->group(function (){
        Route::get('countyData', 'API\SupportController@countyData');
        Route::get('location/suggest', 'API\SupportController@suggestLocation');
    });

    Route::resource('orders', 'API\OrderController');
    Route::post('order/update', 'API\OrderController@update');
    Route::get('order/find', 'API\OrderController@show');
    Route::post('order/cancel', 'API\OrderController@cancelOrder');

    Route::get('sp/fetch', 'API\AccountController@getSPs')->middleware('jwt.auth');
    Route::get('sp/ads', 'API\AdsController@getSPAds')->middleware('jwt.auth');
    Route::get('sp/orders', 'API\OrderController@getSPOrders')->middleware('jwt.auth');
});

Route::post('feedback', 'API\AccountController@sendFeedback');
