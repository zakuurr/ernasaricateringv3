<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga,$nohp,$alamat,$metode_p;

    public function mount(){
        if(!Auth::User())
        {
            return redirect()->route('login');
        }

        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

        if(!empty($pesanan)){
            if ($this->metode_p === 'COD') {

                $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik + 10000;
            } else {
                $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }
        } else
        {
            return redirect()->route('home');
        }
    }

    public function checkout() {
       $this->validate([
        'nohp' => 'required',
        'alamat' => 'required'
       ]);

       $user = User::where('id',Auth::user()->id)->first();
       $user->nohp = $this->nohp;
       $user->alamat = $this->alamat;
       $user->update();

    // update data pesanan
    $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
    $pesanan->status = 1;
    $pesanan->metode_p = $this->metode_p;

    $pesanan->update();

    $this->emit('masukKeranjang');

    return redirect()->route('history')->with('msg', 'Success');

    }
    public function render()
    {
        return view('livewire.checkout')->layout('layouts.base');
    }
}
