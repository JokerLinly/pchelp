<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\WeChatSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class WeChatSystemServiceProvider extends LaravelServiceProvider
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
        $this->app->bind('WeChatSystem', function ($app) {
            return new WeChatSystem;
        });
    }
}
