<?php foreach ($preferensi as $harga) { ?>
	<input type="hidden" value="<?= $harga['harga_preferensi'] ?>" id="harga<?= $harga['kode_preferensi'] ?>">
<?php } ?>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Menu Transaksi</h2>
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
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>No</th>
											<th>Cost Center</th>
											<th>Rincian</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
										$i = 1;
										foreach ($transaksi as $key) {
										?>
											<tr>
												<td><?= $i ?></td>
												<td class="text-left">
													<?= $key['kode_cc'] ?> &ndash; <?= $key['nama_cc'] ?>
												</td>
												<td>
													<a href="<?= base_url('transaksi/detail/' . $key['kode_cc']) ?>" class="text-decoration-none">
														<span class="fe fe-clipboard fe-16"></span> Lihat
													</a>
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
