<!-- Modal tambah Cost Center-->
<?php foreach ($cc as $key) { ?>
	<div class="modal fade" id="progresCC<?= str_replace(' ', '_', $key['kode_cc']) ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Data Progres Cost Center</h5>
					<h5><?= $key['kode_cc'] ?></h5>
				</div>
				<!-- TAMBAH METHOD -->
				<form action="<?= base_url('dashboard/update_progres') ?>" method="post">
					<div class="modal-body">
						<input type="hidden" name="kode_cc" value="<?= $key['kode_cc'] ?>" readonly>
						<div class="form-group">
							<label for="mulai_cc" class="col-form-label">
								Tanggal
							</label>
							<input type="date" class="form-control form-control-sm" name="tanggal" value="<?= date('d-m-Y') ?>" required>
						</div>
						<div class="form-group">
							<label for="keterangan" class="col-form-label">
								Keterangan
							</label>
							<input type="text" class="form-control form-control-sm" name="keterangan" required>
						</div>
						<div class="form-group">
							<label for="progres_cc" class="col-form-label">
								Progres
							</label>
							<input type="range" id="progres_cc" class="custom-range custom-range-sm" name="progres_cc" value="<?= $key['progres_cc'] ?>" min="0" max="100" step="1" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Saat ini: <?= $key['progres_cc'] ?>%" required>
							<div class="row">
								<div class="col-4 text-left"><small>0%</small></div>
								<div class="col-4 text-center"><small id="progres_val"><?= $key['progres_cc'] ?>%</small></div>
								<div class="col-4 text-right"><small>100%</small></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?= base_url() ?>dashboard/detail_progres/<?= $key['kode_cc'] ?>" class="btn mb-2 btn-info mr-auto">Detail Progres</a>
						<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn mb-2 btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
<!-- End Modal Tambah Cost Center -->


<script>
	$('#progres_cc').on('input keyup keydown', function() {
		var val = $('#progres_val');
		val.text($(this).val() + '%');
	});
</script>
