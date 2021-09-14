<?php

namespace App\Observers;

use App\Factories\EventPopulation\EventPopulationFactory;
use App\Models\RecurringPattern;

class RecurringPatternObserver
{
    public $afterCommit = true;
    
    protected EventPopulationFactory $eventPopulationFactory;

    public function __construct(EventPopulationFactory $eventPopulationFactory)
    {
        $this->eventPopulationFactory = $eventPopulationFactory;
    }
    /**
     * Handle the RecurringPattern "created" event.
     *
     * @param  \App\Models\RecurringPattern  $recurringPattern
     * @return void
     */
    public function created(RecurringPattern $recurringPattern)
    {
        $event = $recurringPattern->event;
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->createEventOccurrances($event);
    }

    /**
     * Handle the RecurringPattern "updated" event.
     *
     * @param  \App\Models\RecurringPattern  $recurringPattern
     * @return void
     */
    public function updated(RecurringPattern $recurringPattern)
    {
        $event = $recurringPattern->event;
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->updateEventOccurrances($event);
    }

    /**
     * Handle the RecurringPattern "deleted" event.
     *
     * @param  \App\Models\RecurringPattern  $recurringPattern
     * @return void
     */
    public function deleted(RecurringPattern $recurringPattern)
    {
        $event = $recurringPattern->event;
        $eventPopulationStrategy = $this->eventPopulationFactory->getEventPopulationStrategy($event);
        $eventPopulationStrategy->deleteEventOccurrances($event);
    }

    /**
     * Handle the RecurringPattern "restored" event.
     *
     * @param  \App\Models\RecurringPattern  $recurringPattern
     * @return void
     */
    public function restored(RecurringPattern $recurringPattern)
    {
        //
    }

    /**
     * Handle the RecurringPattern "force deleted" event.
     *
     * @param  \App\Models\RecurringPattern  $recurringPattern
     * @return void
     */
    public function forceDeleted(RecurringPattern $recurringPattern)
    {
        //
    }
}
