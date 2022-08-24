<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('backend/user/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = Level::all();
        return view('backend/user/create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $date = date('Ymdhs');
        if ($request->hasFile('foto')) {
            $destination = 'storage/fotouser/';
            $filename    = $request->file('foto');
            $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        }
       
       
        $user = User::create([
            'name'        => $request['nama'],
            'email'       => $request['email'],
            'username'    => $request['username'],
            'password'    => bcrypt($request['password']),
            'id_level'    => $request['id_level'],
            'foto'        => (int)$date . '.' . $filename->getClientOriginalExtension(),

        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('user.index');
        
       
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
        $user = User::find($id);
        $level = Level::all();

        return view('backend/user/edit', compact('user','level'));
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
        // return $request;
        $user = User::find($request->id);

        $date = date('Ymdhs');
        if ($request->file('foto')) {

            $foto = $request->file('foto');
            $savefoto = (int)$date . '.' . $foto->getClientOriginalExtension();

            if ($user->foto != null) {
                if (file_exists('storage/fotouser/' . $user->foto)) {
                    $delete_foto = unlink('storage/fotouser/' . $user->foto);
                }
                $foto->move('storage/fotouser/', $savefoto);
            } else {
                $foto->move('storage/fotouser/', $savefoto);
                $savefoto = $savefoto;
            }
        } else {
            $savefoto = $user->foto;
        }

        $user->update([
            'name'        => $request['nama'],
            'email'       => $request['email'],
            'username'    => $request['username'],
            'password'    => bcrypt($request['password']),
            'id_level'    => $request['id_level'],
            'foto'        => $savefoto,
        ]);

        session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->foto != null) {
            unlink('storage/fotouser/' . $user->foto);
        }
        $user->delete();

        session()->flash('success', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
