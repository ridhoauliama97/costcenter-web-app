<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Laporan Laba & Rugi Per Cost Center</h2>
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
								<!-- table -->
								<table class="table table-sm datatables" id="dataTable-1">
									<thead class="thead-dark text-center">
										<tr>
											<!-- <th></th> -->
											<th>Kode Cost Center</th>
											<th>Nama Cost Center</th>
											<th>Tanggal Mulai</th>
											<th>Tanggal Berakhir</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php foreach ($laporan as $key) { ?>
											<tr>
												<td><?= $key['kode_cc'] ?></td>
												<td><?= $key['nama_cc'] ?></td>
												<td><?= $format->date($key['mulai_cc']) ?></td>
												<td><?= $format->date($key['akhir_cc']) ?></td>
												<td>
													<a class="btn btn-primary btn-sm" href="<?= base_url('laporan/individual/' . $key['kode_cc']) ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>
														Lihat
													</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main> <!-- main -->
