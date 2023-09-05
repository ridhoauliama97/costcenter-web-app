<?php foreach ($preferensi as $harga) { ?>
	<input type="hidden" value="<?= $harga['harga_preferensi'] ?>" id="harga<?= $harga['kode_preferensi'] ?>">
<?php } ?>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Pembelian Bahan</h2>
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
												<a href="#" class="btn btn-primary ml-2 d-md-table" data-toggle="modal" data-target="#tambahMaterial">
													<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Tambah
												</a>
											</div>
											<div class="col-auto">
												<a class="nav-link dropdown-toggle text-secondary border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<strong class="mt-2">
														Pilih Menu :
														Beban &ndash; Pembelian Bahan
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
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<th>Tanggal</th>
											<th>Uraian</th>
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
												<td><?= $key['uraian_preferensi'] ?></td>
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
	<div class="modal fade" id="tambahMaterial" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Pembelian Bahan</h5>
				</div>
				<!-- TAMBAH METHOD -->
				<form action="<?= base_url('costcenter/tambah_beban') ?>" method="post">
					<div class="modal-body">
						<input type="hidden" name="costcenter" value="<?= str_replace('%20', ' ', $this->session->userdata('costcenter')) ?>" required>
						<input type="hidden" name="akun" value="2" required>
						<input type="hidden" name="kategori" value="5" required>
						<input type="hidden" name="username" value="<?= $this->session->userdata('user') ?>" required>
						<input type="hidden" name="keterangan" id="keterangan" required>
						<div class="form-group">
							<label for="faktur" class="col-form-label">
								No. Faktur
							</label>
							<input type="text" class="form-control form-control-sm" name="faktur" required>
						</div>
						<div class="form-group">
							<label for="tanggal" class="col-form-label">
								Tanggal Faktur
							</label>
							<input type="date" class="form-control form-control-sm" name="tanggal" required>
						</div>
						<div class="form-group ">
							<label for="preferensi">Uraian</label>
							<select class="form-control select2" id="uraian" name="preferensi" onchange="get_harga()" required>
								<option value=""></option>
								<!-- <optgroup label="Group Preferensi"> -->
								<?php foreach ($preferensi  as $pref) { ?>
									<option value="<?= $pref['kode_preferensi'] ?>"><?= $pref['uraian_preferensi'] ?> per <?= $pref['satuan_preferensi'] ?></option>
								<?php } ?>
								<!-- </optgroup> -->
							</select>
						</div>
						<div class="form-group">
							<label for="biaya_transaksi" class="col-form-label">
								Biaya Perkiraan
							</label>
							<input type="number" class="form-control form-control-sm" name="biaya_transaksi" id="biaya_transaksi" readonly required>
						</div>
						<div class="form-group">
							<label for="pop_vol" class="col-form-label">
								Volume
								<a id="pop_vol" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" title="Lokalisasi Inputan Browser" data-content="<ul><li>Untuk nilai desimal sesuaikan dengan lokalisasi pada perangkat dan browser Anda.</li><li>Gunakan tanda titik ( . ) sebagai pengganti koma ( , ) jika Anda tidak bisa melakukan input tanda koma.</li><li>Nilai kelipatan seribu tidak perlu menggunakan tanda.</li></ul>">
									<span class="fe fe-info text-info font-weight-bold"></span>
								</a>
							</label>
							<input type="number" class="form-control form-control-sm" name="total_satuan_transaksi" id="total_satuan_transaksi" oninput="hitung_total()" min="0" placeholder="123" required>
						</div>
						<div class="form-group">
							<label for="total_biaya_transaksi" class="col-form-label">
								Total Biaya
							</label>
							<input type="number" class="form-control form-control-sm" name="total_biaya_transaksi" id="total_biaya_transaksi" readonly required>
						</div>
						<div class="form-group">
							<label for="status" class="col-form-label">Status Pembayaran</label>
							<br>
							<input type="radio" name="status" value="1" checked required><span class="ml-1 mr-3" onclick="hitung_total()">Lunas</span>
							<input type="radio" name="status" value="0" required><span class="ml-1 mr-0" onclick="hitung_total()">Tertunda</span>
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
						<h5 class="modal-title" id="varyModalLabel">Dana Proyek</h5>
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
								Volume
								<span class="badge badge-primary badge-pill"><?= $key['total_satuan_transaksi'] ?> <?= $key['satuan_preferensi'] ?></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								Total Biaya
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
						<h5 class="modal-title" id="varyModalLabel">Dana Proyek</h5>
					</div>
					<!-- ubah METHOD -->
					<form action="<?= base_url('costcenter/ubah_beban') ?>" method="post">
						<div class="modal-body">
							<input type="hidden" name="id" value="<?= $key['id_transaksi'] ?>" required>
							<input type="hidden" name="username" value="<?= $this->session->userdata('user') ?>" required>
							<input type="hidden" name="keterangan" id="keterangan<?= $key['id_transaksi'] ?>" value="<?= $key['keterangan'] ?>" required>
							<div class="form-group">
								<label for="uraian" class="col-form-label">No. Faktur </label>
								<input type="text" class="form-control form-control-sm" name="faktur" value="<?= $key['no_faktur'] ?>" required>
							</div>
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Tanggal </label>
								<input type="date" class="form-control form-control-sm" name="tanggal" value="<?= $key['tanggal_faktur'] ?>" required>
							</div>
							<div class="form-group ">
								<label for="preferensi">Uraian</label>
								<select class="form-control select2" id="uraian<?= $key['id_transaksi'] ?>" name="preferensi" onchange="get_harga<?= $key['id_transaksi'] ?>()" required>
									<option value=""></option>
									<optgroup label="Group Preferensi">
										<?php foreach ($preferensi  as $pref) { ?>
											<option <?php if ($key['kode_preferensi'] == $pref['kode_preferensi']) {
																echo 'selected';
															} ?> value="<?= $pref['kode_preferensi'] ?>">
												<?= $pref['uraian_preferensi'] ?> per <?= $pref['satuan_preferensi'] ?>
											</option>
										<?php } ?>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label for="biaya_transaksi" class="col-form-label">
									Biaya Perkiraan
								</label>
								<input type="number" class="form-control form-control-sm" name="biaya_transaksi" id="biaya_transaksi<?= $key['id_transaksi'] ?>" value="<?= $key['harga_preferensi'] ?>" readonly required>
							</div>
							<div class="form-group">
								<label for="total_satuan_transaksi" class="col-form-label">
									Volume
								</label>
								<input type="number" class="form-control form-control-sm" name="total_satuan_transaksi" id="total_satuan_transaksi<?= $key['id_transaksi'] ?>" oninput="hitung_total<?= $key['id_transaksi'] ?>()" min="0" placeholder="123" value="<?= $key['total_satuan_transaksi'] ?>" required>
							</div>
							<div class="form-group">
								<label for="total_biaya_transaksi" class="col-form-label">
									Total Biaya
								</label>
								<input type="number" class="form-control form-control-sm" name="total_biaya_transaksi" id="total_biaya_transaksi<?= $key['id_transaksi'] ?>" value="<?= $key['total_biaya_transaksi'] ?>" readonly required>
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


