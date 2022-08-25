<?php

namespace App\Http\Livewire;

use App\Models\Backend\Menu;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class MenuDetail extends Component
{

    use AuthorizesRequests;

    public $menu,$jumlah_pesanan,$metode_p;

    public function mount($id)
    {
        $menuDetail = Menu::find($id);

        if($menuDetail)
        {
            $this->menu = $menuDetail;
        }
    }
public function masukanKeranjang(){

    $this->validate([
        'jumlah_pesanan' => 'required'
    ]);

    if(!Auth::user()){
        return redirect()->route('login');
    }

    $total_harga = $this->jumlah_pesanan*$this->menu->harga;

    //cek
    $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

    if(empty($pesanan))
    {
        Pesanan::create([
            'user_id' => Auth::user()->id,
            'total_harga' => $total_harga,
            'status' => 0,
            'kode_unik' => mt_rand(99,100),
        ]);
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->kode_pemesanan = 'PS-'.$pesanan->id;
        $pesanan->update();
    } else{
        $pesanan->total_harga = $pesanan->total_harga+$total_harga+$pesanan;
        $pesanan->update();
        }

        //Menyimpan pesanan detail
        PesananDetail::create([
'menu_id' => $this->menu->id,
'pesanan_id' => $pesanan->id,
'jumlah_pesanan' => $this->jumlah_pesanan,
'total_harga' => $total_harga
        ]);

        $this->emit('masukKeranjang');
        session()->flash('message','Sukses Masuk Ke Keranjang');

        return redirect()->back();
}
    public function render()
    {
        return view('livewire.menu-detail')->layout('layouts.base');
    }
}
