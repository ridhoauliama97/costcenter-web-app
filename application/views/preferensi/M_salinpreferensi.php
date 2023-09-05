<!-- Modal Tambah Preferensi -->
<div class="modal fade" id="salinPreferensi" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="min-width: 60%">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyModalLabel">Salin Data Preferensi</h5>
			</div>
			<form action="<?= base_url('preferensi/salin') ?>" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-4">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<?php
								foreach ($cc as $key) {
									if ($key['kode_cc'] != str_replace('%20', ' ', $this->session->userdata('costcenter'))) {
								?>
										<a class="nav-link" id="v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>-tab" data-toggle="pill" href="#v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>" role="tab" aria-controls="v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>" aria-selected="true">
											<?= $key['nama_cc'] ?>
										</a>
										<input type="radio" id="kode_<?= str_replace(' ', '-',  $key['kode_cc']) ?>" name="kode_cc" class="kode_cc" value="<?= $key['kode_cc'] ?>" hidden>
								<?php
									}
								}
								?>
							</div>
						</div>
						<div class="col-8 border-left" style="height: 50vh; overflow-y: auto">
							<div class="tab-content" id="v-pills-tabContent">
								<?php foreach ($cc as $key) { ?>
									<?php if ($key['kode_cc'] != str_replace('%20', ' ', $this->session->userdata('costcenter'))) { ?>
										<div class="tab-pane fade" id="v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>" role="tabpanel" aria-labelledby="v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>-tab">
											<small class="text-info">Klik harga untuk merubah harga</small>
											<?php
											$i = 0;
											foreach ($all_pref as $get) {
												if ($get['costcenter'] == $key['kode_cc']) {
											?>
													<div class="custom-control custom-checkbox py-1">
														<input type="checkbox" class="custom-control-input pref_check" name="pref_<?= $get['kode_preferensi'] ?>" id="pref_<?= $get['kode_preferensi'] ?>" value="1">
														<label class="custom-control-label row m-0" for="pref_<?= $get['kode_preferensi'] ?>">
															<div class="col-6 text-left px-0">
																<?= $get['uraian_preferensi'] ?>
																<input type="hidden" name="preferensi_<?= $get['kode_preferensi'] ?>" value="<?= $get['kode_preferensi'] ?>">
															</div>
															<div class="col-6 text-right px-0">
																<input type="number" name="harga_<?= $get['kode_preferensi'] ?>" value="<?= $get['harga_preferensi'] ?>" class="border-0 text-right d-inline" style="max-width: 35%">
																/
																<?= $get['satuan_preferensi'] ?>
															</div>
														</label>
													</div>
											<?php
													$i++;
												}
											}
											if ($i == 0) {
												echo '<p class="text-secondary"><i>Data Kosong</i></p>';
											}
											?>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn mb-2 btn-primary">Salin dari <span id="nama_cc">CC</span></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal Tambah Preferensi -->

<script>
	<?php
	foreach ($cc as $key) {
		if ($key['kode_cc'] != str_replace('%20', ' ', $this->session->userdata('costcenter'))) {
	?>
			$('#v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>-tab').on("click", function() {
				var nama_cc = $('#v-pills-<?= str_replace(' ', '-',  $key['kode_cc']) ?>-tab');
				$('.kode_cc').attr('checked', false);
				$('#kode_<?= str_replace(' ', '-',  $key['kode_cc']) ?>').attr('checked', true);
				$('#nama_cc').html(nama_cc.html());
			});
	<?php
		}
	}
	?>
</script>
