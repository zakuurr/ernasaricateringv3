<?php

namespace App\Http\Livewire;

use App\Models\Backend\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
        }

        return view('livewire.homepage',[
            'menus' => Menu::take(6)->get()
        ])->layout('layouts.base');
    }
}
