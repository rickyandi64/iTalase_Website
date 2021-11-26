<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="<?php echo base_url()?>assets/home/assets/images/logo-v4.png" height="41px" alt="">
				</a>
			</div>
			
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?php echo base_url()?>assets/login/src/images/forgot_password1.png" alt="" height="300">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Ganti Password iTalase</h2>
                                                        <h5 class="text-center"><?php echo $this->session->userdata('reset_email');?></h5>
						</div>
                                            <?php echo $this->session->flashdata('messange');?>
						<form method="POST" sction="<?php echo base_url('auth/change_password')?>">
							
							<div class="input-group custom">
								<input type="password" id="password1" name="password1" class="form-control form-control-lg" placeholder="Masukan Password Baru Anda">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                                                    <center><small class="text-danger"><?php echo form_error('password1')?></small></center>
							<div class="input-group custom">
								<input type="password" id="password2" name="password2" class="form-control form-control-lg" placeholder="Ulangi Password Baru Anda">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                                                    <center><small class="text-danger"><?php echo form_error('password2')?></small></center>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button type="submit" class="btn btn-primary btn-lg btn-block">Ganti Password</button>
									</div>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>