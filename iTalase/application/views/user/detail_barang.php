<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				Barang
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $barang->nama_barang?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo base_url('assets/img/barang/' .$barang->gambar)?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo base_url('assets/img/barang/' .$barang->gambar)?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/img/barang/' .$barang->gambar)?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                                            <?php foreach ($gambar as $key => $value) {?>

								<div class="item-slick3" data-thumb="<?php echo base_url('assets/img/gambar_barang/' .$value->gambar)?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo base_url('assets/img/gambar_barang/' .$value->gambar)?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url('assets/img/gambar_barang/' .$value->gambar)?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                                            
                                                            <?php }?>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $barang->nama_barang?>
						</h4>

						<span class="mtext-106 cl2">
                                                    Rp. <?php echo number_format($barang->harga_jual,0)?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $barang->deskripsi?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
							
                                                    <?php
                                                    echo form_open('dashboard_user/tambah_belanja');
                                                    echo form_hidden('id',$barang->id_barang);
                                                    
                                                    echo form_hidden('price',$barang->harga_jual);
                                                    echo form_hidden('name',$barang->nama_barang);
                                                    echo form_hidden('redirect_page',  str_replace('index.php/','', current_url()));
                                                    ?>
							

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
                                                                   
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1" min="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
                                                                    

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>	
                                                    <?php
                                                    form_close();
                                                    ?>
						</div>

						<!--  -->
						
					</div>
				</div>
			</div>


		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			
			<span class="stext-107 cl6 p-lr-25">
				Kategori Barang: <?php echo $barang->nama_kategori?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "Berhasil di Tambahkan!", "success");
			});
		});
	
	</script>        