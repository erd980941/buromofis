<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $settings=Setting::first();
        // config(['global_settings'=>$settings]);
        View::composer('*', function ($view) {
            $settings = Setting::first();
            $view->with('global_settings', $settings);
        });
    }
}
