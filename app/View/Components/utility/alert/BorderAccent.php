<?php

namespace App\View\Components\utility\alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BorderAccent extends Component
{
    /**
     * Create a new component instance.
     */

     private $variant, $message;
    public function __construct($variant, $message)
    {
        //
        $this->message = $message;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.alert.border-accent',[
            'variant'=>$this->variant,
            'message'=>$this->message
        ]);
    }
}
