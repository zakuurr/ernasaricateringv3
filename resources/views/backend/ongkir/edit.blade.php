@extends('backend/layout-master')
@section('title')
    Konfigurasi Ongkir | Edit
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
                  <h3 class="card-title">Ubah Data Ongkir</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormUbah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('ongkir.update', $ongkir->id) }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="jarak1">Jarak 1</label>
                      <input type="number" min="0" class="form-control" value="{{ $ongkir->jarak1 }}" required id="jarak1" name="jarak1" placeholder="Masukan jarak 1 (KM)">
                    </div>
                    <div class="form-group">
                      <label for="jarak2">Jarak 2</label>
                      <input type="number" min="0" class="form-control" value="{{ $ongkir->jarak2 }}" required id="jarak2" name="jarak2" placeholder="Masukan jarak 1 (KM)">
                    </div>
                    <div class="form-group">
                      <label for="harga_ongkir">Harga Ongkir</label>
                      <input type="number" min="0" class="form-control" value="{{ $ongkir->harga_ongkir }}" required id="harga_ongkir" name="harga_ongkir" placeholder="Harga Ongkir">
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