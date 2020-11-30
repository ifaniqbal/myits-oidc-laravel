<?php
namespace Ifaniqbal\MyitsOidc;

use Illuminate\Support\ServiceProvider;

class MyitsOidcServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/myits-oidc.php' => config_path('myits-oidc.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/myits-oidc.php',
            'myits-oidc'
        );

        $this->app->bind('myits-oidc', function () {
            return new MyitsOidc();
        });
    }
}
