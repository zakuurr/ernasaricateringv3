<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{

    public $pesanans;

    public function cancelOrder() {

        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',1)->first();
        $pesanan->status = 3;

        $pesanan->update();
    }
    public function render()
    {
        if(Auth::User()){
$this->pesanans= Pesanan::where('user_id',Auth::user()->id)->where('status','!=',0)->get();
        }
        return view('livewire.history')->layout('layouts.base');

    }
}
