<?php
namespace JokerLinly\Help\Providers;

use JokerLinly\Help\TicketSystem;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class TicketSystemServiceProvider extends LaravelServiceProvider
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
        $this->app->bind('TicketSystem', function ($app) {
            return new TicketSystem;
        });
    }
}
