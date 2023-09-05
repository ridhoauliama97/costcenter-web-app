<body class="light">
	<div class="wrapper vh-100">
		<div class="align-items-center h-100 d-flex w-50 mx-auto">
			<div class="mx-auto text-center">
				<div class="mb-5">
					<img src="<?= base_url('assets/images/icons/error.svg') ?>" alt="" width="100%">
				</div>
				<h1 class="mb-1 text-secondary">404 - Halaman Tidak Ditemukan</h1>
				<p class="text-small text-muted font-weight-bold">Alamat <span class="text-info"><?= $_SERVER['REQUEST_URI'] ?></span> tidak ada atau mungkin pindah ke alamat lain.</p>
				<a href="<?= base_url('dashboard') ?>" class="btn btn-lg btn-primary px-5"> Kembali ke Dashboard</a>
			</div>
		</div>
	</div>
