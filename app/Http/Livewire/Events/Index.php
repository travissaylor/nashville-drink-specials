<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = "";

    public $sortField = "updated_at";
    public $sortDirection = "DESC";

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === "ASC" ? "DESC" : "ASC";
        } else {
            $this->sortDirection = "ASC";
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $events = Event::orderBy($this->sortField, $this->sortDirection)->search('name', $this->search)->paginate(10);

        return view('livewire.events.index', [
            'events' => $events
        ]);
    }
}
