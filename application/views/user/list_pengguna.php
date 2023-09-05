<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">List Pengguna</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('kode_alert') ?>
						<?php $this->session->unset_userdata('kode_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
								</div>
								<!-- table -->
								<table class="table datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>No</th>
											<th>Username</th>
											<th>Nama Pengguna</th>
											<th>Alamat</th>
											<th>No. HP</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$i = 1;
										foreach ($akun as $key) {
										?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $key['username'] ?></td>
												<td><?= $key['nama_pengguna'] ?></td>
												<td><?= $key['alamat'] ?></td>
												<td><?= $key['no_hp'] ?></td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="<?= base_url('user/reset_user/' . $key['username']) ?>" onclick="return confirm('Kode akan dihapus permanen');">
															<span class="fe fe-rotate-ccw fe-16"></span> Reset Password
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('user/hapus_user/' . $key['username']) ?>" onclick="return confirm('Kode akan dihapus permanen');">
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
