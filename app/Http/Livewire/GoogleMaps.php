<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GoogleMaps extends Component
{
    public function render()
    {
        return view('livewire.google-maps')->layout('layouts.base');
    }
}
