<div>
   <div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profil Saya
            </div>
            <div class="panel-body">
                <div class="row">
                <div class="col-md-4">
                        @if($user->foto)
                        <img src="{{ asset('storage/fotouser/'. Auth::user()->foto) }}" width="100%">
                        @else
                       Tidak Ada Foto
                        @endif
                </div>
                <div class="col-md-8">
                       <p class="text-black">Nama : {{$user->name}}</p>
                       <p class="text-black">Alamat : {{$user->alamat}}</p>
                       <p class="text-black">No Handphone : {{$user->nohp}}</p>
                       <p class="text-black">Email : {{$user->email}}</p>
                       <a href="{{route('editprofile')}}" class="btn btn-info"> Ubah</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
