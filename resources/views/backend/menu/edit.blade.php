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
                  <h3 class="card-title">Ubah Menu Makanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('menu.update', $menu->id) }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_menu">Nama menu</label>
                      <input type="text" class="form-control" required value="{{ $menu->nama_menu }}" id="nama_menu" name="nama_menu" placeholder="Masukan menu makanan">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" minlength="0" class="form-control" required value="{{ $menu->harga }}" id="harga" name="harga" placeholder="Masukan harga">
                    </div>
                  
                    <div class="form-group">
                        <label for="level">Pilih tipe</label>
                        <select class="custom-select form-control-border" required name="tipe" id="level">
                            <option>Pilih tipe</option>
                            <option value="Paket" {{ $menu->tipe == 'Paket' ? 'selected' : '' }}>Paket</option>
                            <option value="Satuan" {{ $menu->tipe == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                            <option value="Menu Utama" {{ $menu->tipe == 'Menu Utama' ? 'selected' : '' }}>Menu Utama</option>
                            <option value="Diskon" {{ $menu->tipe == 'Diskon' ? 'selected' : '' }}>Diskon</option>
                            <option value="Desert" {{ $menu->tipe == 'Desert' ? 'selected' : '' }}>Desert</option>
                            <option value="Minuman" {{ $menu->tipe == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Makanan</label>
                        <textarea class="form-control" required id="deskripsi" rows="5" name="deskripsi" placeholder="Deskripsi Makanan">{{ $menu->deskripsi }}</textarea>
                      </div>

                    <div class="form-group">
                        <label for="password">Foto Makanan</label>
                        <input type="file" name="foto" id="foto" class="form-control input-md">
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