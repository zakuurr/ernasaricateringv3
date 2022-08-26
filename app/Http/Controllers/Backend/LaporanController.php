<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/laporan/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax())

            {

            $output="";
            $tgl1 = Carbon::parse($request->tgl1)->translatedFormat('Y-m-d H:i:s');
            $tgl2 = Carbon::parse($request->tgl2)->translatedFormat('Y-m-d H:i:s');
            $pesanans = Pesanan::where('created_at','>=',$tgl1)->where('created_at','<=',$tgl2)->get();

            if($pesanans)

            {

            foreach ($pesanans as $key => $pesanan) {

            if ($pesanan->status==1) {
                $output.='<tr>'.

                '<td>'.$key + (1).'</td>'.
                
                '<td>'.$pesanan->kode_pemesanan.'</td>'.

                '<td>'.$pesanan->user->name.'</td>'.

                '<td>'.$pesanan->total_harga.'</td>'.

                '<td>'.$pesanan->kode_unik.'</td>'.
                '<td><span class="badge badge-danger">Belum hayar</span></td>'.

                '</tr>';

            }else{
                $output.='<tr>'.

                '<td>'.$key + (1).'</td>'.
                
                '<td>'.$pesanan->kode_pemesanan.'</td>'.
    
                '<td>'.$pesanan->user->name.'</td>'.
    
                '<td>'.$pesanan->total_harga.'</td>'.
    
                '<td>'.$pesanan->kode_unik.'</td>'.
                '<td><span class="badge badge-success">Sudah bayar</span></td>'.
    
                '</tr>';
            }
            

            }



            return Response($output);



            }



            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
