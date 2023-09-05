<!-- Modal Edot Preferensi-->
<?php foreach ($preferensi as $key) { ?>
	<div class="modal fade" id="editPreferensi<?= $key['kode_preferensi'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Preferensi</h5>
				</div>
				<form action="<?= base_url('preferensi/edit') ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="kode_preferensi" class="col-form-label">
								Kode Material
							</label>
							<input type="text" class="form-control form-control-sm" name="kode_preferensi" value="<?= str_pad($key['kode_preferensi'], 4, 0, STR_PAD_LEFT) ?>" readonly>
						</div>
						<div class="form-group">
							<label for="uraian_preferensi" class="col-form-label">
								Nama Material
							</label>
							<input type="text" class="form-control form-control-sm" name="uraian_preferensi" value="<?= $key['uraian_preferensi'] ?>" required>
						</div>
						<div class="form-group">
							<label for="kategori_preferensi" class="col-form-label">
								Kategori Pekerjaan
							</label>
							<select class="custom-select custom-select-sm" name="kategori_preferensi" required>
								<option value=""></option>
								<option <?= $key['kategori_preferensi'] == 'Civil Work' ? 'selected' : '' ?> value="Civil Work">Civil Work</option>
								<option <?= $key['kategori_preferensi'] == 'Mechanical Work' ? 'selected' : '' ?> value="Mechanical Work">Mechanical Work</option>
							</select>
						</div>
						<div class="form-group">
							<label for="satuan_preferensi" class="col-form-label">
								Satuan
							</label>
							<input type="text" class="form-control form-control-sm" name="satuan_preferensi" value="<?= $key['satuan_preferensi'] ?>" required>
						</div>
						<div class="form-group">
							<label for="harga_preferensi" class="col-form-label">
								Harga
							</label>
							<input type="number" class="form-control form-control-sm" name="harga_preferensi" value="<?= $key['harga_preferensi'] ?>" required>
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
<!-- End Modal Edit Preferensi -->
