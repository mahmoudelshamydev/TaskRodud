<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('reports/sales_requests', '\App\Admin\Controllers\Reports\SalesRequesteController@index')->name('reports.sales_requests');

    $router->get('reports/requests_reports', '\App\Admin\Controllers\Reports\RequestsController@index')->name('reports.requests_report');

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('areas', AreaController::class);
    $router->resource('car-makes', CarMakeController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('banners', BannerController::class);
    $router->resource('faqs', FaqController::class);
    $router->resource('pages', PageController::class);
    $router->resource('settings', SettingController::class);
    $router->resource('users', UserController::class);
    $router->resource('services', ServiceController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('payments', PaymentController::class);
    $router->resource('requests', RequestController::class);
    $router->resource('days', DaysController::class);
    $router->resource('admin_notifications', AdminNotificationController::class);

    // $router->resource('invoices', InvoiceController::class);
    $router->get('invoices', '\App\Admin\Controllers\InvoiceController@index')->name('invoice.index');
    $router->get('invoices/create', '\App\Admin\Controllers\InvoiceController@create');
    $router->POST('invoices', '\App\Admin\Controllers\InvoiceController@store');
    $router->get('invoices/{id}/edit', '\App\Admin\Controllers\InvoiceController@edit');
    $router->get('invoices/{id}/print', '\App\Admin\Controllers\InvoiceController@printInvoice');
    $router->PUT('invoices/{id}', '\App\Admin\Controllers\InvoiceController@update');
    $router->DELETE('invoices/{id}', '\App\Admin\Controllers\InvoiceController@destroy');
    $router->get('requestinputs', '\App\Admin\Controllers\RequestController@requestinputs');
    $router->get('requestaddress', '\App\Admin\Controllers\RequestController@requestaddress');
    $router->get('car_model', '\App\Admin\Controllers\RequestController@car_model');
    $router->get('addresse_details/{id}', '\App\Admin\Controllers\RequestController@addressDetails');
    $router->get('/ajax/notifications', '\App\Admin\Controllers\HomeController@notifiyOrder')->name('ajax.notifiyOrder');
    $router->resource('social-media', SocialMediaController::class);
    $router->resource('specialties', SpecialtyController::class);
    $router->resource('lawyers', LawyerController::class);
    $router->resource('messages', MessageController::class);
});
