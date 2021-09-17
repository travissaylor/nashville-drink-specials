<?php

namespace App\Http\Livewire\Occurrences;

use App\Models\Occurrence;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Month extends Component
{
    use WithPagination;

    public $date;

    public function mount($month, $year)
    {
        $this->date = Carbon::createFromDate($year, $month);
    }

    public function render()
    {
        $occurrences = Occurrence::whereMonth('start_date', '=', $this->date->month)->with(['event.venu'])->orderBy('start_date')->paginate(20);
        return view('livewire.occurrences.month', [
            'occurrences' => $occurrences
        ]);
    }
}
