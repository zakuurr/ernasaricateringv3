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
        <a href="{{ route('ongkir.create') }}" class="btn btn-success">
          <i class="fa fa-plus"></i> Tambah data
      </a> <br><br>
      <form action="{{ route('ongkir-flat.update', $ongkir_flat->id)  }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="ongkir_flat">Ongkir Flat/Maksimal</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <input type="number" min="0" value="{{ $ongkir_flat->ongkir_flat }}" class="form-control" required id="ongkir_flat" name="ongkir_flat" >
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <button type="submit" class="btn btn-info">Ubah</button>
            </div>
          </div>
       
        </div>
      </form>
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
              <td>Rp {{ number_format($item->harga_ongkir,0,'.','.') }}</td>

              <td>
                <center>
                  <a href="{{ route('ongkir.edit', $item->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil"></i> 
                </a>
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

{{-- <script>
  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var jarak1 = button.data('jarak1')
    var jarak2 = button.data('jarak2')
    var harga_ongkir = button.data('harga_ongkir')


    var modal = $(this)
    modal.find('.modal-body #jarak1').val(jarak1)
    modal.find('.modal-body #jarak2').val(jarak2)
    modal.find('.modal-body #harga_ongkir').val(harga_ongkir)
  })
</script> --}}
@endsection
@endsection
