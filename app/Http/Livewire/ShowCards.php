<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;

class ShowCards extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    // protected $listeners = ['render' => 'render'];
    protected $listeners = ['render'];


    public function render()
    {

        // Misael Adame
        $cards = Card::where('carta', 'like', '%' . $this->search . '%')
                        ->orWhere('salio', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();

        return view('livewire.show-cards', compact('cards'));
    }

    public function order($sort) {

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }


    }
}
