<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Piutang</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('cc_alert') ?>
						<?php $this->session->unset_userdata('cc_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<a class="nav-link dropdown-toggle text-secondary border ml-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<strong class="mt-2">
											Pilih Menu :
											Tertunda &ndash; Piutang
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
										$tertunda = 0;
										$total_tertunda = 0;
										foreach ($cc as $key) {
											$tertunda++;
											$total_tertunda = $total_tertunda + $key['total_biaya_transaksi'];
										?>
											<tr>
												<td><?= $format->date($key['tanggal_faktur']) ?></td>
												<td><?= $format->currency($key['total_biaya_transaksi']) ?></td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailPiutang<?= $key['id_transaksi'] ?>"><span class="fe fe-clipboard fe-16"></span>
															Detail
														</a>
														<a class="dropdown-item text-dark" href="<?= base_url('costcenter/tertunda/piutang?transaksi=' . $key['id_transaksi']) ?>"><span class="fe fe-file-text fe-16"></span>
															Buat transaksi pembayaran
														</a>
														<!-- <a class="dropdown-item text-danger" href="<?= base_url('costcenter/ubah_tertunda/') . $key['id_transaksi']; ?>" onclick="return confirm('Tandai sebagai LUNAS? Anda dapat mengubahnya kembali pada halaman akun Pendapatan > <?= $this->session->userdata('kat') ?>.');">
															<span class="fe fe-check-square fe-16"></span> Tandai sebagai LUNAS
														</a> -->
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="col p-0">
									<strong class="text-danger"><?= $format->currency($total_tertunda) ?> Total (<?= $tertunda ?> Transaksi)</strong>
								</div>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->

	<!-- Modal Detail Cost Center-->
	<?php foreach ($cc as $key) { ?>
		<div class="modal fade" id="detailPiutang<?= $key['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="varyModalLabel">Detail Piutang</h5>
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
								Akun
								<span class="badge badge-primary badge-pill"><?= $key['nama_akun'] ?> > <?= $key['nama_kategori'] ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Preferensi
								<span class="badge badge-primary badge-pill"><?= $key['uraian_preferensi'] ?></span>
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
