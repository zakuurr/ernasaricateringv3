<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
            </div>
        </div>
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('storage/fotomenu/'. $menu->foto) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$menu->nama_menu}}</h2>
          @if($menu->is_ready == 1)
          <span class="badge text-bg-success"><i class="fa-solid fa-check"></i> Ready Stok</span>
         @else
        <span class="badge text-bg-danger"><i class="fa-solid fa-x"></i> Stok Habis</span>
        @endif
          <p>{{$menu->deskripsi}}</p>

          <p><strong class="text-primary h4">Rp. {{number_format($menu->harga,0,'.','.')}}</strong></p>
          <form wire:submit.prevent="masukanKeranjang">
          <div class="mb-5">

            <div class="input-group mb-3" style="max-width: 120px;">
                <p style="color: black"> Jumlah Pesanan</p>
            <input type="number" id="jumlah_pesanan" class="form-control text-center @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="1 {{ old('jumlah_pesanan')}}">
          </div>

            @error('jumlah_pesanan')
            <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
            </span>
@enderror
          </div>
          <p><button type="submit" class="btn btn-sm text-black" style="background-color: #d49701; :color : black" @if($menu->is_ready !== 1) @disabled(true) @endif>Add To Cart</button></p>
        </form>
        </div>
      </div>
    </div>
  </div>
