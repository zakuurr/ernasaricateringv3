@extends('backend/layout-master')
@section('title')
    Laporan
@endsection
@section('content')
<br>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan Penjualan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="get" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
            action="{{ route('laporan.show') }}">
             @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="tgl1">Dari tanggal :</label>
                    <input type="date" class="form-control" required id="tgl1" name="tgl1" placeholder="Pilih Tanggal Awal">
                </div>
                <div class="form-group">
                    <label for="tgl2">Sampai Tanggal :</label>
                    <input type="date" class="form-control" required id="tgl2" name="tgl2" placeholder="Pilih Tanggal AKhir">
                </div>
                <div class="form-group">
                    <label for="jenis_laporan">Jenis Laporan :</label> <br>
                    <input type="radio" name="jenis_laporan" value="rpenjualan" id="jenis_laporan"> Rekap Penjualan <br>
                    <input type="radio" name="jenis_laporan" value="rpendapatan" id="jenis_laporan"> Rekap Pendapatan
                </div>
                <div class="form-group">
                    <button type="submit" id="search" class="btn btn-success"><i class="fa fa-search"></i> Cari data</button>
                </div>
            </form>
          </div>
          <!-- /.card -->

    </div><!-- /.container-fluid -->
  </section>
    
@endsection