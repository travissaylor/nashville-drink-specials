<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class heading extends Component
{
    public $sortable;

    public $direction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sortable = null, $direction = null)
    {
        $this->sortable = $sortable;
        $this->direction = $direction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.heading');
    }
}
