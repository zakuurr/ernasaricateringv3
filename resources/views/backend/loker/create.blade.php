@extends('backend/layout-master')
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
                  <h3 class="card-title">Tambah Info Lowongan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('loker.store') }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" required id="judul" name="judul" placeholder="Judul Lowongan">
                    </div>
                    <div class="form-group">
                      <label for="posisi_pekerjaan">Posisi Pekerjaan</label>
                      <input type="text" class="form-control" required id="posisi_pekerjaan" name="posisi_pekerjaan" placeholder="Masukan Posisi">
                    </div>

                    <div class="form-group">
                      <label for="link_job">Link Pekerjaan</label>
                      <small><i><font color="red">*Kosongkan jika tidak ada</font></i></small>
                      <input type="text" class="form-control" id="link_job" name="link_job" placeholder="https://link-job">
                    </div>
                

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" required id="deskripsi" rows="7" name="deskripsi" placeholder="Deskripsi/Kriteria"></textarea>
                      </div>

                    <div class="form-group">
                        <label for="password">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control input-md">
                    </div>
                        
                     

                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('loker.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
        </div><!-- /.container-fluid -->
      </section>
@endsection