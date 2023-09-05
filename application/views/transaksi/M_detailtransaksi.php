<!-- Modal Detail Transaksi -->
<?php foreach ($transaksi as $key) { ?>
	<div class="modal fade" id="detailTransaksi<?= $key['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Detail Data Transaksi <?= str_pad($key['kode_preferensi'], 4, 0, STR_PAD_LEFT) ?></h5>
				</div>
				<div class="modal-body">
					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Cost Center
							<span class="badge badge-primary badge-pill"><b><?= $key['kode_cc'] ?></b> &mdash; <?= $key['nama_cc'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Preferensi
							<span class="badge badge-primary badge-pill"><?= str_pad($key['kode_preferensi'], 4, 0, STR_PAD_LEFT) ?> &mdash; <?= $key['uraian_preferensi'] ?> per <?= $key['satuan_preferensi'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							No. Faktur
							<span class="badge badge-primary badge-pill"><?= $key['no_faktur'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Tanggal Faktur
							<span class="badge badge-primary badge-pill"><?= date('d-m-Y', strtotime($key['tanggal_faktur'])) ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Biaya Transaksi
							<?php
							$str = $key['harga_preferensi'];
							if (strlen($str) % 3 == 2) {
								$res = str_split("0$str", 3);
								$res[0] = (int) $res[0];
								$harga_preferensi = 'Rp.' . implode('.', $res);
							} else if (strlen($str) % 3 == 1) {
								$res = str_split("00$str", 3);
								$res[0] = (int) $res[0];
								$harga_preferensi = 'Rp.' . implode('.', $res);
							} else {
								$res = str_split($str, 3);
								$harga_preferensi = 'Rp.' . implode('.', $res);
							}
							?>
							<span class="badge badge-primary badge-pill"><?= $harga_preferensi ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Jumlah Satuan Transaksi
							<span class="badge badge-primary badge-pill"><?= $key['total_satuan_transaksi'] ?> <?= $key['satuan_preferensi'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Total Biaya Transaksi
							<?php
							$str = $key['total_biaya_transaksi'];
							if (substr($key['total_biaya_transaksi'], 0, 1) == '-') {
								$str = $str * (-1);
								if (strlen($str) % 3 == 2) {
									$res = str_split("0$str", 3);
									$res[0] = (int) $res[0];
									$total_biaya = '-Rp.' . implode('.', $res);
								} else if (strlen($str) % 3 == 1) {
									$res = str_split("00$str", 3);
									$res[0] = (int) $res[0];
									$total_biaya = '-Rp.' . implode('.', $res);
								} else {
									$res = str_split($str, 3);
									$total_biaya = '-Rp.' . implode('.', $res);
								}
								$badge_col = 'badge-danger';
							} else {
								if (strlen($str) % 3 == 2) {
									$res = str_split("0$str", 3);
									$res[0] = (int) $res[0];
									$total_biaya = 'Rp.' . implode('.', $res);
								} else if (strlen($str) % 3 == 1) {
									$res = str_split("00$str", 3);
									$res[0] = (int) $res[0];
									$total_biaya = 'Rp.' . implode('.', $res);
								} else {
									$res = str_split($str, 3);
									$total_biaya = 'Rp.' . implode('.', $res);
								}
								$badge_col = 'badge-info';
							}
							?>
							<span class="badge <?= $badge_col ?> badge-pill"><?= $total_biaya ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Akun Transaksi
							<?php
							if ($key['akun_transaksi'] == 1) {
								$akun = 'Debit';
							} else {
								$akun = 'Kredit';
							}
							?>
							<span class="badge badge-primary badge-pill"><?= $akun ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Kategori
							<span class="badge badge-primary badge-pill"><?= $key['nama_kategori'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Diinput Oleh
							<span class="badge badge-primary badge-pill"><?= $key['username'] ?></span>
						</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<!-- End Modal Detail Transaksi -->
