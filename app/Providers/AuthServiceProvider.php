<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

     protected $policies = [
        // Add your policies here
    ];
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
    $this->registerPolicies();

        // تسجيل الراوتس يدويًا
        Passport::ignoreRoutes();

        // إعداد مدة صلاحية التوكنات إذا أردت
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));


}

/*public function boot()
{
    $this->registerPolicies();

    Passport::routes();
}*/

}
