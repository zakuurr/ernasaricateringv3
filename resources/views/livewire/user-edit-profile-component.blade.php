<div>
    <div class="container" style="padding: 30px 0">
     <div class="row">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Edit Profil Saya
             </div>
             <div class="panel-body">
                <a href="{{route('profile')}}" class="btn btn-primary pull-right">Kembali</a>
                <form wire:submit.prevent="updateProfile">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                    </div>
                    @endif
                 <div class="row">
                 <div class="col-md-4">
                         @if($newImage)
                         <img src="{{ $newImage->temporaryUrl() }}" width="100%">
                         @elseif($foto)
                         <img src="{{ asset('storage/fotouser/'. Auth::user()->foto) }}" width="100%">
                         @else
                            Tidak Ada Foto
                         @endif
                         <input type="file" class="form-control" wire:model="newImage"/>
                 </div>
                 <div class="col-md-8">
                        <p class="text-black">Nama : <input type="text" class="form-control" wire:model="name"/></p>
                        <p class="text-black">Alamat : <input type="text" class="form-control" wire:model="alamat"/></p>
                        <p class="text-black">No Handphone : <input type="text" class="form-control"wire:model="nohp"/></p>
                        <p class="text-black">Email : {{$email}}</p>
                        <button type="submit" class="btn btn-info pull-right">Ubah</button>
                 </div>
                </div>
            </form>
             </div>
         </div>
     </div>
 </div>
 </div>
