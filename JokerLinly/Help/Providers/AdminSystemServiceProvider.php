<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\AdminSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class AdminSystemServiceProvider extends LaravelServiceProvider
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
        $this->app->bind('AdminSystem', function ($app) {
            return new AdminSystem;
        });
    }
}
