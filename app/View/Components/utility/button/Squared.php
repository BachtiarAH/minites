<?php

namespace App\View\Components\utility\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Squared extends Component
{
    /**
     * Create a new component instance.
     */
    private $type,$variant;
    public function __construct($type,$variant)
    {
        //
        $this->type = $type;
        $this->variant = $variant;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.button.squared',[
            'type'=>$this->type,
            'variant'=>$this->variant
        ]);
    }
}
