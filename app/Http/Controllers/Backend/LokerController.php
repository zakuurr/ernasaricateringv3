<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Order;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loker = Loker::all();
        $pesanan = Order::where('status','dipesan')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/loker/index',compact('loker','pesanan','countNotif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Order::where('status','dipesan')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/loker/create', compact('pesanan','countNotif'));
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
            $destination = 'storage/fotoloker/';
            $filename    = $request->file('foto');
            $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        }
       
       
        $loker = Loker::create([
            'judul'             => $request['judul'],
            'posisi_pekerjaan'  => $request['posisi_pekerjaan'],
            'deskripsi'         => $request['deskripsi'],
            'link_job'          => $request['link_job'],
            'status'            => 0,
            'foto'              => (int)$date . '.' . $filename->getClientOriginalExtension(),

        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('loker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ditempati($id)
    {
        $loker = Loker::find($id);
        $loker->update([
            'status'     => 1,
        ]);

        session()->flash('success', 'Lowongan pekerjaan telah terisi');
        return redirect()->route('loker.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loker = Loker::find($id);
        $pesanan = Order::where('status','dipesan')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/loker/edit', compact('loker','pesanan','countNotif'));
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
        $loker = Loker::find($request->id);

        $date = date('Ymdhs');
        if ($request->file('foto')) {

            $foto = $request->file('foto');
            $savefoto = (int)$date . '.' . $foto->getClientOriginalExtension();

            if ($loker->foto != null) {
                if (file_exists('storage/fotoloker/' . $loker->foto)) {
                    $delete_foto = unlink('storage/fotoloker/' . $loker->foto);
                }
                $foto->move('storage/fotoloker/', $savefoto);
            } else {
                $foto->move('storage/fotoloker/', $savefoto);
                $savefoto = $savefoto;
            }
        } else {
            $savefoto = $loker->foto;
        }

        $loker->update([
            'judul'             => $request['judul'],
            'posisi_pekerjaan'  => $request['posisi_pekerjaan'],
            'deskripsi'         => $request['deskripsi'],
            'link_job'          => $request['link_job'],
            'foto'              => $savefoto,
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('loker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loker = Loker::find($id);
        if ($loker->foto != null) {
            unlink('storage/fotoloker/' . $loker->foto);
        }
        $loker->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
