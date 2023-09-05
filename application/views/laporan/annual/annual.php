<style>
	.itemTitle {
		font-weight: bold;
		text-align: left;
	}

	.subitemTitle {
		padding-left: 2em !important;
	}
</style>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Data Laporan Tahun <?= $tahun ?></h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col">
										<div class="dropdown">
										</div>
									</div>
								</div>
								<div class="card-body">
									<h5 class="card-title text-center">Laporan Laba & Rugi Tahun <?= $tahun ?></h5>
									<small class="text-info font-weight-bold"><i class="fe fe-info fe-16"></i> Klik nama Cost Center untuk melihat rincian.</small>
									<div class="w-100">
										<div class="row">
											<div class="col-12 col-lg-9 col-md-9" id="accordion">
												<?php
												$i = 1;
												foreach ($laporan as $key) {
													$cc = $this->CC_model->get_cc($key['kode_cc']);
													$p_dana = $this->Laporan_model->get_per_cc($key['kode_cc'], 1, 1);
													$p_bonus = $this->Laporan_model->get_per_cc($key['kode_cc'], 1, 2);
													$p_retur = $this->Laporan_model->get_per_cc($key['kode_cc'], 1, 3);
													$p_lainnya = $this->Laporan_model->get_per_cc($key['kode_cc'], 1, 4);
													$hpp = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 5);
													$b_gaji = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 6);
													$b_sekret = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 7);
													$b_komunikasi = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 8);
													$b_legalitas = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 9);
													$b_lainnya = $this->Laporan_model->get_per_cc($key['kode_cc'], 2, 10);
												?>
													<div class="card shadow mb-2">
														<a role="button" href="#collapse<?= $i ?>" id="heading<?= $i ?>" data-toggle="collapse" aria-expanded="false" class="card-header text-decoration-none">
															<strong class="float-left"><?= $key['nama_cc'] ?></strong>
															<strong class="float-right">[<?= $key['kode_cc'] ?>]</strong>
														</a>
														<div id="collapse<?= $i ?>" class="collapse" aria-labelledby="heading<?= $i ?>" data-parent="#accordion">
															<div class="card-body">
																<table class="table table-sm table-hover">
																	<tbody>
																		<tr>
																			<td class="itemTitle">Pendapatan</td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																		<!--  -->
																		<?php
																		$biaya = 0;
																		$laba_kotor = 0;
																		foreach ($p_dana as $pd) {
																			$biaya = $biaya + $pd['total_biaya_transaksi'];
																		}
																		$laba_kotor = $laba_kotor + $biaya;
																		?>
																		<tr>
																			<td class="subitemTitle">Pembayaran dana proyek</td>
																			<td class="text-right"></td>
																			<td class="text-right"><?= $format->account($biaya) ?></td>
																			<td class="text-right"></td>
																		</tr>
																		<!--  -->
																		<?php
																		$biaya = 0;
																		foreach ($p_bonus as $pd) {
																			$biaya = $biaya + $pd['total_biaya_transaksi'];
																		}
																		?>
																		<!--  -->
																		<?php
																		foreach ($p_retur as $pd) {
																			$biaya = $biaya + $pd['total_biaya_transaksi'];
																		}
																		?>
																		<!--  -->
																		<?php
																		foreach ($p_lainnya as $pd) {
																			$biaya = $biaya + $pd['total_biaya_transaksi'];
																		}
																		$laba_kotor = $laba_kotor + $biaya;
																		?>
																		<tr>
																			<td class="subitemTitle">Pendapatan lainnya</td>
																			<td class="text-right"></td>
																			<td class="text-right"><?= $format->account($biaya) ?></td>
																			<td class="text-right"></td>
																		</tr>


																		<?php
																		$biaya = 0;
																		foreach ($hpp as $hp) {
																			$biaya = $biaya + $hp['total_biaya_transaksi'];
																		}
																		$laba_kotor = $laba_kotor - $biaya;
																		?>
																		<tr>
																			<td class="itemTitle">Harga Pokok Produksi</td>
																			<td class="text-right"><?= $format->account($biaya) ?></td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																		</tr>


																		<tr>
																			<td class="itemTitle">Laba Kotor</td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="itemTitle text-right"><?= $format->account($laba_kotor) ?></td>
																		</tr>


																		<?php
																		$biaya = 0;
																		foreach ($b_gaji as $opr) {
																			$biaya = $biaya + $opr['total_biaya_transaksi'];
																		}
																		?>
																		<!--  -->
																		<?php
																		foreach ($b_sekret as $opr) {
																			$biaya = $biaya + $opr['total_biaya_transaksi'];
																		}
																		?>
																		<!--  -->
																		<?php
																		foreach ($b_komunikasi as $opr) {
																			$biaya = $biaya + $opr['total_biaya_transaksi'];
																		}
																		?>
																		<!--  -->
																		<?php
																		foreach ($b_legalitas as $opr) {
																			$biaya = $biaya + $opr['total_biaya_transaksi'];
																		}
																		$laba_kotor = $laba_kotor - $biaya;
																		?>
																		<tr>
																			<td class="itemTitle">Biaya Operasi</td>
																			<td class="text-right"><?= $format->account($biaya) ?></td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																		</tr>


																		<?php
																		$biaya = 0;
																		foreach ($b_lainnya as $bl) {
																			$biaya = $biaya + $bl['total_biaya_transaksi'];
																		}
																		$laba_kotor = $laba_kotor - $biaya;
																		?>
																		<tr>
																			<td class="itemTitle">Biaya Lainnya</td>
																			<td class="text-right"><?= $format->account($biaya) ?></td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																		</tr>


																		<tr>
																			<td class="itemTitle">Laba Bersih Sebelum Pajak</td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="itemTitle text-right"><?= $format->account($laba_kotor) ?></td>
																		</tr>


																		<?php
																		// MASIH PERTANYAAN
																		if ($laba_kotor > 0) {
																			$pajak = floor($laba_kotor * 10 / 100);
																			$laba_bersih = $laba_kotor - $pajak;
																		} else {
																			$laba_bersih = $laba_kotor;
																		}
																		?>
																		<tr>
																			<td class="itemTitle">Laba Bersih</td>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="itemTitle text-right"><?= $format->account($laba_bersih) ?></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												<?php
													${'laba_bersih_' . $i} = $laba_bersih;
													$i++;
												}
												?>
											</div>
											<div class="col-12 col-lg-3 col-md-3">
												<div class="card shadow">
													<div class="card-header">
														<strong>Laba Bersih</strong>
													</div>
													<div class="card-body">
														<?php
														$i = 1;
														$total_pajak = 0;
														foreach ($laporan as $key) {
														?>
															<div class="row">
																<div class="col-12">
																	<h6><?= $key['kode_cc'] ?></h6>
																	<?php
																	$laba = $format->account(${'laba_bersih_' . $i});
																	$total_pajak = $total_pajak + ${'laba_bersih_' . $i};
																	?>
																	<p class="float-right"><?= $laba ?></p>
																</div>
															</div>
														<?php
															$i++;
														}
														?>
													</div>
													<div class="card-footer">
														<h6>TOTAL</h6>
														<?php
														$str_total_pajak = $format->account($total_pajak);
														?>
														<span class="float-right"><?= $str_total_pajak ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
