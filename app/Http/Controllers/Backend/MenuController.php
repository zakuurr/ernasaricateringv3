<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();

        return view('backend/menu/index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/menu/create');
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
            $destination = 'storage/fotomenu/';
            $filename    = $request->file('foto');
            $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        }
       
       
        $menu = Menu::create([
            'nama_menu'   => $request['nama_menu'],
            'harga'       => $request['harga'],
            'tipe'        => $request['tipe'],
            'deskripsi'   => $request['deskripsi'],
            'foto'        => (int)$date . '.' . $filename->getClientOriginalExtension(),

        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('menu.index');
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
        $menu = Menu::find($id);
        return view('backend/menu/edit', compact('menu'));
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
        $menu = Menu::find($request->id);

        $date = date('Ymdhs');
        if ($request->file('foto')) {

            $foto = $request->file('foto');
            $savefoto = (int)$date . '.' . $foto->getClientOriginalExtension();

            if ($menu->foto != null) {
                if (file_exists('storage/fotomenu/' . $menu->foto)) {
                    $delete_foto = unlink('storage/fotomenu/' . $menu->foto);
                }
                $foto->move('storage/fotomenu/', $savefoto);
            } else {
                $foto->move('storage/fotomenu/', $savefoto);
                $savefoto = $savefoto;
            }
        } else {
            $savefoto = $menu->foto;
        }

        $menu->update([
            'nama_menu'   => $request['nama_menu'],
            'harga'       => $request['harga'],
            'tipe'        => $request['tipe'],
            'deskripsi'   => $request['deskripsi'],
            'foto'        => $savefoto,
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu->foto != null) {
            unlink('storage/fotomenu/' . $menu->foto);
        }
        $menu->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
