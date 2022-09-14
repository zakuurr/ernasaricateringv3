<div>
    <main id="main" class="main-site">

		<div class="container">
			<div class="main-content-area">
                <form wire:submit.prevent="placeOrder">
				<div class="wrap-address-billing">
					<h3 class="box-title">Alamat Penagihan</h3>

						<p class="row-in-form">
							<label for="nama_lengkap">Nama Lengkap<span>*</span></label>
							<input id="nama_lengkap" type="text" wire:model="nama_lengkap" placeholder="Masukan Nama Lengkap">
						</p>
						<p class="row-in-form pl-3">
							<label for="email">Email Addreess:</label>
							<input id="email" type="email" wire:model="email" placeholder="Masukan Email">
						</p>
						<p class="row-in-form">
							<label for="nohp">No Handphone<span>*</span></label>
							<input id="nohp" type="text" wire:model="nohp" placeholder="Masukan No Telepon">
						</p>
						<p class="row-in-form pl-3">
							<label for="add">Alamat:</label>
							<textarea wire:model="alamat" id="" class="form-control"></textarea>
						</p>


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
                                @if($shipping and $pembayaran === 'COD')
                                <span class="grand-total-price">Rp. {{ number_format($totalCartWithoutTax,0,'.','.')}}</span></p>
                                @else
                                <span class="grand-total-price">Rp.{{number_format((float)Session::get('checkout')['total'],3,'.','.')}}</span></p>
                                @endif
                            @endif
                            <button type="submit" class="btn btn-checkout text-black" style="background-color: #d49701; :color : black">Lakukan Pesanan Sekarang</button>
					</div>
                    @if($pembayaran === 'COD')
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Metode Pengiriman</h4>
						<select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="shipping" id="">
                            <option value="0" selected="selected">Pilih Pengiriman</option>
                            <option value="10000">Regular Pengiriman (Rp.10.000)</option>
                    </select>
						<h4 class="title-box"><span class="title">Regular Pengiriman : Rp. {{number_format($shipping,0,'.','.')}}</span></h4>
					</div>
                    @elseif($pembayaran === 'Transfer')
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Informasi Rekening</h4>
                        <div class="media">
                            <img class="mr-3" src="{{ url('frontend/images/bri.png') }}" alt="Bank BRI" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">BANK BRI</h5>
                                No. Rekening xxx atas nama <strong>xxx</strong>
                            </div>
                        </div>
					</div>

                    @endif

				</div>
                </form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>
