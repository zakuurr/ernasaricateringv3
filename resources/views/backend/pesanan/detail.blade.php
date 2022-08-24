@extends('backend/layout-master')
@section('content')
<br>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Detail Pesanan</h5>
                </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- info row -->
            <div class="row invoice-info">
                <table class="table table">
                      <tr>
                        <td width="20%">Kode Unik Pesanan</td>
                        <td>{{ $pesanan->kode_unik }}</td>
                      </tr>
                      <tr>
                        <td width="20%">Nama Pelanggan</td>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <td width="20%">Tanggal Pemesanan</td>
                        <td>{{ $tanggal }}</td>
                      </tr>
                      <tr>
                        <td width="20%">No. Hp</td>
                        <td>-</td> 
                      </tr>
                      <tr>
                        <td width="20%">Alamat</td>
                        <td>-</td>
                      </tr>
                      <tr>
                        <td width="20%">Jenis Pembayaran</td>
                        <td>Via Rekening / COD</td>
                      </tr>
                     
                  </table>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th width="10%">Qty</th>
                    <th width="20%">Foto</th>
                    <th>Menu Makanan</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($detailPesan as $item)
                    <tr>
                        <td>{{ $item->jumlah_pesanan }}</td>
                        <td><img src="{{ asset('storage/fotomenu/'. $item->menu->foto) }}" width="50%" ></td>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>Rp. {{ number_format($item->total_harga,0,'.','.') }}</td>
                    </tr>
                    @endforeach
             
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              {{-- <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{ asset('')}}frontend/images/bri.png" alt="BRI" width="50">
                <img src="{{ asset('')}}frontend/images/bni.png" alt="BNI" width="50">
                <img src="{{ asset('')}}frontend/images/bca.png" alt="BCA" width="50">
                <img src="{{ asset('')}}frontend/images/mandiri.png" alt="Mandiri" width="50">

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                  plugg
                  dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
              </div> --}}
              <!-- /.col -->
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:72%">Subtotal</th>
                      <td>Rp. {{ number_format($item->pesanan->total_harga,0,'.','.') }}</td>
                    </tr>
                    <tr>
                      <th>Pajak (11%)</th>
                      <td>Rp. 0</td>
                    </tr>
                    <tr>
                      <th>Ongkir</th>
                      <td>Rp. 0</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td><b> Rp. {{ number_format($item->pesanan->total_harga,0,'.','.') }}</b></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <form action="{{ route('pesanan.detail-print') }}">
                    @csrf
                    <input type="hidden" value="{{ $pesanan->id }}" name="id_pesanan">
                <button type="submit" class="btn btn-default" rel="noopener" formtarget="_blank"><i class="fas fa-print"></i> Print</button>
                </form>
                {{-- <a href="{{ route('pesanan.detail-print') }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                
                <a type="button" class="btn btn-success float-right" style="margin: 5px;">
                  <i class="fas fa-money"></i> Sudah Bayar
                </a>

                <a href="{{ route('pesanan.index') }}" style="margin: 5px;" class="btn btn-warning float-right"><i class="far fa-back"></i> Kembali </a>
              </div>
            </div>
          </div>
        </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection