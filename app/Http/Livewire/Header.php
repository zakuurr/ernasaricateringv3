<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $jumlah = 0;

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if(Auth::user()){
            $pesanan = Order::where('user_id',Auth::user()->id)->where('status','menunggu-konfirmasi')->first();
            if($pesanan)
            {
                $this->jumlah = OrderItem::where('order_id',$pesanan->id)->count();
            } else{
                $this-> jumlah = 0;
            }
        }
    }


    public function mount()
    {
        if(Auth::user()){
            $pesanan = Order::where('user_id',Auth::user()->id)->where('status','menunggu-konfirmasi')->first();
            if($pesanan)
            {
                $this->jumlah = OrderItem::where('order_id',$pesanan->id)->count();
            }
        }

    }
    public function render()
    {
        return view('livewire.header',[
            'jumlah_pesanan' => $this->jumlah
        ])->extends('layouts.app')
        ->section('content');
    }
}
