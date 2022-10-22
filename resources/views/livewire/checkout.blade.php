<div>
    <main id="main" class="main-site">

		<div class="container">
			<div class="main-content-area">
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
                        <div class="col-md-6">
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
                                    {{-- <div id="pesan">


                                            <form>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="start" placeholder="Jl. Mayjend Ahmad Yani" required>
                                                    <label for="floatingLokasi">Lokasi</label>
                                                  </div>


                                                <div class="form-group">
                                                    <!-- <label>Masukkan Lokasi Tujuan</label> -->
                                                    <input type="hidden" class="form-control" id="end" placeholder="Jl. Semarang" required value="Erna Sari Catering, Waluya, Bandung Regency, West Java, Indonesia">
                                                </div>
                                                <input type="submit" class="btn btn-success mb-3" id="pesan-btn" value="Cek Ongkir">
                                            </form>

                                            <div id="detail">
                                                <hr />
                                                <h4>Detail Pesanan</h4>
                                                Jarak : <p id="distance"></p>
                                                Duration : <p id="duration"></p>
                                                Ongkir : <p id="price"></p>

                                            </div>

                                    </div> --}}

                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div id="map"></div>
                        </div> --}}
                    </div>


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

                            @if(Session::has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span>
                                @if($shipping and $pembayaran === 'Transfer')

                                <span class="grand-total-price">Rp. {{ number_format($totalCartWithoutTax,0,'.','.')}}</span></p>
                                @else
                                <span class="grand-total-price">Rp.{{number_format((float)Session::get('checkout')['total'],3,'.','.')}}</span></p>
                                @endif
                            @endif
                            <button type="submit" class="btn btn-checkout text-black" style="background-color: #d49701; :color : black">Lakukan Pesanan Sekarang</button>
					</div>
                    @if($pembayaran === 'COD')
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Informasi Rekening</h4>
                        <div class="media">
                            <img class="mr-3" src="{{ url('frontend/images/bri.png') }}" alt="Bank BRI" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">BANK BRI</h5>
                                No. Rekening xxx atas nama <strong>xxx</strong>
                            </div>
                        </div>
                        <h4 class="title-box f-title mt-3">Alamat Lengkap</h4>
                        <input type="text" class="form-control" id="floatingNama alamat" wire:model="alamat" placeholder="Masukan Alamat Lengkap">

					</div>


                    @elseif($pembayaran === 'Transfer')
                    <div class="summary-item shipping-method">
						<h4 class="title-box f-title">Metode Pengiriman</h4>
						<select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="shipping" id="">
                            <option value="0" selected="selected">Pilih Pengiriman</option>
                            <option value="{{$ongkir[0]['harga_ongkir']}}">Rp {{$ongkir[0]['harga_ongkir']}}</p></option>
                    </select>
						<h4 class="title-box"><span class="title">Regular Pengiriman : Rp. {{number_format($shipping,0,'.','.')}}</span></h4>

                        <h4 class="title-box f-title mt-3">Alamat Lengkap</h4>
                        <input type="text" class="form-control" id="floatingNama alamat" wire:model="alamat" placeholder="Masukan Alamat Lengkap">
					</div>

                    @endif

				</div>
                </form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>
