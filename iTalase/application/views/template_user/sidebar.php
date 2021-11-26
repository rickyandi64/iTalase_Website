<body class="animsition">
	
	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="<?php echo base_url()?>assets/login/vendors/images/logo1.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?php echo base_url().'Dashboard_User'?>">Home</a>
								<ul class="sub-menu">
									
								</ul>
							</li>
                                                         <?php $kategori = $this->Model_Pengguna->tampilkan_data_kategori();?>
                                                        <li class="menu">
								<a href="<?php echo base_url().'Dashboard_User'?>">Kategori</a>
								<ul class="sub-menu">
									<?php foreach ($kategori as $key => $value){?>
                                                                            <li><a href="<?php echo base_url('dashboard_user/tampilkan_kategori_barang/'.$value->id_kategori)?>"><?php echo $value->nama_kategori?></a></li>
                                                                         <?php } ?> 
								</ul>
                                                                <span class="arrow-main-menu-m">
                                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </span>
							</li>
							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<img class="rounded-circle z-depth-2" src="<?php echo base_url('assets/img/profile/').$user['image']?>" alt="" width="40px">
							</div>
						</div>
						<?php
                                                    $keranjang  = $this->cart->contents();
                                                    $jml_item = 0;
                                                    foreach ($keranjang as $key => $value){
                                                        $jml_item = $jml_item + $value['qty'];
                                                    }
                                                ?>	
						<div class="flex-c-m h-full p-l-18 p-r-25 bor5">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $jml_item?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
							
						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?php echo base_url().'Dashboard_User'?>"><img src="<?php echo base_url()?>assets/user/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>
                              
                            
				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $jml_item?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="<?php echo base_url().'Dashboard_User'?>">Home</a>
					<ul class="sub-menu-m">
						
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

                                <?php $kategori = $this->Model_Pengguna->tampilkan_data_kategori();?>
                                                        <li class="menu">
								<a href="<?php echo base_url().'Dashboard_User'?>">Kategori</a>
								<ul class="sub-menu">
									<?php foreach ($kategori as $key => $value){?>
                                                                            <li><a href="<?php echo base_url('dashboard_user/tampilkan_kategori_barang/'.$value->id_kategori)?>"><?php echo $value->nama_kategori?></a></li>
                                                                         <?php } ?> 
								</ul>
                                                                <span class="arrow-main-menu-m">
                                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                                </span>
							</li>
				
			</ul>
		</div>

		<!-- Modal Search -->
		
	</header>

	<!-- Sidebar -->



	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Daftar Belanja
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
                                    <?php
                                    if(empty($keranjang)){
                                    ?>
                                   <div class="header-cart-total w-full p-tb-40">
						<p>	Keranjang Belanja Anda Kosong</p>
					</div>
                                    
							
                                    <?php }else{ 
                                    foreach ($keranjang as $key => $value){ 
                                        $foto_barang = $this->model_pengguna->tampilkan_detail_barang($value['id']);
                                        ?>
                                    
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/img/barang/'.$foto_barang->gambar)?>" alt="IMG" height="80px">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $value['name']?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $value['qty']?> x Rp. <?php echo number_format($value['price'],0)?>
							</span>
                                                        <span class="header-cart-item-info">
								Rp. <?php echo number_format($value['subtotal'],0)?>
							</span>
                                                </div>
					</li>
                                        <?php }?> 
                               <div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: Rp. <?php echo $this->cart->format_number($this->cart->total(),0);?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?php echo base_url('dashboard_user/tampilkan_belanja')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="<?php echo base_url('dashboard_user/check_out_belanja')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
                                    <?php }?>
                                       
				</ul>
				
				
			</div>
		</div>
	</div>
