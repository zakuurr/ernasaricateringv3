@extends('backend/layout-master')
@section('title')
   Rekapan Penjualan Ernasari
@endsection
@section('css')
<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')
<br>

<div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Rekapan Penjualan</h5>
      </div>
      <div class="card-body">
       
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pesan</th>
                  <th>Menu</th>
                  <th>Jumlah Dipesan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orderitem as $key => $item)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->order->created_at   )->translatedFormat('d F Y'); }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ $item->quantity }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a href="{{ route('pesanan.index') }}" class="btn btn-danger">Kembali</a>
      </div>
      <!-- /.card -->
    </div>
  </div>























































    {{-- <div class="card">
      <div class="card-header">
        <h2>Laporan</h2>
      </div>
      <div class="card-body">
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
            <th>Kode Unik</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($pesanan as $key => $item)
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
            @endforeach
          </tbody>
        </table>
      </div>
    </div> --}}

@section('js')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
    });
    
    </script>
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
        
    $tgl1=$("#tgl1").val();
    $tgl2=$("#tgl2").val();
    console.log($tgl1);
    $.ajax({
    
    type : 'get',
    
    url : '{{url("laporan/search")}}',
    
    data:{'tgl1':$tgl1,'tgl2':$tgl2},
    
    success:function(data){
    
    $('tbody').html(data);
    
    }
    
    });
    
    
    
    })
    
    </script>
    
    
@endsection
@endsection