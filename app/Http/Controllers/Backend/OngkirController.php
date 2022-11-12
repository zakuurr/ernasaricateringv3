<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Backend\Ongkir;
use App\Models\Backend\OngkirFlat;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Order::where('status','menunggu-pembayaran')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        $ongkir = Ongkir::all();
        $ongkir_flat = OngkirFlat::first();
        return view('backend/ongkir/index', compact('pesanan','countNotif','ongkir','ongkir_flat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Order::where('status','menunggu-pembayaran')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/ongkir/create',compact('pesanan','countNotif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ongkir = Ongkir::create([
            'jarak1'   => $request['jarak1'],
            'jarak2'   => $request['jarak2'],
            'harga_ongkir'   => $request['harga_ongkir'],
        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('ongkir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Order::where('status','menunggu-pembayaran')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        $ongkir = Ongkir::find($id);
        return view('backend/ongkir/edit',compact('pesanan','countNotif','ongkir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ongkir = Ongkir::find($id);
        $ongkir->update([
            'jarak1'   => $request['jarak1'],
            'jarak2'   => $request['jarak2'],
            'harga_ongkir'   => $request['harga_ongkir'],
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('ongkir.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStoreFlat(Request $request, $id)
    {
        $ongkir = OngkirFlat::find($id);
        $ongkir->update([
            'ongkir_flat'   => $request['ongkir_flat'],
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('ongkir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ongkir = Ongkir::find($id);
        $ongkir->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
