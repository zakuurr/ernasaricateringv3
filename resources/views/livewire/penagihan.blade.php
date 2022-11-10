<div>
    <main id="main" class="main-site">

		<div class="container">
			<div class="main-content-area">
                <form wire:submit.prevent="placeOrder">
                    <div class="row">
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
                                    <input type="text" class="form-control" id="floatingNama alamat" wire:model="alamat" placeholder="Masukan Alamat Lengkap">
                                    <label for="floatingNoHp">Alamat Lengkap</label>
                                  </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-checkout text-black" style="background-color: #d49701; :color : black">Selanjutnya</button>

                </form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>

</div>

