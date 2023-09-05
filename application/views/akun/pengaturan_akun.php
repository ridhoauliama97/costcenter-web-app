<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10 col-xl-8">
				<h2 class="h3 mb-4 page-title">Pengaturan Akun</h2>
				<div class="row">
					<div class="col-md-12 mb-4">
						<?= $this->session->flashdata('akun_alert') ?>
						<?php $this->session->unset_userdata('akun_alert') ?>
						<div class="card shadow">
							<div class="card-body">
								<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">Ubah Password</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pertanyaan_keamanan-tab" data-toggle="tab" href="#pertanyaan_keamanan" role="tab" aria-controls="pertanyaan_keamanan" aria-selected="false">Pertanyaan Keamanan</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
										<form action="<?= base_url('akun/ubah_password') ?>" method="post">
											<input type="hidden" name="username" value="<?= $akun['username'] ?>">
											<div class="col-md-12 mb-4">
												<div class="form-group">
													<label for="inputPassword4">Password Lama</label>
													<input type="password" class="form-control form-control-sm" id="pl" name="pl" required>
												</div>
												<div class="form-group">
													<label for="inputPassword5">Password Baru</label>
													<input type="password" class="form-control form-control-sm" id="pb1" name="pb1" required>
												</div>
												<div class="form-group">
													<label for="inputPassword6">Konfirmasi Password</label>
													<input type="password" class="form-control form-control-sm" id="pb2" name="pb2" required>
												</div>
												<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="pertanyaan_keamanan" role="tabpanel" aria-labelledby="pertanyaan_keamanan-tab">
										<form action="<?= base_url('akun/ubah_pertanyaan') ?>" method="post">
											<div class="col-md-12 mb-4">
												<input type="hidden" name="username" value="<?= $akun['username'] ?>">
												<div class="div mb-0">
													<h5>Pertanyaan Kemanan 1</h5>
												</div>
												<div class="form-group">
													<label for="keamanan_1">Pilih Pertanyaan </label>
													<select class="form-control form-control-sm" id="keamanan_1" name="keamanan_1" required>
														<option value=""></option>
														<?php foreach ($q as $key) { ?>
															<option value="<?= $key['id'] ?>" <?php
																																if ($key['id'] == $q1) {
																																	echo 'selected';
																																}
																																?>>
																<?= $key['string'] ?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label for="jawaban_1">Jawaban</label>
													<input type="text" class="form-control form-control-sm" id="jawaban_1" name="jawaban_1" required>
												</div>
												<div class="div mt-4">
													<h5>Pertanyaan Kemanan 2</h5>
												</div>
												<div class="form-group">
													<label for="keamanan_2">Pilih Pertanyaan </label>
													<select class="form-control form-control-sm" id="keamanan_2" name="keamanan_2" required>
														<option value=""></option>
														<?php foreach ($q as $key) { ?>
															<option value="<?= $key['id'] ?>" <?php
																																if ($key['id'] == $q2) {
																																	echo 'selected';
																																}
																																?>>
																<?= $key['string'] ?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label for="jawaban_1">Jawaban</label>
													<input type="text" class="form-control form-control-sm" id="jawaban_2" name="jawaban_2" required>
												</div>

												<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
											</div>
										</form>
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
