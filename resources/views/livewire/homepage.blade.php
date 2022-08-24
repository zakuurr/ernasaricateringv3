<div>
<div class="site-blocks-cover" style="background-image: url(frontend/images/banner.jpg); background-size: cover;background-attachment: fixed; background-position : center top" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2 text-white">Catering dan Rumah Makan</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4 text-white">Menerima antar makanan ke lokasi anda
                untuk lokasi Cicalengka sekitarnya!</p>
            <p>
              <a href="#" class="btn btn-sm text-black" style="background-color: #d49701; :color : black">Lihat Menu</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
          <div class="icon mr-4 align-self-start">
            <span class="icon-truck" style="color: #d49701"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Bebas Ongkir</h2>
            <p>Free Ongkir ke seluruh pulau Jawa.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
          <div class="icon mr-4 align-self-start">
            <span class="icon-dollar" style="color: #d49701"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Pembayaran Mudah</h2>
            <p>Dapat dilakukan secara tunai ataupun non tunai.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
          <div class="icon mr-4 align-self-start">
            <span class="icon-help" style="color: #d49701"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">Dukungan Pelanggan</h2>
            <p>Mendapat dukungan dari banyak pelanggan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-blocks-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
          <a class="block-2-item" href="#">
            <figure class="image">
              <img src="{{ asset('')}}frontend/images/paketpremium.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kategori</span>
              <h3>Paket</h3>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
          <a class="block-2-item" href="#">
            <figure class="image">
              <img src="{{ asset('')}}frontend/images/capcay.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kategori</span>
              <h3>Satuan</h3>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
          <a class="block-2-item" href="#">
            <figure class="image">
              <img src="{{ asset('')}}frontend/images/menuutama.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Kategori</span>
              <h3>Menu Utama</h3>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Menu Unggulan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
 @foreach($menus as $menu)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/fotomenu/'. $menu->foto) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="{{ url('list-menu/'.$menu->id)}}">{{$menu->nama_menu}}</a></h3>
                  <p class="mb-0">{{$menu->deskripsi}}</p>
                  <p class="text-primary font-weight-bold">Rp.{{number_format($menu->harga,0,'.','.')}}</p>
                </div>
              </div>
            </div>
            @endforeach
            {{-- <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="frontend/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="#">Corater</a></h3>
                  <p class="mb-0">Finding perfect products</p>
                  <p class="text-primary font-weight-bold">$50</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="frontend/images/cloth_2.jpg" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="#">Polo Shirt</a></h3>
                  <p class="mb-0">Finding perfect products</p>
                  <p class="text-primary font-weight-bold">$50</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="frontend/images/cloth_3.jpg" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="#">T-Shirt Mockup</a></h3>
                  <p class="mb-0">Finding perfect products</p>
                  <p class="text-primary font-weight-bold">$50</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="frontend/images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="#">Corater</a></h3>
                  <p class="mb-0">Finding perfect products</p>
                  <p class="text-primary font-weight-bold">$50</p>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Pesan Sekarang</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5">
          <a href="#"><img src="{{ asset('')}}frontend/images/menuutama.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
        </div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a href="#" style="font-style: italic">OUR TASTE IS HAPPINESS</a></h2>

          <p>Menerima antar makanan ke lokasi anda
            untuk lokasi Cicalengka sekitarnya!</p>
            <a href="{{ route('list-menu')}}" class="btn btn-sm text-black" style="background-color: #d49701; :color : black">Pesan Sekarang</a>
        </div>
      </div>
    </div>
  </div>
</div>
