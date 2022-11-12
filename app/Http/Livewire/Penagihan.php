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

class Penagihan extends Component
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


    public function render()
    {
        return view('livewire.penagihan')->layout('layouts.base');
    }
}
