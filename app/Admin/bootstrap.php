<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
use Encore\Admin\Facades\Admin;
use App\Models\Notification;

//Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
//    $notifs = Notification::where('admin_read',0)->get();
//    $navbar->right(view('notifications', compact('notifs')));
//});

Admin::js('/vendor/chartjs/dist/Chart.min.js');
Encore\Admin\Form::forget(['map', 'editor']);
app('view')->prependNamespace('admin', resource_path('views/admin'));
