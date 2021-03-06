<?php

namespace App\Strategies\EventPopulation;

use App\Models\Event;
use App\Models\Occurrence;
use Carbon\Carbon;

class WeeklyEventPopulationStrategy
{
    protected int $futureOccurrancePopulationMax = 52; // Populate 1 year
    protected int $repeatInterval = 1;

    public function createEventOccurrances(Event $event)
    {
        if ($event->recurringPattern->max_occurrences) {
            $this->futureOccurrancePopulationMax = $event->recurringPattern->max_occurrences;
        }

        if ($event->recurringPattern->repeat_interval) {
            $this->repeatInterval = $event->recurringPattern->repeat_interval;
        }

        $eventDate = Carbon::parse($event->start_date)->addWeeks($this->repeatInterval); // Date to keep track of event
        $endDate = Carbon::parse($event->end_date); // Overall Event end date

        for ($i = 0; $i < $this->futureOccurrancePopulationMax - 1; $i++) {
            if ($eventDate->greaterThan($endDate)) {
                return;
            }

            Occurrence::create([
                'event_id' => $event->id,
                'start_date' => $eventDate,
                'end_date' => $eventDate,
                'start_time' => $event->start_time,
                'end_time' => $event->end_time,
            ]);

            $eventDate->addWeeks($this->repeatInterval);
        }
    }

    public function updateEventOccurrances(Event $event)
    {
        $occurrences = Occurrence::where(['event_id' => $event->id]);
        $occurrences->delete();

        if ($event->recurringPattern->max_occurrences) {
            $this->futureOccurrancePopulationMax = $event->recurringPattern->max_occurrences;
        }

        if ($event->recurringPattern->repeat_interval) {
            $this->repeatInterval = $event->recurringPattern->repeat_interval;
        }

        $eventDate = Carbon::parse($event->start_date); // Create all since we are purging all records first
        $endDate = Carbon::parse($event->end_date); // Overall Event end date

        for ($i = 0; $i < $this->futureOccurrancePopulationMax; $i++) {
            if ($eventDate->greaterThan($endDate)) {
                return;
            }

            Occurrence::create([
                'event_id' => $event->id,
                'start_date' => $eventDate,
                'end_date' => $eventDate,
                'start_time' => $event->start_time,
                'end_time' => $event->end_time,
            ]);

            $eventDate->addWeeks($this->repeatInterval);
        }
    }

    public function deleteEventOccurrances(Event $event)
    {
        $occurrences = Occurrence::where(['event_id' => $event->id]);
        $occurrences->delete();
    }
}
