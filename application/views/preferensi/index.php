<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Menu Preferensi</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('preferensi_alert') ?>
						<?php $this->session->unset_userdata('preferensi_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col">
										<div class="row m-0">
											<a href="#" class="btn btn-primary d-md-table" data-toggle="modal" data-target="#tambahPreferensi">
												<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Tambah Preferensi
											</a>
											<a href="#" class="btn btn-info ml-2 d-md-table" data-toggle="modal" data-target="#salinPreferensi">
												<i class="fe fe-copy" aria-hidden="true"></i>&nbsp; Salin dari CC lain
											</a>
										</div>
									</div>
								</div>
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th>Kode Preferensi</th> -->
											<th>Uraian Preferensi</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($preferensi as $key) { ?>
											<?php if ($key['kode_preferensi'] > 10) { ?>
												<tr>
													<!-- <td class="text-center"><?= str_pad($key['kode_preferensi'], 4, 0, STR_PAD_LEFT) ?></td> -->
													<td class="text-left"><?= $key['uraian_preferensi'] ?></td>
													<td class="text-center">
														<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="text sr-only">...</span>
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailPreferensi<?= $key['kode_preferensi'] ?>"><span class="fe fe-clipboard fe-16"></span> Detail
															</a>
															<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editPreferensi<?= $key['kode_preferensi'] ?>"><span class="fe fe-edit fe-16"></span>
																Ubah
															</a>
															<a class="dropdown-item text-danger" href="<?= base_url('preferensi/hapus/') . $key['kode_preferensi']; ?>" onclick="return confirm('Data akan dihapus secara permanen. Lanjutkan?');">
																<span class="fe fe-trash-2 fe-16"></span> Hapus
															</a>
														</div>
													</td>
												</tr>
											<?php } ?>
										<?php } ?>
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
