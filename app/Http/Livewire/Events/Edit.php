<?php

namespace App\Http\Livewire\Events;

use App\Jobs\GenerateEventUpdateOccurrences;
use App\Models\Event;
use App\Models\RecurringPattern;
use App\Models\Venue;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $description;

    public $startDate;
    public $endDate;
    public $startTime;
    public $endTime;

    public $isRecurring = false;
    public $isFullDay = false;

    public $venues;
    public $selectedVenueId;

    public $recurringTypes = [];
    public $selectedRecurringType;

    public $repeatInterval = 1;
    public $maxOccurances;

    public Event $event;

    protected $rules = [
        'name' => 'required|string',
        'startDate' => 'required|date',
        'repeatInterval' => 'numeric|nullable',
        'maxOccurances' => 'numeric|nullable',
    ];

    public function mount($id)
    {
        $this->event = Event::with(['recurringPattern', 'venue'])->find($id);
        $this->name = $this->event->name;
        $this->description = $this->event->description;

        $this->startDate = $this->event->start_date;
        $this->endDate = $this->event->end_date;
        $this->startTime = $this->event->start_time;
        $this->endTime = $this->event->end_time;

        $this->isRecurring = $this->event->is_recurring;
        $this->isFullDay = $this->event->is_full_day;

        $this->venues = Venue::all();
        $this->selectedVenueId = $this->event->venue_id;

        $this->recurringTypes = RecurringPattern::$recurringTypes;
        $this->selectedRecurringType = $this->event->recurringPattern->recurring_type ?? null;
        $this->repeatInterval = $this->event->recurringPattern->repeat_interval ?? null;
        $this->maxOccurances = $this->event->recurringPattern->max_occurrences ?? null;
    }

    public function save()
    {
        $this->validate();

        $this->event->name = $this->name;
        $this->event->description = $this->description;
        $this->event->start_date = $this->startDate;
        $this->event->end_date  = $this->endDate;
        $this->event->start_time = $this->startTime;
        $this->event->end_time = $this->endTime;
        $this->event->is_recurring  = $this->isRecurring;
        $this->event->is_full_day  = $this->isFullDay;
        $this->event->venue_id  = $this->selectedVenueId;

        if ($this->isRecurring) {
            $this->updateRecurringPattern();
        }

        $this->event->push();

        GenerateEventUpdateOccurrences::dispatch($this->event);

        return redirect()->route('admin.events.index');
    }

    public function delete()
    {
        if ($this->isRecurring && $this->event->recurringPattern) {
            $this->event->recurringPattern->delete();
        }

        // @todo do this in queue
        $this->event->occurrences()->delete();
        $this->event->delete();

        return redirect()->route('admin.events.index');

    }

    public function render()
    {
        return view('livewire.events.edit');
    }

    protected function updateRecurringPattern()
    {
        if (empty($this->event->recurringPattern)) {
            $this->event->recurringPattern()->create([
                'recurring_type' => $this->selectedRecurringType,
                'repeat_interval' => $this->repeatInterval,
                'max_occurrences' => $this->maxOccurances,
            ]);
            
            return;
        } 

        $this->event->recurringPattern->recurring_type = $this->selectedRecurringType;
        $this->event->recurringPattern->repeat_interval = $this->repeatInterval ?: null;
        $this->event->recurringPattern->max_occurrences = $this->maxOccurances ?: null;
    }
}
