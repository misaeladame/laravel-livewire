<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;

class ShowCards extends Component
{
    public function render()
    {
        $cards = Card::all();

        return view('livewire.show-cards', compact('cards'));
    }
}
