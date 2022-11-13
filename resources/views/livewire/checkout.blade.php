<div>
    <main id="main" class="main-site">

		<div class="container">
			<div class="main-content-area">
                <form wire:submit.prevent="placeOrder" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-address-billing" style="width: 100%">
                                <h3 class="box-title">Alamat Penagihan</h3>

                                <div class="form-floating mb-3">

                                    <input type="text" class="form-control" id="floatingNama nama_lengkap" wire:model="nama_lengkap" placeholder="Masukan Nama Lengkap">
                                    <label for="floatingNama">Nama Lengkap</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input id="email floatingEmail" class="form-control" type="email" wire:model="email" placeholder="Masukan Email">
                                    <label for="floatingEmail">Email</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input id="nohp floatingNoHp" type="text" class="form-control" wire:model="nohp" placeholder="Masukan No Telepon">
                                    <label for="floatingNoHp">No Telepon</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <textarea id="alamat floatingAlamat"class="form-control" wire:model="alamat" placeholder="Masukan Alamat"></textarea>
                                    <label for="floatingAlamat">Alamat Lengkap</label>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingNama alamat" wire:model="alamat" placeholder="Masukan Alamat Lengkap">
                                    <label for="floatingNoHp">Alamat Lengkap</label>
                                  </div>


                            </div>
                        </div>
                    </div> --}}
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">

                            <h4 class="title-box">Metode Pembayaran</h4>
                            <div class="choose-payment-methods">
                                <label class="payment-method">

                                    <select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="pembayaran" id="">
                                            <option value="0" selected="selected">Pilih Metode Pembayaran</option>
                                            <option value="Transfer">Transfer</option>
                                            <option value="COD">COD</option>
                                    </select>

                            </div>

                            <p class="summary-info grand-total"><span>Catatan Pesanan</span>

                                <textarea wire:model="catatan" id="" class="form-control"></textarea> </p>


                        </div>
                        @if($pembayaran === 'COD')
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Informasi Rekening</h4>
                            @foreach($bank as $b)
                            <div class="media">
                                <img class="mr-3" src="{{asset('storage/fotobank/'. $b->foto)}}" alt="Bank BRI" width="60">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$b->nama_bank}}</h5>
                                    {{$b->label}} {{$b->no_rekening}} atas nama <strong>{{$b->atas_nama}}</strong>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="media">
                                <img class="mr-3" src="{{ url('frontend/images/bjb.png') }}" alt="Bank BRI" width="60">
                                <div class="media-body">
                                    <h5 class="mt-0">BANK BJB</h5>
                                    No. Rekening 0102214471100 atas nama <strong>Wita Lelasari</strong>
                                </div>
                            </div>
                            <div class="media">
                                <img class="mr-3" src="{{ url('frontend/images/dana.png') }}" alt="Bank BRI" width="60">
                                <div class="media-body">
                                    <h5 class="mt-0">DANA</h5>
                                    No. Telepon 081289464544 atas nama <strong>Wita Lelasari</strong>
                                </div>
                            </div> --}}

                        </div>


                        @elseif($pembayaran === 'Transfer')
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Metode Pengiriman</h4>

                            <select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="shipping" id="">
                                <option value="0" selected="selected">Pilih Pengiriman</option>


                                @if($a['jarak'] === '10')
                                    <option value="{{$ongkir[0]['harga_ongkir']}}">Reguler Pengiriman Rp {{$ongkir[0]['harga_ongkir']}}</p></option>
                                @else
                                    <option value="{{$ongkir[1]['harga_ongkir']}}"> Reguler Pengiriman Rp {{$ongkir[1]['harga_ongkir']}}</p></option>
                                @endif

                            </select>
                            <h4 class="title-box"><span class="title">Ongkir : Rp. {{number_format($shipping,0,'.','.')}}</span></h4>
                            @foreach($bank as $b)
                            <div class="media">
                                <img class="mr-3" src="{{asset('storage/fotobank/'. $b->foto)}}" alt="Bank BRI" width="60">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$b->nama_bank}}</h5>
                                    {{$b->label}} {{$b->no_rekening}} atas nama <strong>{{$b->atas_nama}}</strong>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @endif

                    </div>
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            @if(Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Total Bayar</span>
                                    @if($shipping and $pembayaran === 'Transfer')

                                    <span class="grand-total-price">Rp. {{ number_format($totalCartWithoutTax,0,'.','.')}}</span></p>
                                    @else
                                    <span class="grand-total-price">Rp.{{number_format((float)Session::get('checkout')['total'],3,'.','.')}}</span></p>
                                    @endif
                                @endif
                                @if($pembayaran === 'Transfer')
                                <h4 class="title-box f-title mb-3">Upload Bukti Pembayaran</h4>
                                <input type="file" class="form-control" wire:model="newImage"/>
@endif
                                <button type="submit" class="btn btn-checkout text-black mt-4" style="background-color: #d49701; :color : black">Lakukan Pesanan Sekarang</button>
                        </div>

                    </div>


                </form>


			</div><!--end main content area-->
		</div><!--end container-->

	</main>

</div>

