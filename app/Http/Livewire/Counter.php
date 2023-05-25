<?php

namespace App\Http\Livewire;

use App\Http\Service\ArtikelService;
use Livewire\Component;

class Counter extends Component
{
    protected ArtikelService $artikelService;
    public $count = 0;
    public $data;
    public $message;

    public function __construct() {
        $this->artikelService = new ArtikelService();
    }

    public function increment()
    {
        $this->data = "loading";
        $temp = $this->artikelService->findById($this->count);
        if (isset($temp)) {
            $this->data = $temp->isi_artikel;
        } else {
            $this->data = "id $this->count tidak ada";
        }
        
        
        $this->count++;

    }
    public function render()
    {
        return view('livewire.counter');
    }
}
