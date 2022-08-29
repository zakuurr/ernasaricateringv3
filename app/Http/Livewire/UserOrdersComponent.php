<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersComponent extends Component
{
    public function render()
    {
        $pesanan = Order::where('user_id',Auth::user()->id)->get();
        return view('livewire.user-orders-component',compact('pesanan'))->layout('layouts.base');
    }
}
