<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\UrlGenerator;

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
    public function boot(UrlGenerator $url)
    {
        Paginator::defaultView('vendor.pagination.custom');
        Paginator::defaultSimpleView('vendor.pagination.custom');

        if(env('REDIRECT_HTTPS'))
        {
            $url->forceScheme('https');
        }
    }
}
