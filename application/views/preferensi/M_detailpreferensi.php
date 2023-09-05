<!-- Modal Detail Preferensi -->
<?php foreach ($preferensi as $key) { ?>
	<div class="modal fade" id="detailPreferensi<?= $key['kode_preferensi'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Detail Data Preferensi <?= str_pad($key['kode_preferensi'], 6, 0, STR_PAD_LEFT) ?> </h5>
				</div>
				<div class="modal-body">
					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Kode Material
							<span class="badge badge-primary badge-pill"><?= str_pad($key['kode_preferensi'], 6, 0, STR_PAD_LEFT) ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Nama Material
							<span class="badge badge-primary badge-pill"><?= $key['uraian_preferensi'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Kategori Pekerjaan
							<span class="badge badge-primary badge-pill"><?= $key['kategori_preferensi'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Satuan Material
							<span class="badge badge-primary badge-pill"><?= $key['satuan_preferensi'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Harga Material
							<span class="badge badge-primary badge-pill"><?= $format->currency($key['harga_preferensi']) ?></span>
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
<!-- End Modal Detail Preferensi -->
