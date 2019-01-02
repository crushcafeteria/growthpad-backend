<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Marketplace
Route::get('market', 'MarketController@listContacts');
// Route::get('market/contact/add', 'MarketController@showAddContactForm');
// Route::post('market/contact/add', 'MarketController@saveContact');
Route::get('contact/view/{contactID}', 'MarketController@viewContact');
Route::get('contacts/search', 'MarketController@searchContact');

# Services
Route::get('/', 'ServiceController@showServices');
Route::get('services', 'ServiceController@showServices');
Route::get('enquiry/{type}', 'ServiceController@loadEnquiry');
Route::post('enquiry/save', 'ServiceController@saveEnquiry');

Route::get('disclaimer', 'ServiceController@showDisclaimer');

# Basket
Route::get('basket', 'ServiceController@basket');
Route::get('remove/from/cart/{productID}', 'ServiceController@removeFromCart');

Route::post('request/connect', 'MarketController@connect');

# Admin panel
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('home', 'Admin\HomeController@index');

    Route::get('contacts', 'Admin\ContactController@listContacts');
    Route::get('contact/edit/{contactID}', 'Admin\ContactController@editContact');
    Route::post('contact/save', 'Admin\ContactController@updateContact');
    Route::get('contact/view/{contactID}', 'Admin\ContactController@viewContact');
    Route::get('contacts/map', 'Admin\ContactController@renderMap');

    Route::get('contact/add', 'Admin\ContactController@showAddContactForm');
    Route::post('contact/add', 'Admin\ContactController@saveContact');

    Route::get('contact/requests', 'Admin\ContactController@showRequests');

    Route::get('contact/search', 'Admin\ContactController@searchContacts');

    # Service enquiries dashboard
    Route::get('enquiries', 'Admin\EnquiryController@listEnquiries');
    Route::get('enquiry/view/{enquiryID}', 'Admin\EnquiryController@viewEnquiry');
    Route::get('enquiries/export/excel', 'Admin\EnquiryController@exportExcel');

    # User management
    Route::get('users', 'Admin\UserManager@listUsers');


    Route::get('logout', function () {
        Auth::logout();

        return redirect('/');
    });
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

# Utility routes
Route::get('/import', 'ImportController');


#### NEW SYSTEM ###
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController');
    Route::resource('ads', 'AdsController');
    Route::resource('orders', 'OrdersController');
    Route::post('orders/{orderID}/note', 'OrdersController@saveNote');
    Route::get('orders/{orderID}/pdf', 'OrdersController@makePDF');
    Route::post('orders/search', 'OrdersController@search')->name('orders.search');

    Route::resource('users', 'UsersController');

    Route::get('logout', function () {
        auth()->logout();
        return redirect('login');
    });
});

Route::get('you-can-now-login', function () {
    return response()->json([
        'status' => 'SUCCESS!',
        'message' => 'You have successfully changed your password. Please close this window and try logging in with your new password'
    ]);
});
