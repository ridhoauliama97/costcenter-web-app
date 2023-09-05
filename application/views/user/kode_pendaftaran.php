<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Kode Pendaftaran</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('kode_alert') ?>
						<?php $this->session->unset_userdata('kode_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col">
										<div class="dropdown">
											<a href="<?= base_url('user/buat_kode') ?>" class="btn btn-primary ml-2 d-md-table">
												<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Buat Kode
											</a>
										</div>
									</div>
								</div>
								<!-- table -->
								<table class="table datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>No</th>
											<th>Kode</th>
											<th>Username</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$i = 1;
										foreach ($kode as $key) {
										?>
											<tr>
												<td style="width: 80px;"><?= $i ?></td>
												<td style="width: 200px;"><?= $key['string'] ?></td>
												<?php
												if (empty($key['username'])) {
												?>
													<td>
														<div class="accordion w-100" id="accordion1">
															<div class="">
																<div class="" id="heading1">
																	<a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
																		<strong>Link daftar</strong>
																	</a>
																</div>
																<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion1">
																	<div class="">
																		<?= str_replace('user/kode_pendaftaran', 'auth/register?kode=' . $key['string'], $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>
																	</div>
																</div>
															</div>
														</div>
													</td>
												<?php } else { ?>
													<td><?= $key['username'] ?></td>
												<?php } ?>
												<td style="width: 100px;">
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-danger" href="<?= base_url('user/hapus_kode/' . $key['string']) ?>" onclick="return confirm('Kode akan dihapus permanen');">
															<span class="fe fe-trash-2 fe-16"></span> Hapus
														</a>
													</div>
												</td>
											</tr>
										<?php
											$i++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main>
