<?php

namespace App\Providers;

use App\Models\SiteInfo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Begin: Configuration
        $appConfiguration = SiteInfo::latest()->first();
        View::share('appConfiguration', $appConfiguration);
        // End: Configuration
    }
}
