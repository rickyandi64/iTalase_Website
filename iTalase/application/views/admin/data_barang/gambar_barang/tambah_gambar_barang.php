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
                                    <div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Tambah Data Gambar </h4>
							<p class="mb-30">Tambah Data Gambar <?php echo $data_barang['nama_barang']?></p>
						</div>
						
					</div>
					<?php
                                        echo form_open_multipart('barang/tambah_data_gambar_barang/' . $barang->id_barang);
                                        ?>
                                                <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->session->flashdata('messange');?>
                                </div>
                            </div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Keterangan Gambar</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="ket" placeholder="Masukan Keterangan Gambar" value="<?php set_value('ket')?>">
                                                                 <?php echo form_error('ket','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                
                                                
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        
                                                    </div>
							<div class="col-md-4">
								<div class="form-group">
									<img src="<?php echo base_url('assets/img/upload.png')?>" alt="" width="200px"  id="uploadPreview" class="img-thumbnail">
									
								</div>
							</div>
							<div class="col-md-6 col-sm-3">
								<div class="form-group">
									<label>Foto Gambar Barang</label>
									<div class="custom-file">
                                                                                <input type="file" class="custom-file-input" name="gambar" id="uploadImage"  onchange="PreviewImage();" required>
                                                                                <label class="custom-file-label">Pilih File</label>
                                                                        </div>
								</div>
							</div>
						</div>
                                                
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Gambar Barang</button>
						
					</form>
                                        <hr>
                                        <div class="row">
                                            <?php foreach ($gambar as $key => $value) {?>
                                         
                                                    <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <img src="<?php echo base_url('assets/img/gambar_barang/'.$value->gambar)?>" alt="" width="255px" style=" height: 200px;"  id="uploadPreview" class="img-thumbnail">			
                                                                <label for="">Ket : <?php echo $value->ket?></label>
                                                            </div>
                                                        <a  href="<?php echo base_url().'barang/delete_data_gambar_barang/'.$value->id_barang .'/' .$value->id_gambar?>" class="btn btn-outline-danger btn-sm btn-block"><i class="dw dw-delete-3"></i> Hapus</a>
                                                    </div>
                                            <?php } ?>
                                                </div>
                                            </div>
					</div>
				</div>
                        </div>
<script>
function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
};
};
</script>
