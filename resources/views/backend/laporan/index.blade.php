@extends('backend/layout-master')
@section('css')
<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')


<div class="col-12 col-sm-12">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Rekap Penjualan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Rekap Pendapatan</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                  @foreach ($order as $key => $item)
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
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
             Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
          </div>
        </div>
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

{{-- <script type="text/javascript">

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
    
    </script> --}}
    
    
@endsection
@endsection