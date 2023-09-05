<!doctype html>
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
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/feather.css') ?>">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/daterangepicker.css') ?>">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/app-light.css') ?>" id="lightTheme">
	<link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css') ?>" id="darkTheme" disabled>
</head>

<body class="light ">
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100 text-center m-0">
			<?= form_open(base_url('auth/proses_login'), 'class="col-lg-3 col-md-4 col-10 mx-auto"') ?>
			<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
					<image id="image0" width="60" height="60" x="0" y="0" href="data:image/png;base64,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" />
				</svg>
			</a>
			<p class="h4 mt-2">Aplikasi Cost Center </p>
			<?= $this->session->flashdata('error_login') ?>
			<span class="text-sm"> Silahkan masukkan Username dan Password Anda untuk melanjutkan.</span>
			<div class="form-group mt-3">
				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" value="<?= $this->session->flashdata('username') ?>" required="" autofocus="">
			</div>
			<div class="form-group">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
			</div>
			<button class="btn btn-primary btn-block" type="submit">Masuk</button>
			<p class="h6 pt-3 pb-5 text-center">Lupa Password?
				<a href="<?= base_url('auth/reset_password') ?>">Reset <i class="fe fe-arrow-right"></i></a>
			</p>
			<p class="mt-5 mb-3">
				Copyright &copy; 2022 - <a href="#" class="text-decoration-none"> CV. Pelita Karya Sejahtera</a>
			</p>
			<?= $this->session->sess_destroy() ?>
			<?= form_close() ?>
		</div>
	</div>
	<script src="<?= base_url('js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('js/popper.min.js') ?>"></script>
	<script src="<?= base_url('js/moment.min.js') ?>"></script>
	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('js/simplebar.min.js') ?>"></script>
	<script src="<?= base_url('js/daterangepicker.js') ?>"></script>
	<script src="<?= base_url('js/jquery.stickOnScroll.js') ?>"></script>
	<script src="<?= base_url('js/tinycolor-min.js') ?>"></script>
	<script src="<?= base_url('js/config.js') ?>"></script>
	<script src="<?= base_url('js/apps.js') ?>"></script>
	<!-- <script>
		document.getElementById("year").innerHTML = new Date().getFullYear();
	</script> -->
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

</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url('assets/images/icons/favicon.ico') ?>" />
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/simplebar.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/feather.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/select2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/dropzone.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/uppy.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/jquery.steps.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/jquery.timepicker.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/daterangepicker.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/app-light.css') ?>" id="lightTheme">
	<link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css') ?>" id="darkTheme" disabled>
</head>

<body class="light">
	<div class="wrapper vh-100">
		<div class="row align-items-center h-100">
			<?= form_open(base_url('auth/proses_login'), 'class="col-lg-3 col-md-4 col-10 mx-auto"') ?>
			<div class="mx-auto text-center my-4">
				<img src="<?= base_url('assets/images/icons/logo.png') ?>" alt="" class="m-auto">
				<h2 class="text-lg">CV. Pelita Karya Sejahtera</h2>
				<h5 class="my-1">General Contractor</h5>
				<?= $this->session->flashdata('error_login') ?>
			</div>
			<div class="form-group mb-3">
				<input type="text" class="form-control form-control-lg" name="username" value="<?= $this->session->flashdata('username') ?>" placeholder="Username" required>
			</div>
			<div class="form-group mb-3">
				<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
			</div>
			<button id="success" class="btn btn-primary btn-lg btn-block my-3" type="submit">Masuk</button>
			<h6 class="text-right">
				<a href="<?= base_url('auth/reset_password') ?>" class="text-decoration-none mb-5"> Lupa Password?
					<span class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></span>
				</a>
			</h6>
			<h6 class="mt-5 text-center">&copy; Copyright 2021 &mdash; CV. Pelita Karya Sejahtera</h6>
			<?= $this->session->sess_destroy() ?>
			<?= form_close() ?>
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

</html> -->
