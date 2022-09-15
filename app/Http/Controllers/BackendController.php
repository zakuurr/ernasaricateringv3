<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Backend\Menu;
use App\Models\PesananDetail;

class BackendController extends Controller
{
     /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $pesanan = Order::where('status','dipesan')->orderBy('created_at','DESC')->get();
      $countNotif = count($pesanan);
      $order = Order::get();
      $menu = Menu::get();
      $user = User::where('utype','USR')->get();

       if(!Auth::user())
       {
        return redirect()->route('login');
       } else {
        return view('backend/dashboard', compact('pesanan', 'countNotif','menu','order','user'));
       }

    }
}
