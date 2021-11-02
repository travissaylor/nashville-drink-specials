<?php

namespace App\Http\Livewire\Occurrences;

use App\Models\Occurrence;
use Livewire\Component;

class Show extends Component
{
    public Occurrence $occurrence;

    public function mount($id)
    {
        $this->occurrence = Occurrence::find($id);
    }

    public function render()
    {
        return view('livewire.occurrences.show');
    }
}
