<!-- Modal tambah Cost Center-->
<div class="modal fade" id="tambahKontak" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Kontak Baru</h5>
			</div>
			<!-- TAMBAH METHOD -->
			<form action="<?= base_url('kontak/tambah') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_kontak" class="col-form-label">
							Nama
						</label>
						<input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Kontak" required>
					</div>
					<div class="form-group">
						<label for="alamat_kontak" class="col-form-label">
							Alamat
						</label>
						<input type="text" class="form-control form-control-sm" name="alamat" placeholder="Alamat Kontak" required>
					</div>
					<div class="form-group">
						<label for="no_telp" class="col-form-label">
							No. Telepon
						</label>
						<input type="text" class="form-control form-control-sm" name="telp" placeholder="No. Telepon" required>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-form-label">
							Keterangan
						</label>
						<input type="text" class="form-control form-control-sm" name="keterangan" placeholder="Keterangan" required>
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
