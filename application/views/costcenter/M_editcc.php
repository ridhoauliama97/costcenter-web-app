<!-- Modal Edit Cost Center-->
<?php foreach ($cc as $key) { ?>
	<div class="modal fade" id="editCC<?= str_replace(' ', '_', $key['kode_cc']) ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Cost Center</h5>
				</div>
				<form action="<?= base_url('dashboard/edit') ?>" method="post">
					<div class="modal-body">
						<!-- Edit METHOD + VALUE -->
						<div class="form-group">
							<label for="kode_cc" class="col-form-label">
								Kode Cost Center
							</label>
							<input type="text" class="form-control form-control-sm" name="kode_cc" value="<?= $key['kode_cc'] ?>" readonly required>
						</div>
						<div class="form-group">
							<label for="nama_cc" class="col-form-label">
								Nama Cost Center
							</label>
							<input type="text" class="form-control form-control-sm" name="nama_cc" value="<?= $key['nama_cc'] ?>" required>
						</div>
						<div class="form-group">
							<label for="mulai_cc" class="col-form-label">
								Tanggal Mulai
							</label>
							<input type="date" class="form-control form-control-sm" name="mulai_cc" value="<?= $key['mulai_cc'] ?>" required>
						</div>
						<div class="form-group">
							<label for="akhir_cc" class="col-form-label">
								Tanggal Berakhir
							</label>
							<input type="date" class="form-control form-control-sm" name="akhir_cc" value="<?= $key['akhir_cc'] ?>" required>
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
<!-- End Modal Edit Cost Center -->
