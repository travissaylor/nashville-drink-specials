<?php

namespace App\Observers;

use App\Factories\eventPopulationFactory;
use App\Models\Event;

class EventObserver
{
    protected eventPopulationFactory $eventPopulationFactory;

    public function __construct(eventPopulationFactory $eventPopulationFactory)
    {
        $this->eventPopulationFactory = $eventPopulationFactory;
    }
    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->createEventOccurrances($event);
    }

    /**
     * Handle the Event "updated" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->updateEventOccurrances($event);
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->deleteEventOccurrances($event);
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
