<?php
foreach ($kontak as $key) {
?>
	<!-- Modal Edit Kontak-->
	<div class="modal fade" id="editKontak<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Kontak</h5>
				</div>
				<form action="<?= base_url('kontak/ubah') ?>" method="post">
					<input type="hidden" name="id" value="<?= $key['id'] ?>">
					<div class="modal-body">
						<!-- Edit METHOD + VALUE -->
						<div class="form-group">
							<label for="nama_kontak" class="col-form-label">
								Nama
							</label>
							<input type="text" class="form-control form-control-sm" name="nama" value="<?= $key['nama'] ?>" required>
						</div>
						<div class="form-group">
							<label for="alamat_kontak" class="col-form-label">
								Alamat
							</label>
							<input type="text" class="form-control form-control-sm" name="alamat" value="<?= $key['alamat'] ?>" required>
						</div>
						<div class="form-group">
							<label for="no_telp" class="col-form-label">
								No. Telepon
							</label>
							<input type="text" class="form-control form-control-sm" name="telp" value="<?= $key['telp'] ?>" required>
						</div>
						<div class="form-group">
							<label for="keterangan" class="col-form-label">
								Keterangan
							</label>
							<input type="text" class="form-control form-control-sm" name="keterangan" value="<?= $key['keterangan'] ?>" required>
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
	<!-- End Modal Edit Kontak -->
<?php
}
?>
