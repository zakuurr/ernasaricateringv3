<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Loker as LokerMenu;

class Loker extends Component
{
    public function render()
    {

        return view('livewire.loker',
        [
            'lokers' => LokerMenu::all()
        ])->layout('layouts.base');
    }
}
