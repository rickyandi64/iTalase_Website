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
						<h4 class="text-blue h4">Data Gambar Barang</h4>
						<p class="mb-0">Website iTalase</p>
					</div>
                                              
					<div class="pb-20">
                                            
                                            <table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                                                        <th>No</th>
									<th>Nama Barang</th>
                                                                        <th>Cover</th>
									<th>Jumlah</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                                           <?php
                                                            $no = 1;
                                                            foreach ($gambar as $g) 
                                                           {
                                                                echo "
                                                                    <tr>
                                                                        <td>$no</td>
									<td class='table-plus'>$g->nama_barang</td>
									<td> <img src=".base_url('assets/img/barang/').$g->gambar." style='width: 70px' class='card-img' ></td>
                                                                        <td><span class='badge badge-primary'>$g->total_gambar</span></td>
                                                                   
									<td>
										<div class='dropdown'>
											<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
												<i class='dw dw-more'></i>
											</a>
											<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
												<a class='dropdown-item' href='tambah_data_gambar_barang/$g->id_barang'><i class='dw dw-add'></i>Tambah Gambar</a>
												
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