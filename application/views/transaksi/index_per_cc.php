<?php foreach ($preferensi as $harga) { ?>
	<input type="hidden" value="<?= $harga['harga_preferensi'] ?>" id="harga<?= $harga['kode_preferensi'] ?>">
<?php } ?>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Menu Transaksi <?= $id ?></h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('transaksi_alert') ?>
						<?php $this->session->unset_userdata('transaksi_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="toolbar row mb-3">
									<div class="col">
										<div class="dropdown">
											<a href="#" class="btn btn-primary ml-2 d-md-table" data-toggle="modal" data-target="#tambahTransaksi">
												<i class="fe fe-plus" aria-hidden="true"></i>&nbsp; Tambah Transaksi
											</a>
										</div>
									</div>
								</div>
								<!-- table -->
								<table class="table datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>No</th>
											<th>Preferensi</th>
											<th>Uraian</th>
											<th>Total Biaya</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$i = 1;
										foreach ($transaksi as $key) {
										?>
											<tr>
												<td><?= $i ?></td>
												<td><?= str_pad($key['kode_preferensi'], 4, 0, STR_PAD_LEFT) ?></td>
												<td class="text-left"><?= $key['uraian_preferensi'] ?></td>
												<?php
												$total = $format->currency($key['total_biaya_transaksi']);
												if (substr($total, 0, 1) == '-') {
													$total = '-Rp.' . substr($total, 1);
												} else {
													$total = 'Rp.' . substr($total, 0);
												}
												?>
												<td class="text-right">
													<?= $total ?>
												</td>
												<td>
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text sr-only">...</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#detailTransaksi<?= $key['id_transaksi'] ?>"><span class="fe fe-clipboard fe-16"></span> Detail
														</a>
														<a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editTransaksi<?= $key['id_transaksi'] ?>"><span class="fe fe-edit fe-16"></span>
															Ubah
														</a>
														<a class="dropdown-item text-danger" href="<?= base_url('transaksi/hapus/') . $key['id_transaksi']; ?>" onclick="return confirm('Data akan dihapus secara permanen. Lanjutkan?');">
															<span class="fe fe-trash-2 fe-16"></span> Hapus
														</a>
													</div>
												</td>
											</tr>
										<?php
											$i++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main>
