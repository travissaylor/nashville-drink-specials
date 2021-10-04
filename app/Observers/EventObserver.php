<?php

namespace App\Observers;

use App\Factories\EventPopulation\EventPopulationFactory;
use App\Jobs\GenerateEventCreationOccurrences;
use App\Jobs\GenerateEventUpdateOccurrences;
use App\Jobs\RemoveEventDeletionOccurrences;
use App\Models\Event;
use App\Strategies\EventPopulation\SingleEventPopulationStrategy;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        GenerateEventCreationOccurrences::dispatch($event);
    }

    /**
     * Handle the Event "updated" event.
     * @todo Figure out solution where this fires even if event specific data hasn't changed
     * For now, we need to call it in the livewire component directly
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        // GenerateEventUpdateOccurrences::dispatch($event);
    }

    /**
     * Handle the Event "deleted" event.
     * @todo handle deletion with this instead of doing it sync
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        // RemoveEventDeletionOccurrences::dispatch($event);
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
