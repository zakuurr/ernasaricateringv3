<div>
    <div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="{{url('/')}}">Beranda</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Daftar Menu</strong></div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="float-md-left mb-4"><h2 class="text-black h5">Kategori {{$kategori_nama}}</h2></div>
                  <div class="d-flex">
                    <div class="form-inline d-flex justify-content-center md-form form-sm mt-0 mr-1 ml-md-auto">
                        <i class="fas fa-search" aria-hidden="true"></i>
      <input class="form-control form-control-sm ml-3 w-75"  wire:model="search" type="text" placeholder="Search"
        aria-label="Search">

                      </div>
                  </div>
                </div>
              </div>
          <div class="row mb-5">
            <div class="col-md-9 order-2">
              <div class="row mb-5">
                @foreach($menus as $menu)
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="{{ route('menu.detail', $menu->slug) }}"><img src="{{ asset('storage/fotomenu/'. $menu->foto) }}" alt="Image placeholder" class="img-fluid"></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="{{ route('menu.detail', $menu->slug) }}">{{$menu->nama_menu}}</a></h3>
                        <p class="mb-0">{{$menu->deskripsi}}</p>
                        <p class="text-primary font-weight-bold">Rp.{{number_format($menu->harga,0,'.','.')}}</p>
                      </div>
                    </div>
                  </div>

                @endforeach



              </div>
              <div class="row" data-aos="fade-up">
                <div class="col-md-12 text-center">

                    {{ $menus->links() }}

                </div>
              </div>
            </div>

            <div class="col-md-3">


              <div class="border p-4 rounded mb-4">
                <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
                    @foreach($kategoris as $kategori)
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="{{route('menu.kategori',$kategori->id)}}" class="d-flex"><span>{{$kategori->kategori}}</span></a></li>

                    </ul>
                    @endforeach
                </div>



              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="site-section site-blocks-2">
                  <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-7 site-section-heading pt-4">
                      <h2>Menu Favorit</h2>
                    </div>
                  </div>
                  <div class="row">
                    @foreach($menus2 as $menu2)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                      <a class="block-2-item" href="#">
                        <figure class="image">
                          <img src="{{ asset('storage/fotomenu/'. $menu2->foto) }}" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                          <span class="text-uppercase">{{$menu2->Kategori->kategori}}</span>
                          <h3>{{$menu2->nama_menu}}</h3>
                        </div>
                      </a>

                    </div>
                    @endforeach
                  </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
