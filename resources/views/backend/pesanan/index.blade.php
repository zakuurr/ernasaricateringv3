@extends('backend/layout-master')
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Daftar Pesanan</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        {{-- <a href="{{ route('pesanan.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Menu</a> --}}
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Order ID</th>
            <th>Sub total</th>
            <th>Total</th>
            {{-- <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>Alamat</th> --}}
            <th>Status</th>
            <th>Order Date</th>
            <th colspan="2" class="text-center">Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($pesananOr as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->id }}</td>
              <td>{{ $item->subtotal }}</td>
              <td>{{ $item->total }}</td>
              {{-- <td>{{ $item->nama_lengkap }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->nohp }}</td>
              <td>{{ $item->alamat }}</td> --}}
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
                  <a class="btn btn-warning" href="{{ route('pesanan.detail', $item->id) }}" ><font color="white"><i class="fa fa-eye"></i> Lihat detail</font></a>
                  {{-- <a class="btn btn-danger tombol-hapus" href="{{ route('pesanan.destroy', $item->id) }}"><i class="fas fa-trash" ></i>Hapus</a> --}}
                </center>
              </td>
              <td>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'dikirim'])}}">Dikirim</a>
                      <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'cancel'])}}">Cancel</a>

                    </div>
                  </div>

            </td>
            </div>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @section('js')
<script>

$('.tombol-hapus').on('click', function (e) {

e.preventDefault();

const href =$(this).attr('href');

Swal.fire({
title: 'Apakah anda yakin ?',
text: "Transaksi pesanan ini akan dihapus",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Ya'
}).then((result) => {
if (result.value) {
    document.location.href = href;
    Swal.fire(
  'Terhapus!',
  'Data berhasil dihapus.',
  'success'
)
}
})

});

</script>
@endsection
@endsection
