<?php foreach ($preferensi as $harga) { ?>
	<input type="hidden" value="<?= $harga['harga_preferensi'] ?>" id="harga<?= $harga['kode_preferensi'] ?>">
<?php } ?>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Gaji dan Upah</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('cc_alert') ?>
						<?php $this->session->unset_userdata('cc_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col-md-12">
										<div class="row">
											<div class="col-auto">
												<a href="#" class="btn btn-primary ml-2 d-md-table" data-toggle="modal" data-target="#tambahGajiupah">
													<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Tambah
												</a>
											</div>
											<div class="col-auto">
												<a class="nav-link dropdown-toggle text-secondary border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<strong class="mt-2">
														Pilih Menu :
														Beban &ndash; Gaji dan Upah
													</strong>
												</a>
												<div class="dropdown-menu dropdown-menu-right" style="max-height: 50vh; overflow-y: auto" aria-labelledby="navbarDropdownMenuLink">
													<a class="ml-2"><strong>Pendapatan</strong> </a>
													<a class="dropdown-item" href="<?= base_url('costcenter/pendapatan/dana_proyek') ?>">Pembayaran Dana Proyek</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/pendapatan/bonus') ?>">Bonus</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/pendapatan/retur') ?>">Retur</a>
													<a class="dropdown-item mb-2" href="<?= base_url('costcenter/pendapatan/lainnya') ?>">Lain-lain</a>
													<a class="ml-2"><strong>Beban</strong> </a>
													<a class="dropdown-item" href="<?= base_url('costcenter/beban/material') ?>">Pembelian Bahan</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/beban/gaji_upah') ?>">Gaji dan Upah</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/beban/kesekretariatan') ?>">Kesekretariatan</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/beban/komunikasi_transportasi') ?>">Komunikasi dan Transportasi</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/beban/legalitas') ?>">Legalitas</a>
													<a class="dropdown-item mb-2" href="<?= base_url('costcenter/beban/lainnya') ?>">Lain-lain</a>
													<a class="ml-2"><strong>Tertunda</strong> </a>
													<a class="dropdown-item" href="<?= base_url('costcenter/tertunda/hutang') ?>">Hutang</a>
													<a class="dropdown-item" href="<?= base_url('costcenter/tertunda/piutang') ?>">Piutang</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<th>Tanggal</th>
											<th>Jumlah</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$lunas = 0;
										$tertunda = 0;
										$total_lunas = 0;
										$total_tertunda = 0;
										foreach ($cc as $key) {
											if ($key['status_transaksi'] == 1) {
												$lunas++;
												$total_lunas = $total_lunas + $key['total_biaya_transaksi'];
											} else {
												$tertunda++;
												$total_tertunda = $total_tertunda + $key['total_biaya_transaksi'];
											}
										?>
											<tr>
												<td><?= $format->date($key['tanggal_faktur']) ?></td>
												<td>
													<?= $format->currency($key['total_biaya_transaksi']) ?>
													<?php if ($key['status_transaksi'] == 0) { ?>
														<a href="<?= base_url('costcenter/tertunda/hutang?transaksi=' . $key['id_transaksi']) ?>" class="fe fe-alert-circle text-warning text-decoration-none"></a>
													<?php } ?>
												</td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailBeban<?= $key['id_transaksi'] ?>"><span class="fe fe-clipboard fe-16"></span>
															Detail
														</a>
														<a class="dropdown-item text-warning" href="#" data-toggle="modal" data-target="#ubahBeban<?= $key['id_transaksi'] ?>"><span class="fe fe-edit fe-16"></span>
															Ubah
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('costcenter/hapus_beban/') . $key['id_transaksi']; ?>" onclick="return confirm('Data akan dihapus secara permanen. Lanjutkan?');">
															<span class="fe fe-trash-2 fe-16"></span> Hapus
														</a>
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="col p-0">
									<strong class="text-success"><?= $format->currency($total_lunas) ?> Lunas (<?= $lunas ?> Transaksi)</strong>
									<br>
									<strong class="text-danger"><?= $format->currency($total_tertunda) ?> Tertunda (<?= $tertunda ?> Transaksi)</strong>
								</div>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->

	<!-- Modal tambah Cost Center-->
	<div class="modal fade" id="tambahGajiupah" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Gaji dan Upah</h5>
				</div>
				<!-- TAMBAH METHOD -->
				<form action="<?= base_url('costcenter/tambah_beban') ?>" method="post">
					<div class="modal-body">
						<input type="hidden" name="costcenter" value="<?= str_replace('%20', ' ', $this->session->userdata('costcenter')) ?>" required>
						<input type="hidden" name="preferensi" value="5" required>
						<input type="hidden" name="akun" value="2" required>
						<input type="hidden" name="kategori" value="6" required>
						<input type="hidden" name="total_satuan_transaksi" value="1" required>
						<input type="hidden" name="username" value="<?= $this->session->userdata('user') ?>" required>
						<div class="form-group">
							<label for="faktur" class="col-form-label">No. Faktur </label>
							<input type="text" class="form-control form-control-sm" name="faktur" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="tanggal" class="col-form-label">Tanggal </label>
							<input type="date" class="form-control form-control-sm" name="tanggal" required>
						</div>
						<div class="form-group">
							<label for="total_biaya_transaksi" class="col-form-label">Jumlah </label>
							<input type="number" class="form-control form-control-sm" name="total_biaya_transaksi" min="0" required>
						</div>
						<div class="form-group">
							<label for="keterangan" class="col-form-label">Keterangan </label>
							<input type="text" class="form-control form-control-sm" name="keterangan" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="status" class="col-form-label">Status Pembayaran </label>
							<br>
							<input type="radio" class="" name="status" value="1" required><span class="ml-1 mr-3">Lunas</span>
							<input type="radio" class="" name="status" value="0" required><span class="ml-1 mr-0">Tertunda</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn mb-2 btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal Tambah Cost Center -->

	<!-- Modal Detail Cost Center-->
	<?php foreach ($cc as $key) { ?>
		<div class="modal fade" id="detailBeban<?= $key['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="varyModalLabel">Detail Gaji dan Upah</h5>
					</div>
					<!-- detail METHOD -->
					<div class="modal-body">
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								ID Transaksi
								<span class="badge badge-primary badge-pill"><?= str_pad($key['id_transaksi'], 6, 0, STR_PAD_LEFT) ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								No. Faktur
								<span class="badge badge-primary badge-pill"><?= $key['no_faktur'] ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Tanggal Faktur
								<span class="badge badge-primary badge-pill"><?= $format->date($key['tanggal_faktur']) ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Keterangan
								<span class="badge badge-primary badge-pill"><?= $key['keterangan'] ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Jumlah
								<span class="badge badge-primary badge-pill"><?= $format->currency($key['total_biaya_transaksi']) ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Status
								<?php
								if ($key['status_transaksi'] == 1) {
									$status_transaksi = 'LUNAS';
									$col = 'badge-success text-white';
								} else {
									$status_transaksi = 'TERTUNDA';
									$col = 'badge-warning text-white';
								}
								?>
								<span class="badge <?= $col ?> badge-pill"><?= $status_transaksi ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Diinput Oleh
								<span class="badge badge-primary badge-pill"><?= $key['username'] ?></span>
							</li>
						</ul>
					</div>
					<div class=" modal-footer">
						<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Modal Detail Cost Center -->

	<!-- Modal Ubah Cost Center-->
	<?php foreach ($cc as $key) { ?>
		<div class="modal fade" id="ubahBeban<?= $key['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="varyModalLabel">Ubah Gaji dan Upah</h5>
					</div>
					<!-- ubah METHOD -->
					<form action="<?= base_url('costcenter/ubah_beban') ?>" method="post">
						<div class="modal-body">
							<input type="hidden" name="id" value="<?= $key['id_transaksi'] ?>" required>
							<input type="hidden" name="username" value="<?= $this->session->userdata('user') ?>" required>
							<div class="form-group">
								<label for="faktur" class="col-form-label">No. Faktur </label>
								<input type="text" class="form-control form-control-sm" name="faktur" value="<?= $key['no_faktur'] ?>" required>
							</div>
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Tanggal </label>
								<input type="date" class="form-control form-control-sm" name="tanggal" value="<?= $key['tanggal_faktur'] ?>" required>
							</div>
							<div class=" form-group">
								<label for="total_biaya_transaksi" class="col-form-label">Jumlah </label>
								<input type="number" class="form-control form-control-sm" name="total_biaya_transaksi" value="<?= $key['total_biaya_transaksi'] ?>" min="0" required>
							</div>
							<div class=" form-group">
								<label for="keterangan" class="col-form-label">Keterangan </label>
								<input type="text" class="form-control form-control-sm" name="keterangan" value="<?= $key['keterangan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="status" class="col-form-label">Status Pembayaran </label>
								<br>
								<input <?php if ($key['status_transaksi'] == 1) {
													echo 'checked';
												} ?> type="radio" class="" name="status" value="1" required><span class="ml-1 mr-3">Lunas</span>
								<input <?php if ($key['status_transaksi'] == 0) {
													echo 'checked';
												} ?> type="radio" class="" name="status" value="0" required><span class="ml-1 mr-0">Tertunda</span>
							</div>
						</div>
						<div class=" modal-footer">
							<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn mb-2 btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Modal Ubah Cost Center -->
</main>
