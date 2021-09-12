<?php

namespace App\Factories\EventPopulation;

use App\Models\Event;
use App\Strategies\EventPopulation\IEventPopulationStrategy;
use App\Strategies\EventPopulation\SingleEventPopulationStrategy;
use Illuminate\Support\Facades\App;

class EventPopulationFactory
{
    public function getEventPopulationStrategy(Event $event): IEventPopulationStrategy
    {
        $eventType = ucwords(strtolower($event->recurringPattern->recurring_type));

        if (!$event->is_recurring || !class_exists($eventType)) {
            return new SingleEventPopulationStrategy();
        }

        return App::make("\App\Strategies\EventPopulation\{$eventType}EventPopulationStrategy");
    }
}
