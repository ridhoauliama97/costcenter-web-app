<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Detail Hutang <?= str_pad($id, 6, 0, STR_PAD_LEFT) ?></h2>
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
												<a href="#" class="btn btn-primary ml-2 d-md-table" data-toggle="modal" data-target="#bayarTagihan">
													<i class="fe fe-file-text" aria-hidden="true"></i>&nbsp; Bayar
												</a>
											</div>
											<div class="col-auto">
												<a class="nav-link dropdown-toggle text-secondary border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<strong class="mt-2">
														Pilih Menu :
														Tertunda &ndash; Hutang
													</strong>
												</a>
												<div class="dropdown-menu dropdown-menu-right" style="max-height: 45vh; overflow-y: auto" aria-labelledby="navbarDropdownMenuLink">
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

								<div class="card mb-3">
									<div class="card-body">
										<p class="m-0"><strong>ID Transaksi :</strong> <?= str_pad($id, 6, 0, STR_PAD_LEFT) ?></p>
										<p class="m-0"><strong>Akun :</strong> <?= $detail['nama_akun'] ?></p>
										<p class="m-0"><strong>Kategori :</strong> <?= $detail['nama_kategori'] ?></p>
										<p class="m-0"><strong>Uraian :</strong> <?= $detail['uraian_preferensi'] ?></p>
										<p class="m-0"><strong>Keterangan :</strong> <?= $detail['keterangan'] ?></p>
										<hr class="my-2">
										<p class="m-0"><strong>Ditagih :</strong> <?= $format->currency($detail['total_biaya_transaksi']) ?></p>
										<?php
										$bayar = 0;
										foreach ($transaksi as $key) {
											$bayar = $bayar + $key['total_biaya_transaksi'];
										}
										?>
										<p class="m-0"><strong>Dibayar :</strong> <?= $format->currency($bayar) ?></p>
									</div>
								</div>
								<!-- table -->
								<table class="table table-sm">
									<thead class="thead-dark text-center">
										<tr>
											<th>ID Transaksi</th>
											<th>Tanggal</th>
											<th>Jumlah</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($transaksi as $key) { ?>
											<tr>
												<td><?= str_pad($key['id_bayar'], 6, 0, STR_PAD_LEFT) ?></td>
												<td><?= $format->date($key['tanggal_faktur']) ?></td>
												<td><?= $format->currency($key['total_biaya_transaksi']) ?></td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailTertunda<?= $key['id_bayar'] ?>"><span class="fe fe-clipboard fe-16"></span>
															Detail
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('costcenter/hapus_tertunda/') . $key['id_bayar']; ?>" onclick="return confirm('Data akan dihapus secara permanen. Lanjutkan?');">
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
	<div class="modal fade" id="bayarTagihan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Pembayaran Tagihan Transaksi <?= str_pad($id, 6, 0, STR_PAD_LEFT) ?></h5>
				</div>
				<!-- TAMBAH Cost Center -->
				<form action="<?= base_url('costcenter/bayar_tertunda') ?>" Cost Center="post">
					<div class="modal-body">
						<input type="hidden" name="costcenter" value="<?= str_replace('%20', ' ', $this->session->userdata('costcenter')) ?>" required>
						<input type="hidden" name="tagihan" value="<?= $id ?>" required>
						<input type="hidden" name="preferensi" value="10" required>
						<input type="hidden" name="akun" value="3" required>
						<input type="hidden" name="kategori" value="11" required>
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
							<label for="nominal" class="col-form-label">Jumlah </label>
							<input type="number" class="form-control form-control-sm" name="total_biaya_transaksi" min="0" required>
						</div>
						<div class="form-group">
							<label for="keterangan" class="col-form-label">Keterangan </label>
							<input type="text" class="form-control form-control-sm" name="keterangan" placeholder="" required>
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
	<?php foreach ($transaksi as $key) { ?>
		<div class="modal fade" id="detailTertunda<?= $key['id_bayar'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="varyModalLabel">Detail Pembayaran Tagihan</h5>
					</div>
					<!-- detail Cost Center -->
					<div class="modal-body">
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								ID Tagihan
								<span class="badge badge-primary badge-pill"><?= str_pad($key['id_tagihan'], 6, 0, STR_PAD_LEFT) ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								ID Pembayaran
								<span class="badge badge-primary badge-pill"><?= str_pad($key['id_bayar'], 6, 0, STR_PAD_LEFT) ?></span>
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
</main>
