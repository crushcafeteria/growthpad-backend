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
    Route::get('dashboard', 'DashboardController')->middleware('admin');
    Route::get('ads/{id}/delete', 'AdsController@destroy')->middleware('admin');
    Route::resource('ads', 'AdsController')->middleware('admin');

    Route::get('orders/{orderID}/delete', 'OrdersController@destroy')->middleware('admin');
    Route::post('orders/{orderID}/note', 'OrdersController@saveNote')->middleware('admin');
    Route::get('orders/{orderID}/pdf', 'OrdersController@makePDF')->middleware('admin');
    Route::post('orders/search', 'OrdersController@search')->name('orders.search')->middleware('admin');
    Route::resource('orders', 'OrdersController')->middleware('admin');

    Route::get('users/{id}/delete', 'UsersController@destroy')->middleware('admin');
    Route::resource('users', 'UsersController')->middleware('admin');
    Route::get('service-providers', 'UsersController@listSPs')->middleware('admin');

    Route::get('logout', function () {
        auth()->logout();
        return redirect('login');
    });

    Route::get('payments', 'PaymentController@list')->middleware('admin');

    # Bulk SMS
    Route::get('sms', 'BulkSMSController@index')->middleware('admin');
    Route::post('sms', 'BulkSMSController@sendMessages')->middleware('admin');
});

Route::get('onboard', 'ServiceController@showSpOnboardingPage');
Route::post('onboard', 'ServiceController@startOnboard');

Route::get('stkpush', 'STKPush@test');

Route::get('you-can-now-login', function () {
    return response()->json([
        'status'  => 'SUCCESS!',
        'message' => 'You have successfully changed your password. Please close this window and try logging in with your new password'
    ]);
});

# Cookbook
Route::get('locale/{locale}', 'CookbookController@switchLocale');
Route::get('cookbook', 'CookbookController@index');
Route::get('cookbook/my-purchases', 'CookbookController@myPurchases')->middleware('auth');
Route::get('cookbook/{locale}', 'CookbookController@index');
Route::get('cookbook/display/{id}', 'CookbookController@display'); #->middleware('auth');
Route::get('cookbook/purchase/{id}', 'CookbookController@purchase')->middleware('auth');
Route::get('cookbook/dl/{productKey}/{purchaseToken}', 'CookbookController@activatePurchase')->middleware('auth');
Route::get('cookbook/download/{purchaseID}', 'CookbookController@download')->middleware('auth');
Route::get('cookbook/cart/add/{id}', 'CookbookController@addToCart')->middleware('auth');
Route::get('cookbook/cart/display', 'CookbookController@displayCart')->middleware('auth');
Route::get('cookbook/cart/remove/{raw}', 'CookbookController@removeFromCart')->middleware('auth');
Route::get('cookbook/cart/mpesa/finish/{purchaseToken}', 'CookbookController@mpesaSuccess')->middleware('auth');

# Pesapal 
Route::get('payment/received', ['as' => 'pesapalSuccess', 'uses' => 'PaymentController@pesapalReceived']);
Route::get('webhooks/pesapal/confirmation', ['as' => 'pesapalConfirmation', 'uses' => 'PaymentController@pesapalConfirmation']);

# Paypal
Route::get('cookbook/paypal/success', 'CookbookController@paypalSuccess');


# Admin panel
Route::get('admin/cookbook/sales', 'CookbookController@showSales')->middleware(['auth', 'admin']);

# Submit recipe
Route::get('submit/recipe', 'CookbookController@showRecipeSubmitForm');
Route::post('submit/recipe', 'CookbookController@submitRecipe');


Route::get('preview/cookbook', function () {

    $AUTH_USER = 'iren';
    $AUTH_PASS = 'DYU5c7ak#vQc8c72kF&^lr5*Y3te7D';

    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    $is_not_authenticated = (
        !$has_supplied_credentials ||
        $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
        $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
    );
    if ($is_not_authenticated) {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        echo '<h1>Access denied!</h1>';
        exit;
    }

    $product = config('cookbook.products')[0];
    $file = storage_path() . '/app/' . $product['file'];

    return response()->file($file);
});
