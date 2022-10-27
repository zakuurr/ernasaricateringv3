<div>
    <div class="card">
        <div class="card-header">
          <h2 class="text-center text-black">Pesanan Saya</h2>
        </div>
        <!-- /.card-header -->
        @if(Cart::instance('cart')->count() < 0)
        <h1 class="text-center text-black">Tidak Ada Pesanan</h1>
         @else

        <div class="card-body">
          {{-- <a href="{{ route('pesanan.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Menu</a> --}}
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Pesanan</th>
              <th>Sub total</th>
              <th>Total</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>No Hp</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>Tanggal Pesanan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($pesanan as $key => $item)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->subtotal }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nohp }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at }}</td>
                {{-- <td>
                  @if($item->status == 1)
                  <span class="badge badge-danger"> Belum Bayar </span>
                       @elseif ($item->status == 2)
                       <span class="badge badge-success"> Sudah Bayar </span>
                       @elseif ($item->status == 3)
                       <span class="badge badge-warning"> Di Batalkan </span>
                       @elseif ($item->status == 4)
                       <span class="badge badge-primary"> Di Proses </span>
                       @elseif ($item->status == 5)
                       <span class="badge badge-info"> Di Antar </span>
                       @elseif ($item->status == 6)
                       <span class="badge badge-success"> Selesai </span>
                       @endif


                </td> --}}
                <td>
                  <center>
                    <a class="btn btn-warning" href="{{ route('orders.detail', $item->id) }}" ><font color="white"><i class="fa fa-eye"></i> Lihat detail</font></a>
                    <a class="btn btn-danger" href=""> Pesanan Diterima</a>
                  </center>
                </td>

              </tr>
              @endforeach
            </tbody>

          </table>
        </div>

        @endif
        <!-- /.card-body -->
      </div>
</div>
