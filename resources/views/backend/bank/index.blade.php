@extends('backend/layout-master')
@section('title')
   Konfigurasi Bank
@endsection
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Konfigurasi Bank</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="{{ route('bank.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Pilihan Bank</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Logo</th>
            <th>Nama Bank</th>
            <th>Tujuan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($bank as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td style="width:100px;"><img src="{{ asset('storage/fotobank/'. $item->foto) }}" width="70%" ></td>
              <td>{{ $item->nama_bank }}</td>
              <td>{{ $item->label }} <b>{{ $item->no_rekening }}</b> atas nama <b>{{ $item->atas_nama }}</b> </td>

              <td>
                <center>
                  <a class="btn btn-info" href="{{ route('bank.edit', $item->id) }}" ><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-danger tombol-hapus" href="{{ route('bank.destroy', $item->id) }}"><i class="fas fa-trash" ></i></a>
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
text: "Data ini akan dihapus",
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
