<?php

namespace App\Http\Livewire\Occurrences;

use App\Models\Occurrence;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Day extends Component
{
    use WithPagination;

    public $date;

    public function mount($day, $month, $year)
    {
        $this->date = Carbon::createFromDate($year, $month, $day);
    }
    public function render()
    {
        $occurrences = Occurrence::where('start_date', '=', $this->date->toDateString())->with(['event.venu'])->orderBy('start_time')->paginate(5);
        return view('livewire.occurrences.day', [
            'occurrences' => $occurrences
        ]);
    }
}