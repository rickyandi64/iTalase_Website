<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><?php echo $title?></h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url().'akuntan'?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $title?></li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>				
                                <div class="pd-20 card-box mb-30">
                                    <?php
                                        echo form_open('admin/lihat_data_setting');
                                    ?>
                                    <?php echo $this->session->flashdata('messange');?>
                                            <div class="row">
                                                
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Provinsi</label>
									<select name="provinsi" class="form-control">
                                                                            
                                                                        </select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Kota</label>
									<select name="kota" class="form-control">
                                                                            <option value="<?php echo $setting->lokasi?>"><?php echo $setting->lokasi?></option>
                                                                        </select>
								</div>
							</div>
						</div>
                                                <div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Nama Toko</label>
									<input name="nama_toko" type="text" class="form-control" placeholder="Masukan Nama Toko" value="<?php echo $setting->nama_toko?>">
                                                                        <?php echo form_error('nama_toko','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>No Telepon</label>
									<input name="no_telepon" type="text" class="form-control" placeholder="Masukan No Telepon" value="<?php echo $setting->no_telepon?>">
                                                                        <?php echo form_error('no_telepon','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
							</div>
                                                    
                                                        
						</div>
                                    
                                                <div class="form-group">
                                                    <label>Alamat Toko</label>
                                                    <input name="alamat_toko" type="text" class="form-control" placeholder="Masukan Alamat Toko" value="<?php echo $setting->alamat_toko?>">
                                                    <?php echo form_error('alamat_toko','<small class="text-danger pl-3">','</small>')?>
                                                </div>
                                                <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </div>
                                </form>
                                </div>
                        </div>
                </div>
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
   });
</script>