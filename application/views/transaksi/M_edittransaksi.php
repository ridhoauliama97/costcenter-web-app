<!-- Modal Edit Transaksi-->
<?php foreach ($transaksi as $key) { ?>
	<div class="modal fade" id="editTransaksi<?= $key['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Transaksi</h5>
				</div>
				<form action="<?= base_url('transaksi/edit') ?>" method="post">
					<input type="hidden" name="id_transaksi" value="<?= $key['id_transaksi'] ?>" readonly required>
					<div class="modal-body">
						<div class="form-group">
							<label for="kode_cc" class="col-form-label">
								Cost Center
							</label>
							<select name="kode_cc" class="form-control" required>
								<option value=""></option>
								<?php foreach ($cc as $get) { ?>
									<option <?php if ($key['kode_cc'] == $get['kode_cc']) {
												echo 'selected';
											} ?> value="<?= $get['kode_cc'] ?>"><?= $get['kode_cc'] ?> &mdash; <?= $get['nama_cc'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="kode_preferensi" class="col-form-label">
								Preferensi
							</label>
							<select name="kode_preferensi" class="form-control" id="list_harga<?= $key['id_transaksi'] ?>" onchange="get_harga<?= $key['id_transaksi'] ?>()" required>
								<option value=""></option>
								<?php foreach ($preferensi as $get) { ?>
									<option <?php if ($key['kode_preferensi'] == $get['kode_preferensi']) {
												echo 'selected';
											} ?> value="<?= $get['kode_preferensi'] ?>"><?= $get['uraian_preferensi'] ?> per <?= $get['satuan_preferensi'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="no_faktur" class="col-form-label">
								No. Faktur
							</label>
							<input type="text" class="form-control" name="no_faktur" placeholder="Max. 24 karakter" value="<?= $key['no_faktur'] ?>" required>
						</div>
						<div class="form-group">
							<label for="tanggal_faktur" class="col-form-label">
								Tanggal Faktur
							</label>
							<input type="date" class="form-control" name="tanggal_faktur" value="<?= $key['tanggal_faktur'] ?>" required>
						</div>
						<div class="form-group">
							<label for="biaya_transaksi" class="col-form-label">
								Biaya Transaksi
							</label>
							<input type="number" class="form-control" name="biaya_transaksi" id="biaya_transaksi<?= $key['id_transaksi'] ?>" value="<?= $key['harga_preferensi'] ?>" readonly required>
						</div>
						<div class="form-group">
							<label for="total_satuan_transaksi" class="col-form-label">
								Jumlah Satuan Transaksi
							</label>
							<input type="number" class="form-control" name="total_satuan_transaksi" id="total_satuan_transaksi<?= $key['id_transaksi'] ?>" oninput="hitung_total<?= $key['id_transaksi'] ?>()" min="0" placeholder="123" value="<?= $key['total_satuan_transaksi'] ?>" required>
						</div>
						<?php
						if ($key['total_biaya_transaksi'] < 0) {
							$check = 'checked';
							$col = 'text-danger';
						} else {
							$check = '';
							$col = 'text-info';
						}
						?>
						<div class="form-group">
							<label for="total_biaya_transaksi" class="col-form-label">
								Total Biaya Transaksi
							</label>
							<input type="number" class="form-control <?= $col ?>" name="total_biaya_transaksi" id="total_biaya_transaksi<?= $key['id_transaksi'] ?>" value="<?= $key['total_biaya_transaksi'] ?>" readonly required>
						</div>
						<div class="form-group">
							<input type="checkbox" <?= $check ?> class="" name="negatif" id="negatif<?= $key['id_transaksi'] ?>" onclick="hitung_total<?= $key['id_transaksi'] ?>()">
							<small>Nominal dalam bilangan negatif</small>
						</div>
						<div class="form-group">
							<label for="akun_transaksi" class="col-form-label">
								Akun Transaksi
							</label>
							<select name="akun_transaksi" class="form-control" required>
								<option value=""></option>
								<option <?php if ($key['akun_transaksi'] == 1) {
											echo 'selected';
										} ?> value="1">Debit</option>
								<option <?php if ($key['akun_transaksi'] == 2) {
											echo 'selected';
										} ?> value="2">Kredit</option>
							</select>
						</div>
						<div class="form-group">
							<label for="kategori_transaksi" class="col-form-label">
								Kategori
							</label>
							<select name="kategori_transaksi" class="form-control" required>
								<option value=""></option>
								<?php foreach ($kategori as $get) { ?>
									<option <?php if ($key['kategori_transaksi'] == $get['id_kategori']) {
												echo 'selected';
											} ?> value="<?= $get['id_kategori'] ?>"><?= $get['id_kategori'] ?> &ndash; <?= $get['nama_kategori'] ?></option>
								<?php } ?>
							</select>
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
<?php } ?>
<!-- End Modal Edit Transaksi -->

<script>
	<?php foreach ($transaksi as $key) { ?>
		var select_total<?= $key['id_transaksi'] ?> = document.getElementById('total_satuan_transaksi<?= $key['id_transaksi'] ?>');
		var total_transaksi<?= $key['id_transaksi'] ?> = document.getElementById('biaya_transaksi<?= $key['id_transaksi'] ?>');
		var total_biaya_transaksi<?= $key['id_transaksi'] ?> = document.getElementById('total_biaya_transaksi<?= $key['id_transaksi'] ?>');

		function get_harga<?= $key['id_transaksi'] ?>() {
			var select_item<?= $key['id_transaksi'] ?> = document.getElementById('list_harga<?= $key['id_transaksi'] ?>');
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
			total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.remove("text-info");
			total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.remove("text-danger");
			var total_satuan<?= $key['id_transaksi'] ?> = parseInt(select_total<?= $key['id_transaksi'] ?>.value) * parseInt(total_transaksi<?= $key['id_transaksi'] ?>.value);
			if (document.getElementById('negatif<?= $key['id_transaksi'] ?>').checked == true) {
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.value = parseInt(total_satuan<?= $key['id_transaksi'] ?>) * (-1);
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.remove("text-info");
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.add("text-danger");
			} else {
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.value = total_satuan<?= $key['id_transaksi'] ?>;
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.remove("text-danger");
				total_biaya_transaksi<?= $key['id_transaksi'] ?>.classList.add("text-info");
			}
		}
	<?php } ?>
</script>
