<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrdersComponent extends Component
{

    public function destroy($order_id)
    {
        $order = Order::find($order_id);

        if($order) {
            $order->status="pesanan-diterima";
            $order->diterima_date = DB::raw('CURRENT_DATE');
            $order->save();
        }

        //redirect
        return redirect()->route('orders');

    }

    public function render()
    {
        $pesanan = Order::where('user_id',Auth::user()->id)->get();
        return view('livewire.user-orders-component',compact('pesanan'))->layout('layouts.base');
    }
}
