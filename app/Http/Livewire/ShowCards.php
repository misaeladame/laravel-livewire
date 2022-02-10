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

    // public $tabla1 = [25, 28, 34, 5, 21, 45, 6, 42, 4, 12, 29, 53, 47, 48, 49, 43];
    // public $tabla2 = [13, 14, 9, 40, 18, 32, 49, 5, 1, 38, 52, 7, 22, 26, 3];
    // public $tabla3 = [25, 14, 40, 9, 40];
    public $tabla = [
        [25, 28, 34, 5, 21, 45, 6, 42, 4, 12, 29, 53, 47, 48, 49, 43], // Tabla 1
        [13, 14, 9, 40, 18, 32, 49, 5, 1, 38, 52, 7, 22, 26, 3, 8], // Tabla 2
        [29, 53, 37, 47, 16, 19, 9, 22, 8, 24, 50, 15, 6, 23, 1, 32], // Tabla 3
        [50, 17, 38, 47, 39, 7, 12, 23, 3, 52, 6, 22, 10, 28, 19, 48], // Tabla 4
        [54, 11, 20, 25, 9, 47, 53, 48, 43, 5, 21, 34, 22, 15, 46, 27], // Tabla 5
        [29, 1, 7, 35, 12, 44, 46, 15, 45, 54, 49, 5, 33, 51, 28, 4], // Tabla 6
        [20, 22, 31, 23, 48, 47, 34, 50, 15, 36, 54, 52, 2, 3, 44, 17], // Tabla 7
        [51, 54, 26, 22, 42, 34, 3, 1, 50, 11, 6, 32, 5, 47, 33, 7], // Tabla 8
        [53, 43, 6, 31, 19, 24, 42, 33, 28, 14, 35, 25, 30, 11, 13, 45], // Tabla 9
        [48, 40, 36, 28, 2, 32, 50, 53, 30, 38, 22, 8, 16, 25, 9, 26], // Tabla 10
        [2, 17, 45, 46, 1, 10, 38, 4, 41, 31, 40, 37, 24, 51, 16, 34], // Tabla 11
        [53, 54, 24, 30, 19, 52, 29, 21, 6, 16, 15, 1, 12, 8, 10, 28], // Tabla 12
        [30, 38, 4, 53, 46, 11, 41, 17, 37, 35, 14, 15, 33, 20, 10, 8], // Tabla 13
        [54, 42, 15, 2, 12, 45, 27, 13, 25, 51, 7, 37, 18, 14, 38, 33], // Tabla 14
        [13, 4, 16, 38, 23, 27, 33, 49, 31, 24, 54, 41, 30, 48, 47, 25], // Tabla 15
        [41, 40, 14, 1, 3, 27, 18, 39, 9, 23, 35, 45, 37, 26, 34,36], // Tabla 16
        [14, 18, 21, 43, 12, 23, 51, 49, 53, 13, 42, 44, 7,52, 40, 19], // Tabla 17
        [3, 12, 32, 17, 20, 26, 19, 52, 24, 30, 39, 46, 25, 29, 18, 36], // Tabla 18
        [35, 3, 39, 27, 43, 10, 34, 36, 6, 37, 2, 24, 30, 8, 14, 19], // Tabla 19
        [29, 27, 43, 40, 36, 11, 6, 41, 20, 53, 26, 21, 39, 44, 2, 50] // Tabla 20
    ];

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
