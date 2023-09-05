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
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100">
			<form class="needs-validation col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?= base_url('auth/proses_setup') ?>" method="post" novalidate>
				<h1 class="h2 mb-5">Pengaturan Akun Baru</h1>
				<div class="form-group">
					<input type="text" class="form-control" name="nama" placeholder="Nama lengkap Anda" id="validationCustom01" required>
					<!-- <div class="valid-feedback text-right">
							<span class="h6 text-success">OK</span>
						</div> -->
					<div class="invalid-feedback text-right">
						<span class="h6 text-danger">Kolom wajib diisi.</span>
					</div>
				</div>
				<div class="form-group">
					<select id="validationCustom04" class="form-control" name="pertanyaan1" required>
						<option selected disabled value="">Pertanyaan Keamanan 1</option>
						<?php foreach ($keamanan as $key) : ?>
							<option value="<?= $key['id'] ?>"><?= $key['string'] ?></option>
						<?php endforeach ?>
					</select>
					<!-- <div class="valid-feedback text-right">
							<span class="h6 text-success">OK</span>
						</div> -->
					<div class="invalid-feedback text-right">
						<span class="h6 text-danger">Kolom wajib diisi.</span>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="jawaban1" placeholder="Jawaban Anda" id="validationCustom01" required>
					<!-- <div class="valid-feedback text-right">
							<span class="h6 text-success">OK</span>
						</div> -->
					<div class="invalid-feedback text-right">
						<span class="h6 text-danger">Kolom wajib diisi.</span>
					</div>
				</div>
				<div class="form-group">
					<select id="validationCustom04" class="form-control" name="pertanyaan2" required>
						<option selected disabled value="">Pertanyaan Keamanan 2</option>
						<?php foreach ($keamanan as $key) : ?>
							<option value="<?= $key['id'] ?>"><?= $key['string'] ?></option>
						<?php endforeach ?>
					</select>
					<!-- <div class="valid-feedback text-right">
							<span class="h6 text-success">OK</span>
						</div> -->
					<div class="invalid-feedback text-right">
						<span class="h6 text-danger">Kolom wajib diisi.</span>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="jawaban2" placeholder="Jawaban Anda" id="validationCustom01" required>
					<!-- <div class="valid-feedback text-right">
							<span class="h6 text-success">OK</span>
						</div> -->
					<div class="invalid-feedback text-right">
						<span class="h6 text-danger">Kolom wajib diisi.</span>
					</div>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
			</form>
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
