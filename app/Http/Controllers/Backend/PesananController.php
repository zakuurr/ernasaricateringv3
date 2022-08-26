<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Support\Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();

        return view('backend/pesanan/index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailPrint(Request $request)
    {
        $pesanan = Pesanan::find($request->id_pesanan);
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
        $pesanan = Pesanan::find($id);
        $user = User::find($pesanan->user_id);
        $detailPesan = PesananDetail::where('pesanan_id','=',$pesanan->id)->get();
        $tanggal = Carbon::parse($pesanan->created_at)->translatedFormat('d F Y');


        return view('backend/pesanan/detail',compact('pesanan','user','detailPesan','tanggal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sudahBayar(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->update([
            'status'    => 2
        ]);

        session()->flash('success', 'Pesanan telah dibayar');
        return redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
      
        $pesanan->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
