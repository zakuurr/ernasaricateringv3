<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id) {
    $this->order_id = $order_id;
    }
    public function render()
    {
        $pesanan = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user-orders-details-component',compact('pesanan'))->layout('layouts.base');
    }
}
