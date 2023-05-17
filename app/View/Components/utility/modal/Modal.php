<?php

namespace App\View\Components\utility\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    private $modalId;
    public function __construct($modalId)
    {
        //
        $this->modalId=$modalId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.modal.modal',[
            'modalId'=>$this->modalId
        ]);
    }
}
