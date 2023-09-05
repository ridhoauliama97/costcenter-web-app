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
				<div class="card shadow">
					<div class="card-body">
						<div class="col mb-3 text-center">
							<h5 class="card-title text-uppercase">Laporan Laba & Rugi</h5>
							<p class="card-text">[<?= $cc['kode_cc'] ?>] - <?= $cc['nama_cc'] ?> <br> <?= '(' . $format->date_full($cc['mulai_cc']) ?> &ndash; <?= $format->date_full($cc['akhir_cc']) . ')' ?></p>
						</div>
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
									<td class="itemTitle">Laba Bersih Sesudah Pajak</td>
									<td class="text-right"></td>
									<td class="text-right"></td>
									<td class="itemTitle text-right"><?= $format->account($laba_bersih) ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
