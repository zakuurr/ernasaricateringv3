<div>
    <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('msg'))
                    <div class="alert alert-danger">
                        {{session('msg')}}
                    </div>
                    @endif
                </div>
            </div>

          </div>
          <div class="row mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th class="product-thumbnail">Tanggal Pesan</th>
                              <th class="product-name">Kode Pemesanan</th>
                              <th class="product-quantity">Pesanan</th>
                              <th class="product-total">Status</th>
                              <th class="product-total">Metode Pembayaran</th>
                              <th class="product-total">Total Harga</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            $total = 0;
                            ?>
                                @forelse ($pesanans as $pesanan)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                      {{$pesanan->created_at}}</td>
                                      <td>
                                        {{$pesanan->kode_pemesanan}}</td>
                                        <td>
                                                <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id',$pesanan->id)->get() ?>
                                                @foreach($pesanan_details as $pesanan_detail)
                                                <ul>
                                                    <li><img src="{{ asset('storage/fotomenu/'. $pesanan_detail->menu->foto) }}" alt="Image" class="img-fluid mt-3 p-3" width="100">
                                                        {{$pesanan_detail->menu->nama_menu}}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                        </td>
                                        <td>
                                           @if($pesanan->status == 1)
                                           <span class="badge badge-danger"> Belum Bayar </span>
                                                @else
                                                <span class="badge badge-success"> Sudah Bayar </span>
                                                @endif
                                        </td>
                                        <td>
                                            {{$pesanan->metode_p}}</td>
                                        </td>
                                        <td>
                                           Rp. {{number_format($pesanan->total_harga,0,'.','.')}}
                                         </td>

                                    </tr>


                                @empty
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                                @endforelse
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
          </div>

        </div>
      </div>
</div>
