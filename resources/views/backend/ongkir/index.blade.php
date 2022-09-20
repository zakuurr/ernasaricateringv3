@extends('backend/layout-master')
@section('title')
   Konfigurasi Ongkir
@endsection
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Konfigurasi Ongkir</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="{{ route('ongkir.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Ongkir</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Jarak</th>
            <th>Harga Ongkir</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($ongkir as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->jarak1 }} Km - {{ $item->jarak2 }} Km</td>
              <td>Rp. {{ $item->harga_ongkir }}</td>

              <td>
                <center>
                  <a class="btn btn-info" href="{{ route('ongkir.edit', $item->id) }}" ><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-danger tombol-hapus" href="{{ route('ongkir.destroy', $item->id) }}"><i class="fas fa-trash" ></i></a>
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
