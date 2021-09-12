<?php

namespace App\Observers;

use App\Factories\EventPopulation\EventPopulationFactory;
use App\Models\Event;
use App\Strategies\EventPopulation\SingleEventPopulationStrategy;

class EventObserver
{
    protected SingleEventPopulationStrategy $SingleEventPopulationStrategy;

    public function __construct(SingleEventPopulationStrategy $SingleEventPopulationStrategy)
    {
        $this->SingleEventPopulationStrategy = $SingleEventPopulationStrategy;
    }
    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $this->SingleEventPopulationStrategy->createEventOccurrances($event);
    }

    /**
     * Handle the Event "updated" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        $this->SingleEventPopulationStrategy->updateEventOccurrances($event);
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        $this->SingleEventPopulationStrategy->deleteEventOccurrances($event);
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
