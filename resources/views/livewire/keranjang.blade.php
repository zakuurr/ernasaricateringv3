<div>
    <main id="main" class="main-site">

		<div class="container">
			<div class="main-content-area">
             @if(Cart::instance('cart')->count() > 0)
				<div class="wrap-iten-in-cart">
                    @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{Session::get('success_message')}}

                    </div>
                    @endif
                    {{-- @if(Cart::instance('cart')->count() > 0) --}}
					<h3 class="box-title">Nama Menu</h3>
					<ul class="products-cart">
                        @foreach(Cart::instance('cart')->content() as $item)
						<li class="pr-cart-item">
							<div class="product-image">
								<figure><img src="{{asset('storage/fotomenu/'. $item->model->foto)}}" alt="" class="img-fluid"></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="#">{{$item->model->nama_menu}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">Rp. {{number_format($item->model->harga,0,'.','.')}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
									<a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">Rp. {{number_format($item->subtotal,0,'.','.')}}</p></div>
							<div class="delete">
								<a href="#" class="btn btn-delete" title="" wire:click.prevent="destroy('{{$item->rowId}}')">
									<span>Hapus</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
						</li>
                        @endforeach
					</ul>
                    {{-- @else
                    <p>Tidak ada pesanan</p>
                    @endif --}}
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">RINGKASAN PESANAN</h4>
                        <label for="" class="summary-info inline-block mb-3 text-sm uppercase font-medium">Metode Pembayaran</label>
                        <select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="pembayaran" id="">
                                <option value="0" selected="selected">Pilih Metode Pembayaran</option>
                                <option value="Transfer">Transfer</option>
                                <option value="COD">COD</option>
                        </select>
                        <br>
                        @if($pembayaran === 'COD')
						<label for="" class="summary-info inline-block mb-3 text-sm uppercase font-medium">Metode Pengiriman</label>
                        <select class="title index float-right inline-block block text-gray-600 w-full text-sm form-control" wire:model="shipping" id="">
                                <option value="0" selected="selected">Pilih Pengiriman</option>
                                <option value="10000">Regular Pengiriman (Rp.10.000)</option>
                        </select>
                        @endif
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">Rp. {{ Cart::subtotal(0,'.','.')}}</b></p>
						@if($shipping and $pembayaran === 'COD')
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Rp. {{number_format($shipping,0,'.','.')}}</b></p>
						@endif
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">
                            @if($shipping and $pembayaran === 'COD')
                            Rp. {{ number_format($totalCartWithoutTax,0,'.','.')}}
                            @else
                            Rp. {{ Cart::total(0,'.','.') }}
                            @endif
                        </b></p>
					</div>
					<div class="checkout-info">
						<a class="btn btn-checkout text-black" wire:click.prevent="checkout" style="background-color: #d49701; :color : black">Check out</a>
						<a class="link-to-shop" href="{{route('list-menu')}}">Lanjutkan Belanja<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a  wire:click.prevent="destroyAll()" class="btn btn-sm text-black" style="background-color: #d49701; :color : black">Kosongkan Keranjang</a>
						<a class="btn btn-sm text-black" style="background-color: #d49701; :color : black">Update Shopping Cart</a>
					</div>
				</div>
            @else
            <div class="text-center" style="padding: 30px 0;">
                    <h1> Keranjang Kosong</h1>
            </div>
            @endif
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>
