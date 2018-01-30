<?php

use Illuminate\Http\Request;

Route::post('enquiry/save', 'ServiceController@saveEnquiry');
Route::get('marketplace', 'MarketController@apiListContacts');