<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\SuperSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class SuperSystemServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SuperSystem', function ($app) {
            return new SuperSystem;
        });
    }
}
