<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
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
      $pesanan = Pesanan::where('status',1)->get();

      $countNotif = count($pesanan);

       if(!Auth::user())
       {
        return redirect()->route('login');
       } else {
        return view('backend/dashboard',$pesanan, $countNotif);
       }

    }
}
