<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\UserSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class UserSystemServiceProvider extends LaravelServiceProvider
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
        $this->app->bind('UserSystem', function ($app) {
            return new UserSystem;
        });
    }
}
