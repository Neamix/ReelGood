<?php

namespace App\View\Components;

use Illuminate\View\Component;
class actorCarousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ppl;
    public function __construct($ppl)
    {
        $this->ppl = $ppl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.actor-carousel');
    }
}
