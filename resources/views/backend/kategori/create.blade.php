@extends('backend/layout-master')
@section('title')
   Management Kategori | Create
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
                  <h3 class="card-title">Tambah Data Kategori Menu Makanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('kategori.store') }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kategori">Nama Kategori</label>
                      <input type="text" class="form-control" required id="kategori" name="kategori" placeholder="Masukan Kategori menu makanan">
                    </div>
                    <div class="form-group">
                      <label for="slug">Slug</label>
                      <input type="text" class="form-control" required id="slug" name="slug" placeholder="Masukan slug">
                    </div>





                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>
@endsection
