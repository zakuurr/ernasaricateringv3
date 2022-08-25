<div>
    <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{session('message')}}
                </div>
                @endif
            </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Informasi Pembayaran</h2>
                <div class="p-3 p-lg-5 border">
                        <div class="">
                            <p class="mb-0">
                                <div class="">
                                    <form wire:submit.prevent="checkout">
                                        <div class="form-group">
                                            <label for="" class="text-black">Nama</label>
                                            <input type="text" id="nohp" class="form-control" value="{{ Auth::user()->name }}" readonly>


                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">Email</label>
                                            <input type="text" id="nohp" class="form-control" value="{{ Auth::user()->email }}" readonly>


                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">No Hp</label>
                                            <input type="text" id="nohp" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp')}}">

                                            @error('nohp')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">Alamat</label>
                                            <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror "></textarea>

                                            @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">Metode Pembayaran</label>
                                            <select wire:model="metode_p" class="form-select" aria-label="Default select example">
                                                <option selected>-- Pilih Metode Pembayaran</option>
                                                <option value="COD">COD</option>
                                                <option value="Transfer">Transfer</option>

                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm text-black" style="background-color: #d49701; :color : black">Checkout</button>
                                          </div>
                                    </form>




                                  </div>
                            </p>


                        </div>



                  </div>
            </div>
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Informasi Pembayaran</h2>
                <div class="p-3 p-lg-5 border">
                    <p class="text-black">
                        Untuk pembayaran transfer silahkan dapat transfer ke rekening dibawah ini sebesar
                       <strong>Rp. {{ number_format($total_harga,0,'.','.')}}</strong>
                    </p>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Bank Transfer</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">
                            <div class="media">
                                <img class="mr-3" src="{{ asset('')}}frontend/images/bri.png" alt="BRI" width="50">
                                <div class="media-body">
                                  <h5 class="mt-0 text-black" >BANK BRI</h5>
                                  <p class="text-black"> REK </p>
                                </div>
                              </div>
                              <div class="media">
                                <img class="mr-3 mt-3" src="{{ asset('')}}frontend/images/bni.png" alt="BRI" width="50">
                                <div class="media-body">
                                  <h5 class="mt-0 text-black">BANK BNI</h5>
                                  <p class="text-black"> REK </p>
                                </div>
                              </div>
                              <div class="media">
                                <img class="mr-3 mt-3" src="{{ asset('')}}frontend/images/bca.png" alt="BCA" width="50">
                                <div class="media-body">
                                  <h5 class="mt-0 text-black">BANK BCA</h5>
                                  <p class="text-black"> REK </p>
                                </div>
                              </div>
                              <div class="media">
                                <img class="mr-3 mt-3" src="{{ asset('')}}frontend/images/mandiri.png" alt="MANDIRI" width="50">
                                <div class="media-body">
                                  <h5 class="mt-0 text-black">BANK MANDIRI</h5>
                                  <p class="text-black"> REK </p>
                                </div>

                              </div>



                          </p>

                        </div>

                      </div>
                    </div>

                      </div>

                  </div>
            </div>
            {{-- <div class="col-md-6 mb-5 mb-md-0">

            </div> --}}

          </div>
          <!-- </form> -->
        </div>
      </div>
</div>
