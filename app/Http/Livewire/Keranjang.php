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
    public $kode_unik;

    public function increaseQuantity($rowId) {

        $menu = Cart::instance('cart')->get($rowId);
        $qty = $menu->qty+1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId) {

        $menu = Cart::instance('cart')->get($rowId);
        $qty = $menu->qty-1;
        Cart::update($rowId,$qty);
    }
    // protected $pesanan;
    // protected $pesanan_details = [];

    public function destroy($rowId) {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Pesanan di Hapus');

    }

    public function destroyAll() {
        Cart::instance('cart')->destroy();
        session()->flash('success_message','Pesanan di Hapus');

    }

    public function checkout() {
        if(Auth::check())
        {

            return redirect()->route('checkout');
        } else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout() {

        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
    // if($this->shipping)
    // {
    //     session()->put('checkout',[
    //         'discount' => 0,
    //         'subtotal' => Cart::instance('cart')->subtotal(),
    //         'tax' => 0,
    //         'total' => $this->totalCartWithoutTax
    //     ]);
    // } else{
        session()->put('checkout',[
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => 0,
            'total' => Cart::instance('cart')->total()
        ]);
    // }
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
        $cartItems = Cart::instance('cart')->content()->map(function (CartItem $items){
            return (object)[
                'total' => ($items->qty * $items->price),
            ];
        });

        $this->kode_unik = mt_rand(99,100);
        $this->totalCartWithoutTax = $cartItems->sum('total') + $this->shipping;
$this->setAmountForCheckout();
        return view('livewire.keranjang',compact('cartItems'))->layout('layouts.base');
    }
}
