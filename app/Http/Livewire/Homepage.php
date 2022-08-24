<?php

namespace App\Http\Livewire;

use App\Models\Backend\Menu;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage',[
            'menus' => Menu::take(6)->get()
        ])->layout('layouts.base');
    }
}
