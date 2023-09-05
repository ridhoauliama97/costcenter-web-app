<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2 class="h3 mb-4 page-title">Profil Saya</h2>
				<div class="row mt-5 align-items-center">
					<div class="col-md-3 text-center mb-5">
						<div class="avatar avatar-xl">
							<img src="<?= base_url('assets/images/avatar/profile-pic.jpg') ?>" alt="..." class="avatar-img rounded-circle">
						</div>
					</div>
					<div class="col">
						<div class="row align-items-center">
							<div class="col-md-7">
								<h4 class="mb-1">Nama_Pengguna</h4>
								<p class="small mb-3"><span class="badge badge-dark">Role &mdash; CV. Pelita Karya Sejahtera</span></p>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-md-7">
								<p class="text"> Keterangan Pengguna (Jobdesk, etc) </p>
							</div>
							<div class="col">
								<p class="small mb-0 text">Jabatan </p>
								<p class="small mb-0 text">Alamat</p>
								<p class="small mb-0 text">No. Handphone</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-4">
					<div class="col-md-4">
						<div class="card mb-4 shadow">
							<div class="card-body my-n3">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-lg bg-light">
											<i class="fe fe-user fe-24 text-primary"></i>
										</span>
									</div> <!-- .col -->
									<div class="col">
										<a href="<?= base_url('akun/informasi_pribadi') ?>" style="text-decoration:none;">
											<h3 class="h5 mt-4 mb-1">Informasi Pribadi</h3>
											<p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.</p>
										</a>
									</div> <!-- .col -->
								</div> <!-- .row -->
							</div> <!-- .card-body -->
							<div class="card-footer">
								<a href="<?= base_url('akun/informasi_pribadi') ?>" class="d-flex justify-content-between text-secondary" style="text-decoration: none">
									<span>Lihat informasi pribadi</span><i class="fe fe-chevron-right"></i>
								</a>
							</div> <!-- .card-footer -->
						</div> <!-- .card -->
					</div> <!-- .col-md-->
					<div class="col-md-4">
						<div class="card mb-4 shadow">
							<div class="card-body my-n3">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-lg bg-light">
											<i class="fe fe-settings fe-24 text-primary"></i>
										</span>
									</div> <!-- .col -->
									<div class="col">
										<a href="<?= base_url('akun/pengaturan') ?>" style="text-decoration:none;">
											<h3 class="h5 mt-4 mb-1">Pengaturan</h3>
											<p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.</p>
										</a>
									</div> <!-- .col -->
								</div> <!-- .row -->
							</div> <!-- .card-body -->
							<div class="card-footer">
								<a href="<?= base_url('akun/pengaturan') ?>" class="d-flex justify-content-between text-secondary" style="text-decoration: none">
									<span>Pengaturan Keamanan & Privasi</span><i class="fe fe-chevron-right"></i>
								</a>
							</div> <!-- .card-footer -->
						</div> <!-- .card -->
					</div> <!-- .col-md-->
					<div class="col-md-4">
						<div class="card mb-4 shadow">
							<div class="card-body my-n3">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-lg bg-light">
											<i class="fe fe-bell fe-24 text-primary"></i>
										</span>
									</div> <!-- .col -->
									<div class="col">
										<a href="<?= base_url('akun/notifikasi') ?>" style="text-decoration:none;">
											<h3 class="h5 mt-4 mb-1">Notifikasi</h3>
											<p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.</p>
										</a>
									</div> <!-- .col -->
								</div> <!-- .row -->
							</div> <!-- .card-body -->
							<div class="card-footer">
								<a href="<?= base_url('akun/notifikasi') ?>" class="d-flex justify-content-between text-secondary" style="text-decoration: none">
									<span>Lihat semua notifikasi</span><i class="fe fe-chevron-right"></i>
								</a>
							</div> <!-- .card-footer -->
						</div> <!-- .card -->
					</div> <!-- .col-md-->
				</div> <!-- .row-->
			</div> <!-- /.col-12 -->
		</div> <!-- .row -->
	</div>
</main>
