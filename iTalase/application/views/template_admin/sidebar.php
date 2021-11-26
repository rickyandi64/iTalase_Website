<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?php echo base_url()?>assets/login/vendors/images/logo1.png" width="300px" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>

		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo base_url('assets/img/profile/').$user['image']?>" alt="">
						</span>
						<span class="user-name"><?php echo $user['nama_pengguna']?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?php echo base_url().'admin/my_profile'?>"><i class="dw dw-user1"></i>Profile Saya</a>
						
						<a class="dropdown-item" href="<?php echo base_url().'auth/logout'?>"><i class="dw dw-logout"></i>Keluar</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo base_url().'admin'?>">
				<img src="<?php echo base_url()?>assets/login/vendors/images/logo1.png" alt="" class="dark-logo">
				<img src="<?php echo base_url()?>assets/login/vendors/images/logo1.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
            


            
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="<?php echo base_url().'admin'?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
						</a>
						
					</li>
                                        
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shopping-cart-1"></span><span class="mtext">Data Barang</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url().'barang/lihat_data_kategori'?>">Kategori</a></li>
<!---							<li><a href="<?php //echo base_url().'barang/lihat_data_supplier'?>">Supplier</a></li> -->
                                                        <li><a href="<?php echo base_url().'barang/lihat_data_barang'?>">Barang</a></li>
                                                        <li><a href="<?php echo base_url().'barang/lihat_data_gambar_barang'?>">Gambar Barang</a></li>
                                                        <li><a href="<?php echo base_url().'barang/lihat_data_brand_barang'?>">Brand Barang</a></li>
						</ul>
					</li>
                                        
					
                                        <li class="dropdown">
						<a href="<?php echo base_url().'user/lihat_data_user'?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Pengguna</span>
						</a>
						
					</li>
                                        <li class="dropdown">
						<a href="<?php echo base_url().'admin/lihat_data_setting'?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Setting Toko</span>
						</a>
						
					</li>
                                         <li class="dropdown">
                                                        <a href="<?php echo base_url().'admin/my_profile'?>" class="dropdown-toggle no-arrow">  
                                                        <div class="sidebar-heading">
                                                            <span class="micon dw dw-user-1"></span><span class="mtext">Profile Saya</span>
                                                        </div>
                                                        </a>

                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="<?php echo base_url().'admin/edit_profile'?>" class="dropdown-toggle no-arrow">  
                                                        <div class="sidebar-heading">
                                                            <span class="micon dw dw-edit-1"></span><span class="mtext">Edit Profile</span>
                                                        </div>
                                                        </a>

                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="<?php echo base_url().'admin/ganti_password'?>" class="dropdown-toggle no-arrow">  
                                                        <div class="sidebar-heading">
                                                            <span class="micon dw dw-key1"></span><span class="mtext">Ganti Password</span>
                                                        </div>
                                                        </a>

                                                    </li>
					<li class="dropdown">
						<a href="<?php echo base_url().'auth/logout'?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-logout-2"></span><span class="mtext">Keluar</span>
						</a>
						
					</li>
                                        
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>