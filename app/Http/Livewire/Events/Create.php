<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Models\RecurringPattern;
use App\Models\Venu;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;

    public $startDate;
    public $endDate;
    public $startTime;
    public $endTime;
    
    public $isRecurring = false;
    public $isFullDay = false;
    
    public $venus;
    public $selectedVenuId;

    public $recurringTypes = [];
    public $selectedRecurringType;

    public $repeatInterval = 1;
    public $maxOccurances;

    protected $rules = [
        'name' => 'required|string',
        'startDate' => 'required|date',
        'repeatInterval' => 'numeric|nullable',
        'maxOccurances' => 'numeric|nullable',
    ];

    public function mount()
    {
        $this->venus = Venu::all();
        $this->selectedVenuId = $this->venus[0]->id;

        $this->recurringTypes = RecurringPattern::$recurringTypes;
    }

    public function save()
    {
        $this->validate();

        $event = Event::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'is_recurring' => $this->isRecurring,
            'is_full_day' => $this->isFullDay,
            'venu_id' => $this->selectedVenuId,
        ]);

        if ($this->isRecurring) {
            $event->recurringPattern()->create([
                'event_id' => $event->id,
                'recurring_type' => $this->selectedRecurringType,
                'repeat_interval' => $this->repeatInterval,
                'max_occurrences' => $this->maxOccurances,
            ]);
        }

        return redirect()->route('admin.events.index');
    }

    public function render()
    {
        return view('livewire.events.create');
    }
}
