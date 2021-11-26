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
                                        echo form_open('barang/tambah_data_supplier');
                                        ?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name_supplier" placeholder="Masukan Nama Supplier anda">
                                                                 <?php echo form_error('name_supplier','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nomor HP</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="no_hp" placeholder="Masukan Nomor HP Supplier" type="text">
                                                                 <?php echo form_error('no_hp','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="alamat" placeholder="Masukan Alamat Supplier" type="text">
                                                                 <?php echo form_error('alamat','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
                                                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control"  name="desc" placeholder="Masukan Deskripsi Supplier" type="text"></textarea>
                                                                <?php echo form_error('desc','<small class="text-danger pl-3">','</small>')?> 
							</div>
                                                         
						</div>
                                    
                                    
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Data Supplier</button>
						
					</form>
						</div>
					</div>
				</div>
                        </div>
