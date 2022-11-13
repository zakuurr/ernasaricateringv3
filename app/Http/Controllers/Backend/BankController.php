<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Bank;
use App\Models\Order;
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        $pesanan = Order::where('status','menunggu-konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/bank/index', compact('bank','pesanan','countNotif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Order::where('status','menunggu-konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/bank/create', compact('pesanan','countNotif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Ymdhs');
        if ($request->hasFile('foto')) {
            $destination = 'storage/fotobank/';
            $filename    = $request->file('foto');
            $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        }

        $bank = Bank::create([
            'nama_bank'   => $request['nama_bank'],
            'label'   => $request['label'],
            'no_rekening'   => $request['no_rekening'],
            'atas_nama'   => $request['atas_nama'],
            'foto'        => (int)$date . '.' . $filename->getClientOriginalExtension(),

        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('bank.index');
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
        $bank = Bank::find($id);
        $pesanan = Order::where('status','menunggu-konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/bank/edit', compact('bank','pesanan','countNotif'));
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
        $bank = Bank::find($request->id);

        $date = date('Ymdhs');
        if ($request->file('foto')) {

            $foto = $request->file('foto');
            $savefoto = (int)$date . '.' . $foto->getClientOriginalExtension();

            if ($bank->foto != null) {
                if (file_exists('storage/fotobank/' . $bank->foto)) {
                    $delete_foto = unlink('storage/fotobank/' . $bank->foto);
                }
                $foto->move('storage/fotobank/', $savefoto);
            } else {
                $foto->move('storage/fotobank/', $savefoto);
                $savefoto = $savefoto;
            }
        } else {
            $savefoto = $bank->foto;
        }

        $bank->update([
            'nama_bank'   => $request['nama_bank'],
            'label'   => $request['label'],
            'no_rekening'   => $request['no_rekening'],
            'atas_nama'   => $request['atas_nama'],
            'foto'        => $savefoto,
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        if ($bank->foto != null) {
            unlink('storage/fotobank/' . $bank->foto);
        }
        $bank->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
