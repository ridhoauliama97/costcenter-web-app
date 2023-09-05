<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url('assets/images/favicon/apple-touch-icon.png') ?>" type="images/png">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon/apple-touch-icon.png') ?>" type="images/png">
	<title><?= $title ?></title>
	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/simplebar.css') ?>">
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
	<div class="card-body py-0">
		<div class="wrapper vh-100">
			<div class="row align-items-center h-100">
				<form class="needs-validation col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?= base_url('auth/proses_reset') ?>" method="post" novalidate>
					<div class="mx-auto text-center my-4">
						<img src="<?= base_url('assets/images/icons/logo.png') ?>" alt="" class="my-3">
						<h2 class="my-3 text-uppercase">Reset Password</h2>
					</div>
					<p class="text-muted">Kami hanya ingin memastikan Anda benar-benar pemilik akun ini.</p>
					<br>
					<div class="form-group">
						<?= $q1 ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="jawaban1" placeholder="Jawaban Anda" value="<?= $this->session->flashdata('jawab1') ?>" required>
						<div class="invalid-feedback text-right">
							<span class="h6 text-danger">Kolom wajib diisi.</span>
						</div>
					</div>
					<br>
					<div class="form-group">
						<?= $q2 ?>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="jawaban2" placeholder="Jawaban Anda" value="<?= $this->session->flashdata('jawab2') ?>" required>
						<div class="invalid-feedback text-right">
							<span class="h6 text-danger">Kolom wajib diisi.</span>
						</div>
					</div>
					<!-- $this->session->flashdata('error_reset') -->
					<?= $this->session->flashdata('error_jawab') ?>
					<?php $this->session->unset_userdata('error_jawab') ?>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
					<h6 class="mt-3 mb-3 text-left">
						<a href="<?= base_url('auth/login') ?>" style="text-decoration: none;">
							<span class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></span>
							Halaman Sebelumnya
						</a>
					</h6>
					<h6 class="mt-5 mb-3 text-center">&copy; Copyright 2021 &mdash; CV. Pelita Karya Sejahtera</h6>
				</form>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/simplebar.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/daterangepicker.js') ?> "></script>
	<script src="<?= base_url('assets/js/jquery.stickOnScroll.js') ?>"></script>
	<script src="<?= base_url('assets/js/tinycolor-min.js') ?>"></script>
	<script src="<?= base_url('assets/js/config.js') ?> "></script>
	<script src="<?= base_url('assets/js/d3.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/topojson.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps.all. min.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps-zoomto.js') ?>"></script>
	<script src="<?= base_url('assets/js/datamaps.custom.js') ?>"></script>
	<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
	<script>
		/* defind global options */
		Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
		Chart.defaults.global.defaultFontColor = colors.mutedColor;
	</script>
	<script src="<?= base_url('assets/js/gauge.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.sparkline. min.js') ?>"></script>
	<script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/apexcharts.custom.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.mask. min.js') ?>"></script>
	<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.steps. min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.validate. min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.timepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/dropzone.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/uppy.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/quill.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script>
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				var forms = document.getElementsByClassName('needs-validation');
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	<script src="<?= base_url('assets/js/apps.js') ?>"></script>

</body>

</html>
