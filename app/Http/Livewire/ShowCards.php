<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Card;

class ShowCards extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public $selectedSalio = [];

    public $tabla1 = [25, 28, 34, 5, 21, 45, 6, 42, 4, 12, 29, 53, 47, 48, 49, 43];
    public $tabla2 = [13, 14, 9, 40, 18, 32, 49, 5, 1, 38, 52, 7, 22, 26, 3];
    // public $tabla3 = [25, 14, 40, 9, 40];


    // protected $listeners = ['render' => 'render'];
    protected $listeners = ['render'];


    public function render()
    {

        $cards = Card::where('carta', 'like', '%' . $this->search . '%')
            ->orWhere('salio', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();


        // foreach ($this->selectedSalio as $indice => $salio) {
        //     echo $indice;
        // }

        return view('livewire.show-cards', compact('cards'));
    }

    public function order($sort)
    {

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

    public function llenarTabla($tabla)
    {
        foreach ($this->selectedSalio as $salio) {

            if (in_array($salio, $tabla)) {
                echo $salio . ",";
            }
        }
    }
}
