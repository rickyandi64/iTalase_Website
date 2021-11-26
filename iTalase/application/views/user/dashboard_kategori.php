 <main class="main">
            <div class="intro-slider-container mb-4">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "responsive": {
                            "992": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url(<?php echo base_url()?>assets/user/assets/images/demos/demo-11/slider/slide-1.jpg);">
                        <div class="container intro-content">
                            <h3 class="intro-subtitle text-primary">SEASONAL PICKS</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Get All <br>The Good Stuff</h1><!-- End .intro-title -->

                            <a href="category.html" class="btn btn-outline-primary-2">
                                <span>DISCOVER MORE</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(<?php echo base_url()?>assets/user/assets/images/demos/demo-11/slider/slide-2.jpg);">
                        <div class="container intro-content">
                            <h3 class="intro-subtitle text-primary">all at 50% off</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title text-white">The Most Beautiful <br>Novelties In Our Shop</h1><!-- End .intro-title -->

                            <a href="category.html" class="btn btn-outline-primary-2 min-width-sm">
                                <span>SHOP NOW</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="container">


                <div class="col-lg-6 mb-3 mb-lg-0">
                            <h2 class="title"><?php echo $title?></h2><!-- End .title -->
                </div>
                
                <div class="products-container" data-layout="fitRows">
                    <?php foreach ($barang as $key => $value) { ?>
                    <div class="product-item furniture col-6 col-md-4 col-lg-3">
                        <div class="product product-4">
                            <figure class="product-media">
                                <a href="<?php echo base_url('dashboard_user/detail_barang/' . $value->id_barang)?>">
                                    <img src="<?php echo base_url('assets/img/barang/') .$value->gambar;?>" alt="Product image" class="product-image" width="200px" style=" height: 300px;">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Tambah Pesanan</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="<?php echo base_url().'dashboard_user/popup_barang'?>" class="btn-product btn-quickview" title="Quick view"><span>Lihat Detail Produk</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $value->nama_kategori?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="<?php echo base_url('dashboard_user/detail_barang/' . $value->id_barang)?>"><?php echo $value->nama_barang?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                Rp. <?php echo number_format($value->harga_jual,0)?>
                                            </div><!-- End .product-price -->
                                            
                                        </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .product-item -->
                    <?php }?>

                </div><!-- End .products-container -->
            </div><!-- End .container -->

            <div class="more-container text-center mt-0 mb-7">
                <a href="<?php echo base_url()?>assets/user/category.html" class="btn btn-outline-dark-3 btn-more"><span>more products</span><i class="la la-refresh"></i></a>
            </div><!-- End .more-container -->
        </main><!-- End .main -->
