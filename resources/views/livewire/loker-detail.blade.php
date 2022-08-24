<div>
    <div class="site-blocks-cover" style="background-image: url('{{ asset('/frontend/images/banner.jpg')}}'); background-size: cover;background-attachment: fixed; background-position : center top" data-aos="fade">
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

            <div class="col-md-12">


                <div class="card mb-3">
                    <img class="card-img-top" src="{{asset('storage/fotoloker/'.$loker->foto)}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$loker->posisi_pekerjaan}}</h5>
                      <pre class="card-text">{{$loker->deskripsi}}</pre>
                      <h5 class="card-text"><small class="text-muted">Kirim CV anda ke email <strong>XXX@gmail.com </strong></small></h3>
                    </div>
                  </div>


            </div>

          </div>
    </div>
</div>
