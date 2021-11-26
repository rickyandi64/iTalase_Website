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
                                        echo form_open('barang/edit_data_kategori');
                                        ?>
                                    <input type="hidden" value="<?php echo $record['id_kategori']?>" name="id_kategori">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Kategori</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" value="<?php echo $record['nama_kategori']?> <?php echo set_value('name_supplier');?>" name="name_kategori" placeholder="Masukan Nama Kategori Barang">
                                                                 <?php echo form_error('name_kategori','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        
						</div>
						
                                    
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Data Kategori</button>
						
					</form>
						</div>
					</div>
				</div>
                        </div>
