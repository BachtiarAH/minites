<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */

    // private String $formId, $type, $label, $placeholder,$formName;
    // private bool $required;
    // public function __construct($formId,$type,$label,$placeholder,$required,$formName)
    // {
    //     $this->formId = $formId;
    //     $this->type = $type;
    //     $this->label = $label;
    //     $this->placeholder = $placeholder;
    //     $this->required = $required;
    //     $this->name = $formName;
    // }

    private String $formId, $label, $placeholder, $formName,$type , $required, $value; 
    public function __construct($formId,$label,$placeholder,$formName,$type,$required,$value="")
    {
        $this->formId = $formId;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->formName = $formName ;
        $this->type = $type;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input',[
            'formId'=>$this->formId,
            'type'=>$this->type,
            'label'=>$this->label,
            'placeholder'=>$this->placeholder,
            'required'=>$this->required,
            'formName'=>$this->formName,
            'value'=>$this->value
        ]);
    }
}
