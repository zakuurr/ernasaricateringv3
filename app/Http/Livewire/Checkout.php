<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesanan;
use App\Models\Transaction;
use App\Models\User;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $shipping;
    public $pembayaran;
    public $totalCartWithoutTax;
    public $totalWithTax;
    public $kode_unik;

    public $cod;
    public $catatan;
    public $tf;
    public $nama_lengkap;
    public $email;
    public $nohp;
    public $alamat;
    public $thankyou;


    public function updated($fields) {
        $this->validateOnly($fields,[
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',

        ]);
    }
public function placeOrder() {
        $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nohp' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',

        ]);

if($this->shipping)
{

    $order = new Order();
    $order->user_id = Auth::user()->id;
    $order->subtotal = session()->get('checkout')['subtotal'];
    $order->tax = session()->get('checkout')['tax'];
    $order->total = $this->totalCartWithoutTax;

    $order->nama_lengkap = $this->nama_lengkap;
    $order->email = $this->email;
    $order->nohp = $this->nohp;
    $order->alamat = $this->alamat;
    $order->status = 'ordered';
    $order->catatan = $this->catatan;
    $order->save();
} else {
    $order = new Order();
    $order->user_id = Auth::user()->id;
    $order->subtotal = session()->get('checkout')['subtotal'];
    $order->tax = session()->get('checkout')['tax'];
    $order->total = session()->get('checkout')['total'];

    $order->nama_lengkap = $this->nama_lengkap;
    $order->email = $this->email;
    $order->nohp = $this->nohp;
    $order->alamat = $this->alamat;
    $order->status = 'ordered';
    $order->catatan = $this->catatan;
    $order->save();
}

        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->menu_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->pembayaran == 'COD')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();

        } else if($this->pembayaran == 'Transfer')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'transfer';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

    }

    public function verifyForCheckout() {
    if(!Auth::check())
    {
        return redirect()->route('login');
    }
    else if($this->thankyou)
    {
        return redirect()->route('thankyou');
    }
    else if(!session()->get('checkout'))
    {
        return redirect()->route('keranjang');
    }
    }

    // public $total_harga,$nohp,$alamat,$metode_p;

    // public function mount(){
    //     if(!Auth::User())
    //     {
    //         return redirect()->route('login');
    //     }

    //     $this->nohp = Auth::user()->nohp;
    //     $this->alamat = Auth::user()->alamat;

    //     $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

    //     if(!empty($pesanan)){
    //         if ($this->metode_p === 'COD') {

    //             $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik + 10000;
    //         } else {
    //             $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
    //     }
    //     } else
    //     {
    //         return redirect()->route('home');
    //     }
    // }

    // public function checkout() {
    //    $this->validate([
    //     'nohp' => 'required',
    //     'alamat' => 'required'
    //    ]);

    //    $user = User::where('id',Auth::user()->id)->first();
    //    $user->nohp = $this->nohp;
    //    $user->alamat = $this->alamat;
    //    $user->update();

    // // update data pesanan
    // $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
    // $pesanan->status = 1;
    // $pesanan->metode_p = $this->metode_p;

    // $pesanan->update();

    // $this->emit('masukKeranjang');

    // return redirect()->route('history')->with('msg', 'Success');

    // }
    public function render()
    {

        $cartItems = Cart::instance('cart')->content()->map(function (CartItem $items){
            return (object)[
                'total' => ($items->qty * $items->price),
            ];
        });

        $this->kode_unik = mt_rand(99,100);
        $this->totalCartWithoutTax = $cartItems->sum('total') + $this->shipping;
        $this->verifyForCheckout();
        return view('livewire.checkout')->layout('layouts.base');
    }
}
