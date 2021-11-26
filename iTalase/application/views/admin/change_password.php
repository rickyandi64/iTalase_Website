	
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
									<li class="breadcrumb-item"><a href="<?php echo base_url().'akuntan'?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $title?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                            <div class="row">
                                            <div class="col-lg-6">
                                                <?php echo $this->session->flashdata('message');?>
                                            </div>
                                        </div>
                            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                                <div class="row">
                                    <div class="col-lg-8">
                                        
                                                    <form action="<?php echo base_url('admin/ganti_password');?>" method="post">
                                                        <div class="form-group">
                                                            <label for="password_lama">Password Lama</label>
                                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                                            <?php echo form_error('current_password','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_bar">Password Baru</label>
                                                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                            <?php echo form_error('new_password1','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_lama">Ulangi Password Baru</label>
                                                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                            <?php echo form_error('new_password2','<small class="text-danger pl-3">','</small>')?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success">Ganti Password</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </div>
</div>
                         