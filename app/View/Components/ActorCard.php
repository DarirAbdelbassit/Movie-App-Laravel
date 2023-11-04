<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActorCard extends Component
{
    public $cast;
    /**
     * Create a new component instance.
     */
    public function __construct($cast)
    {
        $this->cast = $cast;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.actor-card');
    }
}
