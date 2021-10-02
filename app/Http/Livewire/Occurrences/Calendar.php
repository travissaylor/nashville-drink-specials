<?php

namespace App\Http\Livewire\Occurrences;

use App\Models\Occurrence;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

class Calendar extends LivewireCalendar
{
    public function events(): Collection
    {
        return Occurrence::with('event')
            ->whereDate('start_date', '>=', $this->gridStartsAt)
            ->whereDate('end_date', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (Occurrence $occurrence) {
                return [
                    'id' => $occurrence->id,
                    'title' => $occurrence->event->name,
                    'description' => $occurrence->event->description,
                    'date' => $occurrence->start_date,
                ];
            });
    }
}
