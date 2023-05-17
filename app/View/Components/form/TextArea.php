<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     */

    private String $formId, $label, $placeholder, $name,$value; 
    public function __construct($formId,$label,$placeholder,$name,$value="")
    {
        $this->formId = $formId;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->name = $name ;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.text-area',[
            'formId'=>$this->formId,
            'label'=>$this->label,
            'placeholder'=>$this->placeholder,
            'name'=>$this->name,
            'value'=>$this->value
        ]);
    }
}
