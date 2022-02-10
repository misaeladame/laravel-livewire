<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class CreateCard extends Component
{

    public $open = false;

    public $carta;

    protected $rules = [
        'carta' => 'required|max:40',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {

        $this->validate();

        Card::create([
            'carta' => $this->carta,
            'salio' => 0
        ]);

        $this->reset(['open', 'carta']);

        $this->emitTo('show-cards','render');
        $this->emit('alert', 'La carta se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-card');
    }


}
