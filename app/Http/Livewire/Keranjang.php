<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{

    public $shipping;
    public $pembayaran;
    public $totalCartWithoutTax;
    public $totalWithTax;

    public function increaseQuantity($rowId) {

        $menu = Cart::get($rowId);
        $qty = $menu->qty+1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId) {

        $menu = Cart::get($rowId);
        $qty = $menu->qty-1;
        Cart::update($rowId,$qty);
    }
    // protected $pesanan;
    // protected $pesanan_details = [];

    public function destroy($rowId) {
        Cart::remove($rowId);
        session()->flash('success_message','Pesanan di Hapus');

    }

    public function destroyAll() {
        Cart::destroy();
        session()->flash('success_message','Pesanan di Hapus');

    }
    //     $pesanan_detail = PesananDetail::find($id);
    //     if(!empty($pesanan_detail)){
    //         $pesanan = Pesanan::where('id',$pesanan_detail->pesanan_id)->first();
    //         $jumlah_pesanan_detail = PesananDetail::where('pesanan_id',$pesanan->id)->count();
    //         if($jumlah_pesanan_detail == 1){
    //             $pesanan->delete();
    //         } else
    //         {
    //             $pesanan->total_harga = $pesanan->total_harga - $pesanan_detail->total_harga;
    //             $pesanan->update();
    //         }
    //         $pesanan_detail->delete();

    //     }


    //     $this->emit('masukKeranjang');

    //     session()->flash('message','Pesanan di Hapus');
    public function render()
    {
        $cartItems = Cart::content()->map(function (CartItem $items){
            return (object)[
                'total' => ($items->qty * $items->price),
            ];
        });

        $this->totalCartWithoutTax = $cartItems->sum('total') + $this->shipping;

        return view('livewire.keranjang',compact('cartItems'))->layout('layouts.base');
    }
}
