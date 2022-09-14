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
          <img src="{{ asset('storage/fotomenu/'. $menus->foto) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$menus->nama_menu}}</h2>
          {{-- @if($menus->stock_status === 'instock')
          <span class="badge text-bg-success"><i class="fa-solid fa-check"></i> Stok Tersedia</span>
         @elseif($menus->stock < 1)
        <span class="badge text-bg-danger"><i class="fa-solid fa-x"></i> Stok Habis</span>
        @endif --}}
          <p>{{$menus->deskripsi}}</p>
          @if($menus->stock > 1)
          <span class="badge text-bg-success"><i class="fa-solid fa-check"></i> Menu Tersedia</span>
          @else
          <span class="badge text-bg-danger"><i class="fa-solid fa-x"></i> Menu Habis</span>
          @endif
          {{-- <h5 class="text-black">Stok Tersedia : {{$menus->stock}}</h5> --}}

          <p><strong class="text-primary h4">Rp. {{number_format($menus->harga,0,'.','.')}}</strong></p>
          {{-- <form wire:submit.prevent="masukanKeranjang"> --}}
          <div class="mb-5">

            <div class="input-group mb-3" style="max-width: 120px;">
                <p style="color: black"> Jumlah Pesanan</p>
            <input type="number" id="quantity" class="form-control text-center @error('quantity') is-invalid @enderror" wire:model="quantity" max="{{$menus->stock}}">
          </div>

            @error('jumlah_pesanan')
            <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
            </span>
@enderror
          </div>
          @if($menus->stock > 1)
          <p><button wire:click.prevent="store({{$menus->id}},'{{$menus->nama_menu}}',{{$menus->harga}})" type="submit" class="btn btn-sm text-black" style="background-color: #d49701; :color : black" @if($menus->stock_status === 'outofstock') @disabled(true) @endif>Tambahkan Ke Keranjang</button></p>
          @else

          @endif
        {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
