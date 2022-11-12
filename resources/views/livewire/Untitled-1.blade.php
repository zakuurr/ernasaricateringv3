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
          <table id="example1" class="table table-bordered table-striped table-responsive">
            <tbody>
              @foreach ($pesanan as $key => $item)
              <tr>
                <td>ID Pesanan :</td>
                <td>{{ $item->id }}</td>
              </tr>
              <tr>
                <td>{{ $item->subtotal }}</td>
              </tr>
              <tr>
                <td>{{ $item->total }}</td>
              </tr>
              <tr>
                <td>{{ $item->nama_lengkap }}</td>
              </tr>
                <tr>
                <td>{{ $item->email }}</td>
                </tr>
                <tr>
                <td>{{ $item->nohp }}</td>
                </tr>
                <tr>
                <td>{{ $item->alamat }}</td>
                </tr>
                <tr>
                <td>{{ $item->status }}</td>
                </tr>
                <tr>
                <td>{{ $item->created_at }}</td>
                </tr>
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

                    @if($item->status == 'sedang-dikirim')

                    <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-success"><font color="white"><i class="fa fa-check"></i> Pesanan Diterima</font></button>
@endif

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
