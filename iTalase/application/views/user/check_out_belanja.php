 <div class="card col-lg-10 mx-auto mt-3 mb-3 p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="zmdi zmdi-shopping-cart"></i> Check Out Belanja.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                      <th style="text-align:center">Qty</th>
                      <th style="text-align:center">Barang</th>
                      <th style="text-align:center">Harga</th>
                      <th style="text-align:center">Total Harga</th>
                      <th style="text-align:center">Berat</th>
                    </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>

                           <?php 
                             $total_berat = 0;
                             foreach ($this->cart->contents() as $items){ 
                             $barang = $this->model_pengguna->tampilkan_detail_barang($items['id']);
                             $berat  = $items['qty'] * $barang->berat;
                             $total_berat  = $total_berat + $berat;
                            ?>

                    <tr>
                      <td style="text-align:center"><?php echo $items['qty']; ?></td>
                      <td style="text-align:center"><?php echo $items['name']; ?></td>
                      <td style="text-align:center">Rp. <?php echo number_format($items['price'],0); ?></td>
                      <td style="text-align:center">Rp. <?php echo number_format($items['subtotal'],0); ?></td>
                      <td style="text-align:center"><?php echo $berat?> Gr</td>
                    
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
               
                <div class="col-sm-8 invoice-col">
                  Tujuan :
                  
                  <div class="row">
                      <div class="col-sm-6 mt-3">
                          <div class="form-group">
				<label>Provinsi</label>
				<select name="provinsi" class="form-control"></select>
			</div>
                      </div>
                      <div class="col-sm-6 mt-3">
                          <div class="form-group">
                                <label>Kota</label>
                                    <select name="kota" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-6 mt-3">
                          <div class="form-group">
                                <label>Expedisi</label>
                                    <select name="ekspedisi" class="form-control"></select>
                          </div>
                      </div>
                      <div class="col-sm-6 mt-3">
                          <div class="form-group">
                                <label>Paket</label>
                                    <select name="paket" class="form-control"></select>
                          </div>
                      </div>
                       <div class="col-sm-12 mt-3">
                          <div class="form-group">
                                <label>Alamat</label>
                                    <input name="alamat" class="form-control">
                          </div>
                      </div>
                  </div>
                </div>
                
                <!-- /.col -->
                <div class="col-sm-4">
               
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. <?php echo number_format($this->cart->total(),0); ?></td>
                      </tr>
                      <tr>
                        <th>Total Berat :</th>
                        <td><?php echo $total_berat?> Kg</td>
                      </tr>
                      <tr>
                        <th>Ongkir : </th>
                        <td><label id="ongkir"></label></td>
                      </tr>
                      <tr>
                        <th>Total Bayar :</th>
                        <td><label id="total_bayar"></label></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url('dashboard_user/tampilkan_belanja')?>" class="btn btn-info" rel="noopener" class="btn btn-default"><i class="zmdi zmdi-arrow-left"></i> Kembali</a>
                  
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="zmdi zmdi-shopping-cart"></i> Check Out
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
   $(document).ready(function(){
      $.ajax({
        type: "POST",
        url : "<?php echo base_url('rajaongkir/provinsi')?>",
        success: function(hasil_provinsi){
            //console.log(hasil_provinsi);
            $("select[name=provinsi]").html(hasil_provinsi);
        }
      });
      
      $("select[name=provinsi]").on("change",function(){
          var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
          
          $.ajax({
              type: "POST",
              url :"<?php echo base_url('rajaongkir/kota')?>",
              data: 'id_provinsi=' + id_provinsi_terpilih,
              success : function(hasil_kota){
                  $("select[name=kota]").html(hasil_kota);
              }
          });
      });
      
      $("select[name=kota]").on("change",function(){
        $.ajax({
              type: "POST",
              url :"<?php echo base_url('rajaongkir/ekspedisi')?>",
             
              success : function(hasil_ekspedisi){
                  $("select[name=ekspedisi]").html(hasil_ekspedisi);
              }
       });
    });
    $("select[name=ekspedisi]").on("change",function(){
        var ekspedisi_terpilih = $("select[name=ekspedisi]").val()
        
        var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota')
       
        var total_berat = <?php echo $total_berat?>;

        $.ajax({
              type: "POST",
              url :"<?php echo base_url('rajaongkir/paket')?>",
              data : 'ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat, 
              success : function(hasil_paket){
                 
                 $("select[name=paket]").html(hasil_paket);
              }
       });
    });
    $("select[name=paket]").on("change",function(){
    //menampilkan ongkir
     var dataongkir = $("option:selected", this).attr('ongkir');
     $("#ongkir").html("Rp. " + new Intl.NumberFormat('de-DE').format(dataongkir))
     
     //menampilkan total harga
     var ongkir = $("option:selected", this).attr('ongkir');
     var total_bayar = parseInt(ongkir) + parseInt (<?php echo $this->cart->total()?>)
     $('#total_bayar').html("Rp. " + new Intl.NumberFormat('de-DE').format(total_bayar))
        });
   });
</script>