<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- <link rel="icon" href="<?= base_url('assets/images/icons/favicon.ico') ?>" /> -->
	<link rel="icon" href="<?= base_url('assets/images/favicon/favicon.ico') ?>" type="images/x-icon">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon/favicon.ico') ?>" type="images/x-icon">
	<title><?= $title ?></title>
	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/simplebar.css') ?>">
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/feather.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/select2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/dropzone.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/uppy.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/jquery.steps.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/jquery.timepicker.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.css') ?>">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/daterangepicker.css') ?>">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/app-light.css') ?>" id="lightTheme">
	<link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css') ?>" id="darkTheme" disabled>
</head>

<body class="light">
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100 m-0">
			<form class="col-lg-6 col-md-8 col-10 mx-auto" action="<?= base_url('auth/proses_daftar') ?>" method="post">
				<div class="mx-auto text-center my-4">
					<img src="<?= base_url('assets/images/icons/logo.png') ?>" alt="" class="my-3">
					<h3 class="my-3">Pendaftaran Akun Baru</h3>
					<?= $this->session->flashdata('error_login') ?>
					<?= $this->session->unset_userdata('error_login') ?>
				</div>
				<div class="row mt-5 mb-4">
					<div class="col-md-6 col-sm-12 ">
						<div class="form-group">
							<input class="form-control" type="text" name="kode" placeholder="Input Kode Pendaftaran" value="<?= $kode ?>" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="password2" placeholder="Konfirmasi Password" required>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 align-items-center">
						<h5 class="mb-2 font-weight-bold">Informasi tentang Pendaftaran Akun</h5>
						<ul class="small text-secondary pl-4 mb-0">
							<li>Mohon untuk mengingat Username dan Password Anda.</li>
							<li>Jangan bagikan Username atau Password Anda ke orang lain.</li>
							<li>Dengan menekan tombol <strong>Daftar</strong>, berarti Anda menyetujui Persyaratan dan Kebijakan Data dari CV. Pelita Karya Sejahtera.</li>
						</ul>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Daftar</button>
				<h6 class="mt-5 mb-3 text-center">&copy; Copyright 2021 &mdash; CV. Pelita Karya Sejahtera</h6>
			</form>
		</div>
	</div>
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/simplebar.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/daterangepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.stickOnScroll.js') ?>"></script>
	<script src="<?= base_url('assets/js/tinycolor-min.js') ?>"></script>
	<script src="<?= base_url('assets/js/config.js') ?>"></script>
	<script src="<?= base_url('assets/js/d3.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/topojson.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps.all.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps-zoomto.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps.custom.js') ?>"></script>
	<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
	<script>
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="<?= base_url('assets/js/gauge.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.sparkline.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/apexcharts.custom.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.steps.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.timepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/dropzone.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/uppy.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/quill.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/apps.js') ?>"></script>
</body>

</html>
