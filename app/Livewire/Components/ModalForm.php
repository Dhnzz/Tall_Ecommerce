<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ModalForm extends Component
{
    public $inputs;
    public function mount($inputs){
        $this->inputs = $inputs;
    }

    public function render()
    {
        return view('livewire.components.modal-form');
    }
    
}
