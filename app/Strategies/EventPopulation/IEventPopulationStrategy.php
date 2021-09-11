<?php

namespace App\Strategies\EventPopulation;

use App\Models\Event;

interface IEventPopulationStrategy
{
    public function createEventOccurrances(Event $event);

    public function updateEventOccurrances(Event $event);

    public function deleteEventOccurrances(Event $event);
}