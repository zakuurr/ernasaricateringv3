<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Pesanan;
use App\Models\Order;
use App\Models\Orderitem;
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
        $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
        $countNotif = count($pesanan);

        //Rekap Penjualan
        $orderitem = DB::select('SELECT sum(order_items.quantity) as quantity, menu.nama_menu FROM order_items JOIN menu ON menu.id=order_items.menu_id JOIN orders ON orders.id=order_items.order_id GROUP BY menu.nama_menu');

        return view('backend/laporan/index', compact('pesanan','countNotif','orderitem'));
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
    public function show(Request $request)
    {
        // return $request;
        if ($request->jenis_laporan == 'rpenjualan') {
            //Notifikasi
            $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
            $countNotif = count($pesanan);
            $orderitem = Orderitem::where('created_at','>=',$request->tgl1)->where('created_at','<=',$request->tgl2)
            ->get();
            
            return view('backend/laporan/rekap-penjualan', compact('orderitem','pesanan','countNotif'));
        }elseif ($request->jenis_laporan == 'rpendapatan') {
             //Notifikasi
             $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
             $countNotif = count($pesanan);
             $orderitem = Order::where('created_at','>=',$request->tgl1)->where('created_at','<=',$request->tgl2)
             ->where('status','!=','konfirmasi')->where('status','!=','cancel')
             ->get();
 
 
             return view('backend/laporan/rekap-pendapatan', compact('orderitem','pesanan','countNotif'));
        }else{
            //Notifikasi
            $pesanan = Order::where('status','konfirmasi')->orderBy('created_at','DESC')->get();
            $countNotif = count($pesanan);
            $orderitem = Order::where('created_at','>=',$request->tgl1)->where('created_at','<=',$request->tgl2)
            ->where('status','!=','konfirmasi')->where('status','!=','cancel')
            ->get();


            return view('backend/laporan/rekap-ongkir', compact('orderitem','pesanan','countNotif'));
        }
    }

}
