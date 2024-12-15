<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([ 'prefix' => 'auth'], function (){
    Route::get('service/{id}','API\ServiceController@getServiceDetails');
    Route::group(['middleware' => ['api','localization']], function () {
        Route::post('store_guest_device', 'API\AuthController@storeGuestDevice');
        Route::post('register', 'API\UsersController@signup')->name('api.register');
        Route::post('login', 'API\AuthController@login')->name('api.login');

        Route::post('password/send_otp', 'API\PasswordController@sendPasswordResetCode');
        Route::post('password/verify_password_otp', 'API\PasswordController@verifyPasswordCode');

        Route::get('settings','API\HomeController@settings');
        Route::post('contactus','API\HomeController@storeContactUs');
        Route::get('faqs','API\HomeController@faqs');
        Route::get('page/{slug}','API\HomeController@getPage');
        Route::get('banners','API\HomeController@getBanners');
        Route::get('areas', 'API\HomeController@getAreas');

        Route::get('car_makes', 'API\CarsController@getCarMakes');
        Route::post('car_models', 'API\CarsController@getCarModels');

        Route::get('services', 'API\ServiceController@getServices');

        Route::post('track_request', 'API\RequestController@getTrackRequest');


        Route::post('availabel_times', 'API\ServiceController@getAvailabelTimes');
        
        Route::post('resend_code', 'API\AuthController@resendCode')->name('api.resendCode');
    });
        Route::group(['middleware' => 'auth:api'], function() {

            Route::post('place_request', 'API\RequestController@placeRequest');
            Route::post('logout', 'API\AuthController@logout')->name('api.logout');


        Route::post('activate_account', 'API\AuthController@activateAccount')->name('api.activResendCode');

        Route::post('password/changepassword', 'API\PasswordController@changePassword');

        Route::get('profile', 'API\UsersController@getProfil');
        Route::put('update_profile', 'API\UsersController@update');

        Route::get('notifications', 'API\UsersController@notifications');
        Route::get('read_notification/{id}', 'API\UsersController@readNotification');
        Route::get('notification_setting', 'API\UsersController@notificationSettings');
        Route::post('updatenotification_setting', 'API\UsersController@updateNotificationSettings');

        Route::get('cars', 'API\UsersController@getCars');
        Route::get('car_details/{id}', 'API\UsersController@carDetails');
        Route::post('save_car', 'API\UsersController@saveCar');
        Route::post('delete_car/{id}', 'API\UsersController@deleteCar');

        Route::get('addresse', 'API\UsersController@getAddresses');
        Route::get('addresse_details/{id}', 'API\UsersController@addressDetails');
        Route::post('save_addresse', 'API\UsersController@saveAddress');
        Route::post('delete_addresse/{id}', 'API\UsersController@deleteAddress');

        Route::get('request/{id}','API\RequestController@getRequestDetails');
        Route::get('requests/{type}','API\RequestController@getRequestsType');
        Route::post('re_shedule_request/{id}','API\RequestController@reSheduleRequest');
        Route::post('cancel_request/{id}','API\RequestController@cancelRequest');
        Route::get('drop_request/{id}','API\RequestController@dropRequest');

    });
});