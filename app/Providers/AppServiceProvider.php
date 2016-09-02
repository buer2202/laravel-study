<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\User::updating(function ($user) {
            dump('监听器');
            dump($user);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('App\Libraries\manInterface', 'App\Libraries\Man');

        // $this->app->when('App\Http\Controllers\TestController')
        //     ->needs('App\Libraries\manInterface')
        //     ->give(function () {
        //         return new \App\Libraries\Buer;
        //     });

        // $this->app->singleton('App\Libraries\Buer', function () {
        //     return new \App\Libraries\Man();
        // });

        // $this->app->when('App\Http\Controllers\TestController')
        //     ->needs('$a')
        //     ->give(10);

        // $this->app->when('App\Http\Controllers\TestController')
        //     ->needs('$b')
        //     ->give(20);

        // $this->app->bind('man', function () {
        //     return new \App\Libraries\Buer;
        // });

        $this->app->bind('buer', function () {
            return new \App\Libraries\Buer;
        });

        // $this->app->tag(['man', 'buer'], 'reports');
    }
}
