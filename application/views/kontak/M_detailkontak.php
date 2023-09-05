<?php
foreach ($kontak as $key) {
?>
	<!-- Modal Detail Kontak -->
	<div class="modal fade" id="detailKontak<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verticalModalTitle">Detail Kontak - <?= $key['nama'] ?></h5>
				</div>
				<div class="modal-body">
					<!-- TAMBAH METHOD + VALUE -->
					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Nama
							<span class="badge badge-primary badge-pill"><?= $key['nama'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Alamat
							<span class="badge badge-primary badge-pill"><?= $key['alamat'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							No. Telepon
							<span class="badge badge-primary badge-pill"><?= $key['telp'] ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Keterangan
							<span class="badge badge-primary badge-pill"><?= $key['keterangan'] ?></span>
						</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Detail Transaksi -->
<?php
}
?>
