<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Models\Venu;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $startDate;
    public $endDate;
    public $isRecurring = false;
    public $isFullDay = false;
    public $venus;
    public $selectedVenuId;
    public $recurringType = [
        
    ];

    protected $rules = [
        'name' => 'required|string',
        'startDate' => 'required|date',
    ];

    public function mount()
    {
        $this->venus = Venu::all();
        $this->selectedVenuId = $this->venus[0]->id;
    }

    public function save()
    {
        $this->validate();

        Event::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'is_recurring' => $this->isRecurring,
            'is_full_day' => $this->isFullDay,
            'venu_id' => $this->selectedVenuId,
        ]);

        return redirect()->route('admin.events.index');
    }

    public function render()
    {
        return view('livewire.events.create');
    }
}
