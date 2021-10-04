<?php

namespace App\Factories\EventPopulation;

use App\Models\Event;
use App\Models\RecurringPattern;
use App\Strategies\EventPopulation\SingleEventPopulationStrategy;
use Illuminate\Support\Facades\App;

class EventPopulationFactory
{
    public function getEventPopulationStrategy(Event $event)
    {
        // @todo Make yearly recurring strategy
        if (!$event->is_recurring || $event->recurringPattern->recurring_type === RecurringPattern::RECURRING_TYPE_YEARLY) {
            return new SingleEventPopulationStrategy();
        }

        $eventType = ucwords(strtolower($event->recurringPattern->recurring_type));

        return App::make('App\Strategies\EventPopulation\\' . $eventType . 'EventPopulationStrategy');
    }
}
