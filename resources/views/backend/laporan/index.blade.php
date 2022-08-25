@extends('backend/layout-master')
@section('content')
      <!-- Content Wrapper. Contains page content -->

    
    
    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Laporan</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tgl1">Tanggal :</label>
                    <input type="date" class="form-control" required id="tgl1" name="tgl1" placeholder="Pilih Tanggal Awal">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="date" class="form-control" required id="tgl2" name="tgl2" placeholder="Pilih Tanggal Akhir">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" id="search" class="btn btn-success"><i class="fa fa-search"></i> Cari data</button>
                </div>
            </div>
        </form>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
            <th>Kode Unik</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            {{-- @foreach ($pesanan as $key => $item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->kode_pemesanan }}</td>
              <td>{{ $item->user->name }}</td>
              <td>{{ $item->total_harga }}</td>
              <td>{{ $item->kode_unik }}</td>
              <td><span class="badge badge-danger">Belum hayar</span></td>
              <td>
                <center>
                  <a class="btn btn-warning" href="{{ route('pesanan.detail', $item->id) }}" ><font color="white"><i class="fa fa-eye"></i> Lihat detail</font></a>
                  <a class="btn btn-danger tombol-hapus" href="{{ route('pesanan.destroy', $item->id) }}"><i class="fas fa-trash" ></i>Hapus</a>
                </center>
              </td>
            </tr>
            @endforeach --}}
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

<script type="text/javascript">

    $('#search').on('click',function(){
    
    $value=$(this).val();
    
    $.ajax({
    
    type : 'get',
    
    url : '{{url("laporan/search")}}',
    
    data:{'tgl1':$value},
    
    success:function(data){
    
    $('tbody').html(data);
    
    }
    
    });
    
    
    
    })
    
    </script>
    
    <script type="text/javascript">
    
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    
    </script>
@endsection
@endsection