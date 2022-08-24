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
                  <h3 class="card-title">Ubah Data User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" name="FormTambah" onsubmit="return Validation()" enctype="multipart/form-data"
                action="{{ route('user.update', $user->id) }}">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" required id="nama" name="nama" value="{{ $user->name }}" placeholder="Masukan nama">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" required id="username" name="username" value="{{ $user->username }}" placeholder="Masukan username">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" required id="email" name="email" value="{{ $user->email  }}" placeholder="Masukan email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" required id="password" name="password" placeholder="Password">
                    </div>
                    
                    {{-- <div class="form-group">
                      <label for="password_confirmation">Konfirmasi Password</label>
                      <input type="password" class="form-control" required id="password_confirmation" name="password_confirmation" placeholder="Konfifmasi Password">
                    </div> --}}

                    <div class="form-group">
                        <label for="level">Pilih level</label>
                        <select class="custom-select form-control-border" name="id_level" id="level">
                            <option>Pilih Level</option>
                        @foreach ($level as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $user->id_level ? 'selected' : '' }}>{{ $item->level }}</option>
                        @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                      <label for="password">Foto Profil</label>
                      <input type="file" name="foto" id="foto" class="form-control input-md">
                    </div>
                     

                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
        </div><!-- /.container-fluid -->
      </section>
@endsection