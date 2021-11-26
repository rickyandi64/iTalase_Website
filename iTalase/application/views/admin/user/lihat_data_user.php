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
									<li class="breadcrumb-item"><a href="<?php echo base_url().'admin'?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $title?></li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Pengguna</h4>
						<p class="mb-0">Website iTalase</p>
					</div>
                                            <div class="pd-10">
                                            <a href="<?php echo base_url().'user/tambah_data_user'?>" class="btn btn-outline-primary btn-sm">Tambah Data Pengguna</a>
                                            </div>  
					<div class="pb-20">
                                            
                                            <table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                                                        <th>No</th>
									<th>Nama Pengguna</th>
                                                                        <th>Email</th>
									<th>Nama Usaha</th>
									<th>Role</th>
                                                                        <th>Tanggal Buat</th>
                                                                        <th>Foto Profile</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($pengguna as $p) 
                                                           {
                                                                echo "
                                                                    <tr>
                                                                        <td>$no</td>
									<td class='table-plus'>$p->nama_pengguna</td>
									<td>$p->email</td>
                                                                        <td>$p->nama_usaha</td>
                                                                        <td>$p->role</td>
                                                                        <td>".date('d F Y',$p->date_created)."</td>                                                                       
									<td> <img src=".base_url('assets/img/profile/').$p->image." style='width: 70px' class='card-img' ></td>
									<td>
										<div class='dropdown'>
											<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
												<i class='dw dw-more'></i>
											</a>
											<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
												<a class='dropdown-item' href='edit_data_user/$p->id_pengguna'><i class='dw dw-edit2'></i> Edit</a>
												<a class='dropdown-item' href='hapus_data_user/$p->id_pengguna'><i class='dw dw-delete-3'></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
                                                                     ";
                                                                $no++;
                                                            }
                                                            ?>
							</tbody>
						</table>
					</div>
				</div>

                        </div>
                </div>
</div>