<script>
	var select_total = document.getElementById('total_satuan_transaksi');
	var total_transaksi = document.getElementById('biaya_transaksi');
	var total_biaya_transaksi = document.getElementById('total_biaya_transaksi');
	var select_item = document.getElementById('uraian');

	function get_harga() {
		var select_kode = select_item.options[select_item.selectedIndex].value;
		// var selected_kode = select_kode.substr(5);
		var select_input = document.getElementById('harga' + select_kode);
		var select_harga = select_input.value;
		total_transaksi.value = select_harga;

		if (isNaN(select_total.value)) {} else {
			hitung_total();
		}
	}

	function hitung_total() {
		var total_satuan = parseInt(select_total.value) * parseInt(total_transaksi.value);
		total_biaya_transaksi.value = total_satuan;

		var select_text = select_item.options[select_item.selectedIndex].innerHTML;
		var str = select_text.replace('per', select_total.value);
		document.getElementById('keterangan').value = 'Pembelian ' + str.trim();
	}


	<?php foreach ($cc as $key) { ?>

		var select_total<?= $key['id_transaksi'] ?> = document.getElementById('total_satuan_transaksi<?= $key['id_transaksi'] ?>');
		var total_transaksi<?= $key['id_transaksi'] ?> = document.getElementById('biaya_transaksi<?= $key['id_transaksi'] ?>');
		var total_biaya_transaksi<?= $key['id_transaksi'] ?> = document.getElementById('total_biaya_transaksi<?= $key['id_transaksi'] ?>');
		var select_item<?= $key['id_transaksi'] ?> = document.getElementById('uraian<?= $key['id_transaksi'] ?>');

		function get_harga<?= $key['id_transaksi'] ?>() {
			var select_kode<?= $key['id_transaksi'] ?> = select_item<?= $key['id_transaksi'] ?>.options[select_item<?= $key['id_transaksi'] ?>.selectedIndex].value;
			// var selected_kode = select_kode.substr(5);
			var select_input<?= $key['id_transaksi'] ?> = document.getElementById('harga' + select_kode<?= $key['id_transaksi'] ?>);
			var select_harga<?= $key['id_transaksi'] ?> = select_input<?= $key['id_transaksi'] ?>.value;
			total_transaksi<?= $key['id_transaksi'] ?>.value = select_harga<?= $key['id_transaksi'] ?>;

			if (isNaN(select_total<?= $key['id_transaksi'] ?>.value)) {} else {
				hitung_total<?= $key['id_transaksi'] ?>();
			}
		}

		function hitung_total<?= $key['id_transaksi'] ?>() {
			var total_satuan<?= $key['id_transaksi'] ?> = parseInt(select_total<?= $key['id_transaksi'] ?>.value) * parseInt(total_transaksi<?= $key['id_transaksi'] ?>.value);
			total_biaya_transaksi<?= $key['id_transaksi'] ?>.value = total_satuan<?= $key['id_transaksi'] ?>;

			var select_text<?= $key['id_transaksi'] ?> = select_item<?= $key['id_transaksi'] ?>.options[select_item<?= $key['id_transaksi'] ?>.selectedIndex].innerHTML;
			var str<?= $key['id_transaksi'] ?> = select_text<?= $key['id_transaksi'] ?>.replace('per', select_total<?= $key['id_transaksi'] ?>.value);
			document.getElementById('keterangan<?= $key['id_transaksi'] ?>').value = 'Pembelian ' + str<?= $key['id_transaksi'] ?>.trim();
		}
	<?php } ?>
</script>
