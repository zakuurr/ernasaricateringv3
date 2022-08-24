@extends('backend/layout-master')
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Manajemen Lowongan Pekerjaan</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <a href="{{ route('loker.create') }}" class="btn btn-success" style="margin-bottom:10px;">+ Tambah Loker</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Posisi</th>
            <th>Deskirpsi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($loker as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->posisi_pekerjaan }}</td>
              <td>{{ $item->deskripsi }}</td>
              @if ($item->status == 0)
              <td><span class="badge badge-success">Tersedia</span></td>    
              @else
              <td><span class="badge badge-danger">Tidak Tersedia</span></td>    
              @endif
              
              <td>
                <center>
                  <a class="btn btn-info" href="{{ route('loker.edit', $item->id) }}" ><i class="fa fa-pencil"></i></a>
                  @if ($item->status == 0)
                  <a style="margin: 5px;" class="btn btn-success tombol-terisi" href="{{ route('loker.ditempati', $item->id) }}">Terisi</a>
                  @endif
                  <a class="btn btn-danger tombol-hapus" href="{{ route('loker.destroy', $item->id) }}"><i class="fas fa-trash" ></i></a>
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
text: "Info lowongan pekerjaan makanan ini akan dihapus",
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

$('.tombol-terisi').on('click', function (e) {

e.preventDefault();

const href =$(this).attr('href');

Swal.fire({
title: 'Apakah anda yakin ?',
text: "Dengan ini menyatakan bahwa Lowongan Pekerjaan ini sudah terisi/ditempati.",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Ya'
}).then((result) => {
if (result.value) {
    document.location.href = href;
    Swal.fire(
  'Diubah!',
  'Lowongan Pekerjaan sudah tidak tersedia',
  'success'
)
}
})

});

</script>
@endsection
@endsection
