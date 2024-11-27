<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }


/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
    Passport::loadKeysFrom(storage_path('oauth-private.key'));
    Passport::routes();
}
}