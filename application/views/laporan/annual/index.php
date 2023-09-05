<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="mb-2 page-title">Laporan Laba & Rugi Per Tahun</h2>
				<p class="card-text"></p>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<?php
								$tahun = 0;
								$tahun_max = $max;
								$bg_card = 'bg-primary text-white';
								$bg_icon = 'bg-primary-light';
								$col_tahun = 'text-light';
								$col_angka = 'text-white';
								?>
								<div class="row">
									<?php
									for ($i = 0; $i < $laporan; $i++) {
										$tahun = (int)$max - $i;
									?>
										<div class="col-md-6 col-xl-3 mb-4">
											<div class="card shadow <?= $bg_card ?>">
												<div class="card-body">
													<a href="<?= base_url('laporan/annual/' . $tahun) ?>" class="text-decoration-none">
														<div class="row align-items-center">
															<div class="col-3 text-center">
																<span class="circle circle-sm <?= $bg_icon ?>">
																	<i class="fe fe-16 fe-calendar text-white mb-0"></i>
																</span>
															</div>
															<div class="col pr-0">
																<p class="small <?= $col_tahun ?> mb-0">Tahun</p>
																<span class="h3 mb-0 <?= $col_angka ?>"><?= $tahun ?></span>
															</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php
										$bg_card = '';
										$bg_icon = 'bg-primary';
										$col_tahun = 'text-muted';
										$col_angka = '';
									}
									?>
								</div> <!-- end section -->
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main> <!-- main -->
