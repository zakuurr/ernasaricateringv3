@extends('backend/layout-master')
@section('title')
    Menu Makanan
@endsection
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Manajemen Menu Makanan</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="{{ route('menu.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Menu</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Menu</th>
            <th>Harga</th>

            <th>Deskripsi</th>
            <th>Stock</th>
            <th>Stock Status</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($menu as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td style="width:100px;"><img src="{{ asset('storage/fotomenu/'. $item->foto) }}" width="70%" ></td>
              <td>{{ $item->nama_menu }}</td>
              <td>{{ $item->harga }}</td>

              <td>{{ $item->deskripsi }}</td>
              <td>{{ $item->stock }}</td>
              <td>
                @if($item->stock_status === 'instock')
                <span class="badge badge-success">{{ $item->stock_status }} </span>
                @else
                <span class="badge badge-danger">{{ $item->stock_status }} </span>
                @endif</td>
              <td>{{ $item->kategori->kategori }}</td>
              <td>
                <center>
                  <a class="btn btn-info" href="{{ route('menu.edit', $item->id) }}" ><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-danger tombol-hapus" href="{{ route('menu.destroy', $item->id) }}"><i class="fas fa-trash" ></i></a>
                </center>
              </td>
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
text: "Menu makanan ini akan dihapus",
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
@endsection
