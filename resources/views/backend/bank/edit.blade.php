@extends('backend/layout-master')
@section('title')
Konfigurasi Bank | Edit
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
                  <h3 class="card-title">Ubah Data Bank</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('bank.update', $bank->id) }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input type="text" class="form-control" required id="nama_bank" name="nama_bank" value="{{ $bank->nama_bank }}">
                      </div>
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" required id="label" name="label" value="{{ $bank->label }}">
                      </div>
                      <div class="form-group">
                        <label for="no_rekening">No Rekening</label>
                        <input type="number" class="form-control" min="0" required id="no_rekening" name="no_rekening" value="{{ $bank->no_rekening }}">
                      </div>
                      <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input type="text" class="form-control" min="0" required id="atas_nama" name="atas_nama" value="{{ $bank->atas_nama }}">
                      </div>
                      <div class="form-group">
                        <label for="password">Logo</label>
                        <input type="file" name="foto" id="foto" class="form-control input-md">
                    </div>


                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('bank.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>
@endsection
