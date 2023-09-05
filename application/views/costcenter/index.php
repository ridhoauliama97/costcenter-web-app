<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Akun Cost Center</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<?= $this->session->flashdata('cc_alert') ?>
						<?php $this->session->unset_userdata('cc_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-xl-3 mb-4">
										<a class="card shadow bg-primary text-decoration-none">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col pr-0">
														<span class="h6 mb-0 text-white">Kas Proyek</span>
														<p class="small text-light mb-0 font-weight-bold"><?= $format->currency($saldo_proyek) ?></p>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-12 col-xl-3 mb-4">
										<div class="card shadow btn-outline-light">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col pr-0">
														<span class="h6 mb-0 text-primary">Pendapatan</span>
														<p class="small text-secondary mb-0"><?= $format->currency($saldo_pendapatan) ?></p>
													</div>
													<div class="col-3 text-center">
														<a href="#" class="circle circle-sm bg-primary-light text-decoration-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fe fe-16 fe-chevron-down text-white mb-0"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/pendapatan/dana_proyek') ?>">
																Pembayaran Dana Proyek
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/pendapatan/bonus') ?>">
																Bonus
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/pendapatan/retur') ?>">
																Retur
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/pendapatan/lainnya') ?>">
																Lain-lain
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-xl-3 mb-4">
										<div class="card shadow btn-outline-light">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col pr-0">
														<span class="h6 mb-0 text-primary">Beban / Biaya</span>
														<p class="small text-secondary mb-0"><?= $format->currency($saldo_beban) ?></p>
													</div>
													<div class="col-3 text-center">
														<a href="#" class="circle circle-sm bg-warning-light text-decoration-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fe fe-16 fe-chevron-down text-white mb-0"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/material') ?>">
																Pembelian Bahan
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/gaji_upah') ?>">
																Gaji dan Upah
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/kesekretariatan') ?>">
																Kesekretariatan
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/komunikasi_transportasi') ?>">
																Komunikasi dan Transportasi
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/legalitas') ?>">
																Legalitas
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/beban/lainnya') ?>">
																Lain-lain
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-xl-3 mb-4">
										<div class="card shadow btn-outline-light">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col pr-0">
														<span class="h6 mb-0 text-primary">Tertunda</span>
														<p class="small text-secondary mb-0"><?= $tertunda ?></p>
													</div>
													<div class="col-3 text-center">
														<a href="#" class="circle circle-sm bg-danger-light text-decoration-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fe fe-16 fe-chevron-down text-white mb-0"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/tertunda/hutang') ?>">
																Hutang
															</a>
															<a class="dropdown-item mb-1" href="<?= base_url('costcenter/tertunda/piutang') ?>">
																Piutang
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .card -->
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main>
