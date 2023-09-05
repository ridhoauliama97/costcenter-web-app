<!-- Modal tambah Cost Center-->
<div class="modal fade" id="tambahCC" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Data Cost Center Baru</h5>
			</div>
			<!-- TAMBAH METHOD -->
			<form action="<?= base_url('dashboard/tambah') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode_cc" class="col-form-label">
							Kode Cost Center
						</label>
						<input type="text" class="form-control form-control-sm" name="kode_cc" id="kode_cc" placeholder="000 XX" style="text-transform: uppercase;" maxlength="8" required>
						<div id="regex" class="alert alert-danger py-1 mt-2 text-center d-none"><small>Karakter yang diizinkan: alphanumerik (A-Z, 0-9) dan spasi.</small></div>
					</div>
					<div class="form-group">
						<label for="nama_cc" class="col-form-label">
							Nama Cost Center
						</label>
						<input type="text" class="form-control form-control-sm" name="nama_cc" placeholder="Ex: SMA Negeri 2 Kumai" required>
					</div>
					<div class="form-group">
						<label for="mulai_cc" class="col-form-label">
							Tanggal Mulai
						</label>
						<input type="date" class="form-control form-control-sm" name="mulai_cc" required>
					</div>
					<div class="form-group">
						<label for="akhir_cc" class="col-form-label">
							Tanggal Berakhir
						</label>
						<input type="date" class="form-control form-control-sm" name="akhir_cc" required>
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


<script>
	$('#kode_cc').on('input keyup keydown', function() {
		var txt = $(this).val();
		var tes = /[^A-Za-z0-9\s]/gi.test(txt);
		if (tes) {
			$(this).addClass('border-danger');
			$('#regex').removeClass('d-none');
		} else {
			$(this).removeClass('border-danger');
			$('#regex').addClass('d-none');
		}
	});
</script>
