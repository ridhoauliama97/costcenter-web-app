<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Menu Kontak</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('kontak_alert') ?>
						<?php $this->session->unset_userdata('kontak_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col">
										<div class="dropdown">
											<a href="#" class="btn btn-primary ml-2 d-md-table" data-toggle="modal" data-target="#tambahKontak">
												<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Tambah Kontak
											</a>
										</div>
									</div>
								</div>
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>No</th>
											<th>Nama</th>
											<th>No. Telephone</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$i = 1;
										foreach ($kontak as $key) {
										?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $key['nama'] ?></td>
												<td><?= $key['telp'] ?></td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailKontak<?= $key['id'] ?>"><span class="fe fe-clipboard fe-16"></span> Detail
														</a>
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editKontak<?= $key['id'] ?>"><span class="fe fe-edit fe-16"></span>
															Ubah
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('kontak/hapus/' . $key['id']); ?>" onclick="return confirm('Yakin ingin menghapus kontak ini?');">
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
