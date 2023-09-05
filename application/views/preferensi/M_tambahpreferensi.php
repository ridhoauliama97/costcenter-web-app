<!-- Modal Tambah Preferensi -->
<div class="modal fade" id="tambahPreferensi" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Data Preferensi Baru</h5>
			</div>
			<form action="<?= base_url('preferensi/tambah') ?>" method="post">
				<div class="modal-body">
					<input type="hidden" class="form-control form-control-sm" name="kode_preferensi" value="<?= str_pad($max_id, 4, 0, STR_PAD_LEFT) ?>" readonly>
					<div class="form-group">
						<label for="uraian_preferensi" class="col-form-label">
							Nama Material
						</label>
						<input type="text" class="form-control form-control-sm" name="uraian_preferensi" placeholder="Semen, Pipa, Mesin, dll." required>
					</div>
					<div class="form-group">
						<label for="uraian_preferensi" class="col-form-label">
							Kategori Pekerjaan
						</label>
						<select class="custom-select custom-select-sm" name="kategori_preferensi" required>
							<option value=""></option>
							<option value="Civil Work">Civil Work</option>
							<option value="Mechanical Work">Mechanical Work</option>
						</select>
					</div>
					<div class="form-group">
						<label for="satuan_preferensi" class="col-form-label">
							Satuan
						</label>
						<input type="text" class="form-control form-control-sm" name="satuan_preferensi" placeholder="kg, meter, batang, orang, dsb." required>
					</div>
					<div class="form-group">
						<label for="harga_preferensi" class="col-form-label">
							Harga Material
						</label>
						<input type="number" class="form-control form-control-sm" name="harga_preferensi" placeholder="123456" min="0" required>
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
<!-- End Modal Tambah Preferensi -->
