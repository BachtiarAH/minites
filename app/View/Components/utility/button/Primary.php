<?php

namespace App\View\Components\utility\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Primary extends Component
{
    /**
     * Create a new component instance.
     */

    private $type;
    public function __construct($type)
    {
        //
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.button.primary',[
            'type'=>$this->type
        ]);
    }
}
