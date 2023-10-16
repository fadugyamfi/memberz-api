<?php

namespace App\Providers;

use App\Services\Sms\LocalSmsService;
use App\Services\Sms\SmsOnlineGhService;
use App\Services\Sms\SmsServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        if( $this->app->environment(['local']) ) {
            $this->app->bind(SmsServiceProvider::class, LocalSmsService::class);
        } else {
            $this->app->bind(SmsServiceProvider::class, SmsOnlineGhService::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
