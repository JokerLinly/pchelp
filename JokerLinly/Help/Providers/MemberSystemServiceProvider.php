<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\MemberSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class MemberSystemServiceProvider extends LaravelServiceProvider
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
        $this->app->bind('MemberSystem', function ($app) {
            return new MemberSystem;
        });
    }
}
