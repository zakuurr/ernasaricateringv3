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
                  <h3 class="card-title">Tambah Data Menu Makanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('menu.store') }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_menu">Nama menu</label>
                      <input type="text" class="form-control" required id="nama_menu" name="nama_menu" placeholder="Masukan menu makanan">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" required id="slug" name="slug" placeholder="Masukan slug">
                      </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" minlength="0" class="form-control" required id="harga" name="harga" placeholder="Masukan harga">
                    </div>

                    <div class="form-group">
                        <label for="level">Pilih Kategori</label>
                        <select class="custom-select form-control-border" required name="id_kategori" id="level">
                            <option>Pilih tipe</option>
                          @foreach ($kategori as $item)
                          <option value="{{$item->id}}">{{$item->kategori}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Makanan</label>
                        <textarea class="form-control" required id="deskripsi" rows="5" name="deskripsi" placeholder="Deskripsi Makanan"></textarea>
                      </div>

                    <div class="form-group">
                        <label for="password">Foto Makanan</label>
                        <input type="file" name="foto" id="foto" class="form-control input-md">
                    </div>

                    <div class="form-group">
                        <label for="level">Stock Status</label>
                        <select class="custom-select form-control-border" required name="stock_status" id="level">
                            <option>Pilih Status</option>
                            <option value="instock">In Stock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">stock</label>
                        <input type="number" minlength="0" class="form-control" required id="stock" name="stock" placeholder="Masukan stock">
                      </div>


                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('menu.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>
@endsection
