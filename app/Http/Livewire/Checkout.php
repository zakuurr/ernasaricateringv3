<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesanan;
use App\Models\Transaction;
use App\Models\Backend\Ongkir;
use App\Models\User;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

        $user = User::where('id',Auth::user()->id)->first();
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

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
    $order->status = 'konfirmasi';
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
    $order->status = 'konfirmasi';
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
            // $transaction = new Transaction();
            // $transaction->user_id = Auth::user()->id;
            // $transaction->order_id = $order->id;
            // $transaction->mode = 'cod';
            // $transaction->status = 'pending';
            // $transaction->save();
            $this->makeTransaction($order->id,'pending');
$this->resetCart();
        } else if($this->pembayaran == 'Transfer')
        {
            // $transaction = new Transaction();
            // $transaction->user_id = Auth::user()->id;
            // $transaction->order_id = $order->id;
            // $transaction->mode = 'transfer';
            // $transaction->status = 'pending';
            // $transaction->save();
            $this->makeTransaction($order->id,'pending');
            $this->resetCart();
        }

        $this->sendOrderConfirmationMail($order);

    }
    public function resetCart() {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function sendOrderConfirmationMail($order) {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function makeTransaction($order_id,$status) {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order_id;
            $transaction->mode = $this->pembayaran;
            $transaction->status = $status;
            $transaction->save();
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

    public function mount(){
        if(!Auth::User())
        {
            return redirect()->route('login');
        }

        $this->nama_lengkap = Auth::user()->name;
        $this->alamat = Auth::user()->alamat;
        $this->email = Auth::user()->email;
        $this->nohp = Auth::user()->nohp;



    }

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
$ongkir = Ongkir::select('harga_ongkir')->get();


        $this->kode_unik = mt_rand(99,100);
        $this->totalCartWithoutTax = $cartItems->sum('total') + $this->shipping;
        $this->verifyForCheckout();
        return view('livewire.checkout',[
            'ongkir' => $ongkir
        ])->layout('layouts.base');
    }
}
