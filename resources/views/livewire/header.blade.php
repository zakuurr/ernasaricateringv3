<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <div class="site-logo">
                <img src="{{ asset('')}}frontend/images/logoerna.png" class="img-fluid" style="width: 30%">
              </div>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="" class="js-logo-clone">Erna Sari Catering </a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                @if(Route::has('login'))

                @auth
                    @if(Auth::user()->utype === 'ADM')
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
</li>

                    @else
                    <li>
                      <a href="{{ route('keranjang')}}" class="site-cart">
                        <span class="icon icon-shopping_cart"></span>
                        @if(Cart::instance('cart')->count() > 0)
                        <span class="count">{{Cart::instance('cart')->count()}}</span>
                        @endif
                      </a>
                    </li>
                    <li>
                        <a href="{{ route('orders')}}" class="site-cart">
                          Pesanan Saya
                        </a>


                      </li>

                      <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" >
                            <a class="dropdown-item" href="{{route('profile')}}">
                                Profile Saya
                            <a class="dropdown-item" href="{{route('ubahpassword')}}">
                             Ubah Password
                         </a>

                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>


                    @endif

                @else
                <a class="" href="{{ route('login') }}">
                    {{ __('Login') }} /
                    </a>

                    <a class="" href="{{ route('register') }}">
                      {{ __('Register') }}
                      </a>
                @endif

                @endif


                </li>
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div>

          </div>


        </div>
      </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
          <li class="active">
            <a href="{{url('/')}}">Beranda</a>
          </li>
          <li class="">
            <a href="{{url('/about')}}">Tentang Kami</a>

          </li>
          <li><a href="{{url('/list-menu')}}">Daftar Menu</a></li>
          <li><a href="{{url('/kontak')}}">Kontak Kami</a></li>
          <li><a href="{{url('/info-loker')}}">Lowongan Kerja</a></li>
        </ul>
      </div>
    </nav>
  </header>
