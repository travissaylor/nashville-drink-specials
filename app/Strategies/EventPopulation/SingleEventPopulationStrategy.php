<?php

namespace App\Strategies\EventPopulation;

use App\Models\Event;
use App\Models\Occurrence;

class SingleEventPopulationStrategy
{
    public function createEventOccurrances(Event $event)
    {
        Occurrence::create([
            'event_id' => $event->id,
            'start_date' => $event->start_date, 
            'end_date' => $event->end_date, 
            'start_time' => $event->start_time, 
            'end_time' => $event->end_time,
        ]);
    }

    public function updateEventOccurrances(Event $event)
    {
        $occurrences = Occurrence::where(['event_id' => $event->id]);
        $occurrences->delete();

        Occurrence::create([
            'event_id' => $event->id,
            'start_date' => $event->start_date, 
            'end_date' => $event->end_date, 
            'start_time' => $event->start_time, 
            'end_time' => $event->end_time,
        ]);
    }

    public function deleteEventOccurrances(Event $event)
    {
        $occurrences = Occurrence::where(['event_id' => $event->id]);
        $occurrences->delete();
    }
}
