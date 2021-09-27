<?php

namespace App\Jobs;

use App\Factories\EventPopulation\EventPopulationFactory;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GenerateEventUpdateOccurrences implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Event $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EventPopulationFactory $eventPopulationFactory)
    {
        $this->event->refresh();
        $eventPopulationStrategy = $eventPopulationFactory->getEventPopulationStrategy($this->event);
        $eventPopulationStrategy->updateEventOccurrances($this->event);
    }
}
