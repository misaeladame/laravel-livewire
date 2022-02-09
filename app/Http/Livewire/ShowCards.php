<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;

class ShowCards extends Component
{

    public $search;

    public function render()
    {

        // Misael Adame
        $cards = Card::where('carta', 'like', '%' . $this->search . '%')
        ->orWhere('salio', 'like', '%' . $this->search . '%')->get();

        return view('livewire.show-cards', compact('cards'));
    }
}
