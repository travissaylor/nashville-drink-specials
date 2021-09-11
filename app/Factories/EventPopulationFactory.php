<?php

namespace App\Factories;

use App\Models\Event;
use App\Strategies\EventPopulation\SingleEventPopulationStrategy;
use Illuminate\Support\Facades\App;

class EventPopulationFactory
{
    public function getEventPopulationStrategy(Event $event)
    {
        if (!$event->is_recurring) {
            return new SingleEventPopulationStrategy();
        }
        
        $eventType = ucwords(strtolower($event->recurringPattern->recurring_type));
        return App::make("\App\Strategies\EventPopulation\{$eventType}EventPopulationStrategy");
    }
}