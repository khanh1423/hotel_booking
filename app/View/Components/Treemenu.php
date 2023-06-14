<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Treemenu extends Component
{

    public $dataa;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataa)
    {
        $this->dataa = $dataa;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.treemenu');
    }
}
