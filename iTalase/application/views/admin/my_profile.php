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
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $this->session->flashdata('message');?>
                                </div>
                            </div>
                            
                                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30" >
                                    <div class="row no-gutters">
                                      <div class="col-md-4">
                                        <img src="<?php echo base_url('assets/img/profile/').$user['image']?>" class="card-img" >
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">Nama Lengkap : <?php echo $user['nama_pengguna']?></h5>
                                          <p class="card-text">Alamat Email : <?php echo $user['email']?></p>
                                       
                                          <p class="card-text"><small class="text-muted">Member Since :<?php echo date('d F Y',$user['date_created'])?></small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                        </div>
                </div>
        </div>
            