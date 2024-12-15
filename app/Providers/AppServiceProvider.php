<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->sharedViews();
        Schema::defaultStringLength (191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('setting', function () {
           return Setting::first();
        });
    }

    public function sharedViews()
    {
        View::share([
             'setting' => app('setting'),
        ]);
    }
}
