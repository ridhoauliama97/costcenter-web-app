<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Detail Progres</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('cc_alert') ?>
						<?php $this->session->unset_userdata('cc_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<th style="max-width: 100px">Tanggal</th>
											<th>Keterangan</th>
											<th style="max-width: 80px">Progres</th>
											<th style="max-width: 60px">Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($cc as $key) { ?>
											<tr>
												<td><?= $format->date_full($key['tanggal']) ?></td>
												<td><?= $key['keterangan'] ?></td>
												<td><?= $key['progres'] ?>%</td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-warning" href="#" data-toggle="modal" data-target="#ubahProgres<?= $key['no'] ?>"><span class="fe fe-edit fe-16"></span>
															Ubah
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('costcenter/hapus_progres/') . $key['no']; ?>" onclick="return confirm('Data akan dihapus secara permanen. Lanjutkan?');">
															<span class="fe fe-trash-2 fe-16"></span> Hapus
														</a>
													</div>
												</td>
											</tr>
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

	<!-- Modal tambah Cost Center-->
	<?php foreach ($cc as $key) { ?>
		<div class="modal fade" id="ubahProgres<?= $key['no'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="varyModalLabel">Data Progres Cost Center</h5>
						<h5><?= $key['costcenter'] ?></h5>
					</div>
					<!-- TAMBAH METHOD -->
					<form action="<?= base_url('dashboard/update_progres') ?>" method="post">
						<div class="modal-body">
							<input type="hidden" name="kode_cc" value="<?= $key['costcenter'] ?>" readonly>
							<div class="form-group">
								<label for="mulai_cc" class="col-form-label">
									Tanggal
								</label>
								<input type="date" class="form-control form-control-sm" name="tanggal" value="<?= $key['tanggal'] ?>" required>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-form-label">
									Keterangan
								</label>
								<input type="text" class="form-control form-control-sm" name="keterangan" value="<?= $key['keterangan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="progres_cc" class="col-form-label">
									Progres
								</label>
								<input type="range" id="progres_cc" class="custom-range custom-range-sm" name="progres_cc" value="<?= $key['progres'] ?>" min="0" max="100" step="1" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Saat ini: <?= $key['progres'] ?>%" required>
								<div class="row">
									<div class="col-4 text-left"><small>0%</small></div>
									<div class="col-4 text-center"><small id="progres_val"><?= $key['progres'] ?>%</small></div>
									<div class="col-4 text-right"><small>100%</small></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="<?= base_url() ?>dashboard/detail_progres/<?= $key['costcenter'] ?>" class="btn mb-2 btn-info mr-auto">Detail Progres</a>
							<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn mb-2 btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Modal Tambah Cost Center -->

</main>

<script>
	$('#progres_cc').on('input keyup keydown', function() {
		var val = $('#progres_val');
		val.text($(this).val() + '%');
	});
</script>
