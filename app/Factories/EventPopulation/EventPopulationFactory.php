<?php

namespace App\Factories\EventPopulation;

use App\Models\Event;
use Illuminate\Support\Facades\App;

class EventPopulationFactory
{
    public function getEventPopulationStrategy(Event $event)
    {
        $eventType = ucwords(strtolower($event->recurringPattern->recurring_type));

        return App::make('App\Strategies\EventPopulation\\' . $eventType . 'EventPopulationStrategy');
    }
}
