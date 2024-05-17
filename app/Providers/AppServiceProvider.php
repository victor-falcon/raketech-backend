<?php

namespace App\Providers;

use App\Services\Countries\CountriesDataSyncProvider;
use App\Services\Countries\RestCountries\RestCountriesDataSyncProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CountriesDataSyncProvider::class,
            RestCountriesDataSyncProvider::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
