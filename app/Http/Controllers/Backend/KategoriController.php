<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Kategori;
use App\Models\Order;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        return view('backend/kategori/index', compact('kategori','pesanan','countNotif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/kategori/create', compact('pesanan','countNotif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $date = date('Ymdhs');
        // if ($request->hasFile('foto')) {
        //     $destination = 'storage/fotomenu/';
        //     $filename    = $request->file('foto');
        //     $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        // }


        $kategori = Kategori::create([
            'kategori'   => $request['kategori'],
            'slug'       => $request['slug'],
        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::find($id);
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);
        return view('backend/kategori/edit', compact('kategori','pesanan','countNotif'));
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
        $kategori = Kategori::find($request->id);


        $kategori->update([
            'kategori'   => $request['kategori'],
            'slug'       => $request['slug'],
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
