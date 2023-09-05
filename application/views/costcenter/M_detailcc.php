<!-- Modal Detail Cost Center -->
<?php foreach ($cc as $key) { ?>
	<div class="modal fade" id="detailCC<?= str_replace(' ', '_', $key['kode_cc']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Detail <?= $key['kode_cc'] ?></h5>
				</div>
				<div class="modal-body">
					<!-- TAMBAH METHOD + VALUE -->
					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Kode Cost Center
							<span class="badge badge-primary badge-pill"><?= $key['kode_cc'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Nama Cost Center
							<span class="badge badge-primary badge-pill"><?= $key['nama_cc'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Tanggal Mulai
							<span class="badge badge-primary badge-pill"><?= $format->date(($key['mulai_cc'])) ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Tanggal Berakhir
							<span class="badge badge-primary badge-pill"><?= $format->date(($key['akhir_cc'])) ?></span>
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
<!-- End Modal Detail Transaksi -->
