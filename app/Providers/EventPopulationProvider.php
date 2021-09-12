<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\RecurringPattern;
use App\Observers\EventObserver;
use App\Observers\RecurringPatternObserver;
use Illuminate\Support\ServiceProvider;

class EventPopulationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(EventObserver::class);
        RecurringPattern::observe(RecurringPatternObserver::class);
    }
}
