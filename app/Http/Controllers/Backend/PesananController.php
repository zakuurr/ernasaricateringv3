<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesananOr = Order::orderBy('created_at','DESC')->get();
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/pesanan/index', compact('pesanan','pesananOr','countNotif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateOrderStatus($id,$status) {
        $order = Order::find($id);
        $order->status = $status;
        if($status == "dikirim")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else if($status == "cancel"){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('success','Order status berhasil di ubah');
        return redirect()->back();
    }
    public function detailPrint(Request $request)
    {
        $pesanan = Order::find($request->id);
        $user = User::find($pesanan->user_id);
        $detailPesan = PesananDetail::where('pesanan_id','=',$pesanan->id)->get();
        $tanggal = Carbon::parse($pesanan->created_at)->translatedFormat('d F Y');

        return view('backend/pesanan/detail-print',compact('pesanan','user','detailPesan','tanggal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $pesananOr = Order::find($id);
        $user = User::find($pesananOr->user_id);
        // $detailPesan = PesananDetail::where('pesanan_id','=',$pesanan->id)->get();
        $tanggal = Carbon::parse($pesananOr->created_at)->translatedFormat('d F Y');
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/pesanan/detail',compact('pesanan','user','tanggal','pesananOr','countNotif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function sudahBayar(Request $request, $id)
    // {
    //     $pesanan = Pesanan::find($id);
    //     $pesanan->update([
    //         'status'    => 2
    //     ]);

    //     session()->flash('success', 'Pesanan telah dibayar');
    //     return redirect()->back();
    // }

    // public function diProses(Request $request, $id)
    // {
    //     $pesanan = Pesanan::find($id);
    //     $pesanan->update([
    //         'status'    => 4
    //     ]);

    //     session()->flash('success', 'Pesanan di proses');
    //     return redirect()->back();
    // }

    // public function diAntar(Request $request, $id)
    // {
    //     $pesanan = Pesanan::find($id);
    //     $pesanan->update([
    //         'status'    => 5
    //     ]);

    //     session()->flash('success', 'Pesanan di di antar');
    //     return redirect()->back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Order::find($id);

        $pesanan->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
