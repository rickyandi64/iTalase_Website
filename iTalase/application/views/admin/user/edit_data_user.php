	
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4><?php echo $title?></h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url().'admin'?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $title?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                            <div class="row">
                                <div class="col-lg-9">
                                      <?php
                                        echo form_open('user/edit_data_user');
                                        ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Anda" value="<?php echo $record['email']?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Lengkap anda" value="<?php echo $record['nama_pengguna']?>">
                                                                    <?php echo form_error('name','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
                                                                
                                                            </div>
                                                        
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nama Usaha</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Masukan Nama Usaha anda" value="<?php echo $record['nama_usaha']?>">
                                                                    <?php echo form_error('nama_usaha','<small class="text-danger pl-3">','</small>')?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Role</label>
                                                                <div class="col-sm-10">
                                                                    <select class="custom-select col-12" name="role">
									<option selected="">Pilih jenis Role</option>
                                                                        <?php
                                                                        foreach ($role as $r){
                                                                            echo "<option value='$r->id'";
                                                                            echo $record['id_role'] ==$r->id?'selected':'';
                                                                            echo">$r->role</option>";
                                                                        }
                                                                        ?>
								</select>
                                                                </div>
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
                </div>
        </div>
            