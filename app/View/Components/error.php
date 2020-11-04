<?php

namespace App\View\Components;

use Illuminate\View\Component;

class error extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $error;

    public function __construct($error)
    {
        $this->error=$error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.error');
    }
}
