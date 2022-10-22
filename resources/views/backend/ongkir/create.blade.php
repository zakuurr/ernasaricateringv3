@extends('backend/layout-master')
@section('title')
    Konfigurasi Ongkir | Create
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
                  <h3 class="card-title">Tambah Data Ongkir</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('ongkir.store') }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="jarak1">Jarak 1</label>
                      <input type="number" min="0" class="form-control" required id="jarak1" name="jarak1" placeholder="Masukan jarak 1 (KM)">
                    </div>
                    <div class="form-group">
                      <label for="jarak2">Jarak 2</label>
                      <input type="number" min="0" class="form-control" required id="jarak2" name="jarak2" placeholder="Masukan jarak 1 (KM)">
                    </div>
                    <div class="form-group">
                      <label for="harga_ongkir">Harga Ongkir</label>
                      <input type="number" min="0" class="form-control" required id="harga_ongkir" name="harga_ongkir" placeholder="Harga Ongkir">
                    </div>
                   
                        

                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('ongkir.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
        </div><!-- /.container-fluid -->
      </section>
@endsection