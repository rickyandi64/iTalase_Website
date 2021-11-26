<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="<?php echo base_url()?>assets/home/assets/images/logo-v4.png" height="41px" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="<?php echo base_url().'auth/login'?>">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?php echo base_url()?>assets/login/vendors/images/register.png" alt="" height="471">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Register iTalase</h2>
						</div>
						<form method="post" action="<?php echo base_url('auth/register')?>">
							<div class="input-group custom">
								<input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Masukan Nama Lengkap Anda" value="<?php echo set_value('name');?>">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>  
							</div>
                                                                <center><small class="text-danger"><?php echo form_error('name')?></small></center>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                                                                <center><small class="text-danger"><?php echo form_error('email')?></small></center>
                                                        
							<div class="input-group custom">
								<input type="password" id="password1" name="password1" class="form-control form-control-lg" placeholder="Masukan Password Anda">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
                                                                <center><small class="text-danger"><?php echo form_error('password1')?></small></center>
                                                        <div class="input-group custom">
								<input type="password" name="password2" name="password2" class="form-control form-control-lg" placeholder="Masukan Password Anda">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
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
										<button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Daftar</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Atau</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo base_url().'auth'?>">Kembali ke Dashboard</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>