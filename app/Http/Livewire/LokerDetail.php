<?php

namespace App\Http\Livewire;

use App\Models\Loker as LokerMenu;
use Livewire\Component;

class LokerDetail extends Component
{

    public $loker;

    public function mount($id)
    {
        $lokerDetail = LokerMenu::find($id);
        if($lokerDetail)
        {
            $this->loker = $lokerDetail;
        }
    }

    public function render()
    {
        return view('livewire.loker-detail')->layout('layouts.base');
    }
}
