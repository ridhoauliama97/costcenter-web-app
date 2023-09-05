<!-- Modal Tambah Transaksi-->
<div class="modal fade" id="tambahTransaksi" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Data Transaksi Baru</h5>
			</div>
			<form action="<?= base_url('transaksi/tambah') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode_cc" class="col-form-label">
							Cost Center
						</label>
						<select name="kode_cc" class="form-control" required>
							<option value=""></option>
							<?php foreach ($cc as $key) { ?>
								<option value="<?= $key['kode_cc'] ?>"><?= $key['kode_cc'] ?> &mdash; <?= $key['nama_cc'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="kode_preferensi" class="col-form-label">
							Preferensi
						</label>
						<select name="kode_preferensi" class="form-control" id="list_harga" onchange="get_harga()" required>
							<option value=""></option>
							<?php foreach ($preferensi as $get) { ?>
								<option value="<?= $get['kode_preferensi'] ?>"><?= $get['uraian_preferensi'] ?> per <?= $get['satuan_preferensi'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="no_faktur" class="col-form-label">
							No. Faktur
						</label>
						<input type="text" class="form-control" name="no_faktur" placeholder="Max. 24 karakter" required>
					</div>
					<div class="form-group">
						<label for="tanggal_faktur" class="col-form-label">
							Tanggal Faktur
						</label>
						<input type="date" class="form-control" name="tanggal_faktur" required>
					</div>
					<div class="form-group">
						<label for="biaya_transaksi" class="col-form-label">
							Biaya Transaksi
						</label>
						<input type="number" class="form-control" name="biaya_transaksi" id="biaya_transaksi" readonly required>
					</div>
					<div class="form-group">
						<label for="total_satuan_transaksi" class="col-form-label">
							Jumlah Satuan Transaksi
						</label>
						<input type="number" class="form-control" name="total_satuan_transaksi" id="total_satuan_transaksi" oninput="hitung_total()" min="0" placeholder="123" required>
					</div>
					<div class="form-group">
						<label for="total_biaya_transaksi" class="col-form-label">
							Total Biaya Transaksi
						</label>
						<input type="number" class="form-control" name="total_biaya_transaksi" id="total_biaya_transaksi" readonly required>
					</div>
					<div class="form-group">
						<input type="checkbox" class="" name="negatif" id="negatif" onclick="hitung_total()">
						<small>Nominal dalam bilangan negatif</small>
					</div>
					<div class="form-group">
						<label for="akun_transaksi" class="col-form-label">
							Akun Transaksi
						</label>
						<select name="akun_transaksi" class="form-control" required>
							<option value=""></option>
							<option value="1">Debit</option>
							<option value="2">Kredit</option>
						</select>
					</div>
					<div class="form-group">
						<label for="kategori_transaksi" class="col-form-label">
							Kategori
						</label>
						<select name="kategori_transaksi" class="form-control" required>
							<option value=""></option>
							<?php foreach ($kategori as $get) { ?>
								<option value="<?= $get['id_kategori'] ?>"><?= $get['id_kategori'] ?> &ndash; <?= $get['nama_kategori'] ?></option>
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
<!-- End Modal Tambah Transaksi -->

<script>
	var select_total = document.getElementById('total_satuan_transaksi');
	var total_transaksi = document.getElementById('biaya_transaksi');
	var total_biaya_transaksi = document.getElementById('total_biaya_transaksi');

	function get_harga() {
		var select_item = document.getElementById('list_harga');
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
		total_biaya_transaksi.classList.remove("text-info");
		total_biaya_transaksi.classList.remove("text-danger");
		var total_satuan = parseInt(select_total.value) * parseInt(total_transaksi.value);
		if (document.getElementById('negatif').checked == true) {
			total_biaya_transaksi.value = parseInt(total_satuan) * (-1);
			total_biaya_transaksi.classList.remove("text-info");
			total_biaya_transaksi.classList.add("text-danger");
		} else {
			total_biaya_transaksi.value = total_satuan;
			total_biaya_transaksi.classList.remove("text-danger");
			total_biaya_transaksi.classList.add("text-info");
		}
	}
</script>
