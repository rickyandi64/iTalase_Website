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
                                        echo form_open_multipart('barang/edit_data_barang');
                                        ?>
                                    <input class="form-control" type="hidden" name="id_barang" placeholder="Masukan Nama Barang" value="<?php echo $record['id_barang']?>">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="nama_barang" placeholder="Masukan Nama Barang" value="<?php echo $record['nama_barang']?>">
                                                                 <?php echo form_error('name_barang','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jenis Kategori Barang</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="nama_kategori">
									<option selected="">Pilih Kategori Barang</option>
									<?php
                                                                        foreach ($kategori as $k){
                                                                            echo "<option value='$k->id_kategori'";
                                                                            echo $record['id_kategori'] ==$k->id_kategori?'selected':'';
                                                                            echo">$k->nama_kategori</option>";
                                                                            
                                                                        }
                                                                        ?>
								</select>
							</div>
						</div>
<!---						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Supplier Barang</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="nama_supplier">
									<option selected="">Pilih Supplier Barang</option>
									<?php
//                                                                        foreach ($supplier as $s){
//                                                                            echo "<option value='$s->id_supplier'";
//                                                                            echo $record['id_supplier'] ==$s->id_supplier?'selected':'';
//                                                                            echo">$s->name</option>";
//                                                                        }
                                                                        ?>
                                                                        
								</select>
							</div>
						</div> -->
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Harga Jual</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="harga_jual" placeholder="Masukan Harga Jual Barang" value="<?php echo $record['harga_jual']?>">
                                                                 <?php echo form_error('harga_jual','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Harga Modal</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="harga_modal" placeholder="Masukan Harga Modal Jual Barang" value="<?php echo $record['harga_modal']?>">
                                                                 <?php echo form_error('harga_modal','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Berat</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="berat" placeholder="Masukan Berat Barang (Gram)" value="<?php echo $record['berat']?>">
                                                                 <?php echo form_error('berat','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" type="text" name="desc" placeholder="Masukan Deskripsi Barang" value="<?php echo $record['deskripsi']?>">
                                                                 <?php echo form_error('desc','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                 <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jumlah Stok</label>
							<div class="col-sm-12 col-md-10">
                                                            <input type="number" class="form-control" type="text" name="jumlah_stok" placeholder="Masukan Jumlah Stok Barang" value="<?php echo $record['jumlah_stok']?>">
                                                                 <?php echo form_error('jumlah_stok','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        
                                                    </div>
							<div class="col-md-4">
								<div class="form-group">
									<img src="<?php echo base_url('assets/img/barang/') .$record['gambar'];?>" alt="" width="250px"  id="uploadPreview" class="img-thumbnail">
									
								</div>
							</div>
							<div class="col-md-6 col-sm-3">
								<div class="form-group">
									<label>Foto Gambar Produk</label>
									<div class="custom-file">
                                                                                <input type="file" class="custom-file-input" name="gambar" id="uploadImage"  onchange="PreviewImage();" value="<?php echo $record['gambar']?>">
                                                                                <label class="custom-file-label">Pilih File</label>
                                                                        </div>
								</div>
							</div>
						</div>
                                                
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Data Barang</button>
						
					</form>
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
