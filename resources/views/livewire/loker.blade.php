<div>
    <div class="site-blocks-cover" style="background-image: url(frontend/images/banner.jpg); background-size: cover;background-attachment: fixed; background-position : center top" data-aos="fade">
        <div class="container">
          <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-6 text-center text-md-left pt-5 pt-md-0">
              <h1 class="mb-2 text-white">Erna Sari Catering <br> Lowongan Pekerjaan</h1>
            </div>
          </div>
        </div>
    </div>
    <div class="bg-light py-3 mt-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="{{url('/')}}">Beranda</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Info Lowongan Kerja</strong></div>
          </div>
        </div>
      </div>
    <div class="container mt-3">

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($lokers as $loker)
            <div class="col-md-6">

              <div class="card">
                <img src="storage/fotoloker/{{$loker->foto}}" class="card-image-top" alt="...">
                <div class="card-overlay">
                    <div class="card-header">

                      <div class="card-header-text">
                        <h3 class="card-title text-black">Posisi Pekerjaan : {{$loker->posisi_pekerjaan}}</h3>
                        {{-- <span class="card-status">1 hour ago</span> --}}
                      </div>
                    </div>
                    <center>
                   <a href="{{ route('loker.detail', $loker->id) }}" class="text-center mt-3 mb-3 btn btn-info"> Detail </a>
                    </center>
                  </div>
              </div>

            </div>
            @endforeach
          </div>
    </div>

</div>
