<?php

namespace App\Console\Commands;

use App\Factories\EventPopulation\EventPopulationFactory;
use App\Models\Event;
use App\Models\Occurrence;
use Illuminate\Console\Command;

class GenerateOccurrences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'occurrences:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate/Re-generate occurrences for all events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Occurrence::truncate();
        $this->info("Deleted all Occurrences");

        $events = Event::with(['recurringPattern'])->get();

        foreach($events as $event) {
            $eventPopulationStrategy = (new EventPopulationFactory())->getEventPopulationStrategy($event);
            $eventPopulationStrategy->createEventOccurrances($event);
            $this->info("Created occurances for event id: {$event->id}");
        }
    }
}
