<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>		
<div class="container">
			<div class="row mt-3">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
                                                    <?php echo form_open('dashboard_user/update_belanja'); ?>

                                                            <table class="table table-hover">

                                                            <thead>
                                                                    <th scope="col" width="100px">Jumlah Barang</th>
                                                                    <th scope="col">Nama Barang</th>
                                                                    <th scope="col">Harga Barang</th>
                                                                    <th scope="col">Sub-Total</th>
                                                                    <th scope="col">Berat</th>
                                                                    <th scope="col">Action</th>
                                                            </thead>

                                                            <?php $i = 1; ?>

                                                            <?php 
                                                            $total_berat = 0;
                                                            foreach ($this->cart->contents() as $items){ 
                                                                 $barang = $this->model_pengguna->tampilkan_detail_barang($items['id']);
                                                                 $berat  = $items['qty'] * $barang->berat;
                                                                 $total_berat  = $total_berat + $berat;
                                                                ?>


                                                                    <tr class="table_row">
                                                                            <td>
                                                                                <div class="wrap-num-product flex-w  m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<?php echo form_input(array(
                                                                                            'name' => $i.'[qty]', 
                                                                                            'value' => $items['qty'],
                                                                                            'class' =>'mtext-104 cl3 txt-center num-product', 
                                                                                            'maxlength' => '3', 
                                                                                            'size' => '5',
                                                                                            'min' => '0'
                                                                                            )); 
                                                                                        ?>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                    <?php echo $items['name']; ?>

                                                                                  
                                                                            </td>
                                                                            <td style="text-align:center">Rp. <?php echo number_format($items['price'],0); ?></td>
                                                                            <td style="text-align:center">Rp. <?php echo number_format($items['subtotal'],0); ?></td>
                                                                            <td style="text-align:center"><?php echo $berat?> Gr</td>
                                                                            <td style="text-align:center"><a href="<?php echo base_url('dashboard_user/hapus_belanja/'. $items['rowid'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                                                    </tr>

                                                            <?php $i++; ?>

                                                            <?php } ?>

                                                            <tr class="table_row">
                                                                    <td colspan="3"> </td>
                                                                    
                                                                    <td class="right" colspan="2" style="text-align:right"><strong>Total Berat  </strong></td>
                                                                    <td class="right" style="text-align:right"><strong><?php echo $total_berat?> Gr</strong></td>
                                                            </tr>
                                                            <tr class="table_row">
                                                                    <td colspan="3"> </td>
                                                                    
                                                                    <td class="right" style="text-align:right"><strong>Total</strong></td>
                                                                    <td class="right" style="text-align:right" colspan="2"><strong>Rp. <?php echo number_format($this->cart->total(),0); ?></strong></td>
                                                            </tr>

                                                            </table>
                                                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								
									
								<button type="submit" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Update Cart
								</button>
							</div>

                                                            <a href="<?php echo base_url('dashboard_user/clear_belanja')?>" class="ml-3 flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Batal Belanja
                                                            </a>
                                                        <a href="<?php echo base_url('dashboard_user/check_out_belanja')?>" class="ml-3 flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Check Out
                                                            </a>
						</div>

                                                            
                                                            
                                                            <?php echo form_close()?>
						</div>

						
					</div>
				</div>
                        </div>
                </div>