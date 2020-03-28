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
    Route::post('ad/delete', 'API\AdsController@destroy')->middleware(['jwt.auth', 'cors']);


    Route::get('ping/{userID}', 'API\AccountController@ping');

    Route::prefix('support')->group(function (){
        Route::get('countyData', 'API\SupportController@countyData');
        Route::get('location/suggest', 'API\SupportController@suggestLocation');
    });

    Route::resource('orders', 'API\OrderController');
    Route::post('order/update', 'API\OrderController@update');
    Route::get('order/find', 'API\OrderController@show');
    Route::post('order/cancel', 'API\OrderController@cancelOrder');
    Route::post('order/accept', 'API\OrderController@acceptOrder');
    Route::post('order/complete', 'API\OrderController@completeOrder');

    Route::get('sp/county', 'API\AccountController@getSPByCounty')->middleware('jwt.auth');
    Route::get('sp/ads', 'API\AdsController@getSPAds')->middleware('jwt.auth');
    Route::get('sp/orders', 'API\OrderController@getSPOrders')->middleware('jwt.auth');

    Route::post('sp/suggest', 'API\SupportController@suggestSP')->middleware('jwt.auth');    # SP suggestions


    # Forums
    Route::post('forum/topic/add', 'API\Forum\TopicController@store')->middleware('jwt.auth');
    Route::get('forum/topic/list', 'API\Forum\TopicController@index')->middleware('jwt.auth');
    Route::get('forum/topic/{topicID}', 'API\Forum\TopicController@show')->middleware('jwt.auth');

    Route::get('forum/topic/{topicID}/threads', 'API\Forum\ThreadController@index')->middleware('jwt.auth');
    Route::post('forum/topic/{topicID}/thread/add', 'API\Forum\ThreadController@store')->middleware('jwt.auth');

    Route::get('forum/topic/{topicID}/thread/{threadID}/like', 'API\Forum\ThreadController@like')->middleware('jwt.auth');
});

Route::post('feedback', 'API\AccountController@sendFeedback');

# MPESA Integration
Route::post('ipn/{password}', 'PaymentController@ipn');
Route::get('payment/detect/{code?}', 'PaymentController@detectPayment')->middleware('jwt.auth');
Route::post('payment/apply/{id}', 'PaymentController@applyPayment')->middleware('jwt.auth');

Route::get('mpesa/redeem/{code}', 'API\MpesaController@redeemPayment');

# Testing SMS
//Route::get('test/sms', 'API\SupportController@testSMS');

