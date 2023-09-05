<footer class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h6 class="text-center">Copyright &copy; 2022 - <a href="#" class="text-decoration-none"> CV. Pelita Karya Sejahtera</a>
		</div>
	</div>
</footer>
</div>
<!-- <script src="<?= base_url('assets/js/moment.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/simplebar.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/daterangepicker.js') ?>"></script> -->
<script src="<?= base_url('assets/js/jquery.stickOnScroll.js') ?>"></script>
<script src="<?= base_url('assets/js/tinycolor-min.js') ?>"></script>
<script src="<?= base_url('assets/js/config.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/d3.min.js') ?>"></script>
<script src="<?= base_url('assets/js/topojson.min.js') ?>"></script>
<script src="<?= base_url('assets/js/datamaps.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/datamaps-zoomto.js') ?>"></script>
<script src="<?= base_url('assets/js/datamaps.custom.js') ?>"></script> -->
<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
<script>
	/* defind global options */
	Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
	Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="<?= base_url('assets/js/gauge.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.sparkline.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/apexcharts.custom.js') ?>"></script> -->
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/jquery.steps.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.timepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/dropzone.min.js') ?>"></script>
<script src="<?= base_url('assets/js/uppy.min.js') ?>"></script>
<script src="<?= base_url('assets/js/quill.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- <script>
	document.getElementById("year").innerHTML = new Date().getFullYear();
</script> -->

<script>
	$('.select2').select2({
		theme: 'bootstrap4',
	});
	$('.select2-multi').select2({
		multiple: true,
		theme: 'bootstrap4',
	});
	$(function() {
		$('[data-toggle="popover"]').popover()
	})
	// $('.drgpicker').daterangepicker({
	// 	singleDatePicker: true,
	// 	timePicker: false,
	// 	showDropdowns: true,
	// 	locale: {
	// 		format: 'DDDD, DD0-MMMM-YYYY'
	// 	}
	// });
	// $('.time-input').timepicker({
	// 	'scrollDefault': 'now',
	// 	'zindex': '9999' /* fix modal open */
	// });
	// /** date range picker */
	// if ($('.datetimes').length) {
	// 	$('.datetimes').daterangepicker({
	// 		timePicker: true,
	// 		startDate: moment().startOf('hour'),
	// 		endDate: moment().startOf('hour').add(32, 'hour'),
	// 		locale: {
	// 			format: 'DD/MM hh:mm A'
	// 		}
	// 	});
	// }
	// var start = moment().subtract(29, 'days');
	// var end = moment();

	// function cb(start, end) {
	// 	$('#reportrange span').html(start.format('DD-MMMM-YYYY') + ' - ' + end.format('DD-MMMM-YYYY'));
	// }
	// $('#reportrange').daterangepicker({
	// 	startDate: start,
	// 	endDate: end,
	// 	ranges: {
	// 		'1 Tahun': [moment().startOf('years'), moment().endOf('years')],
	// 	}
	// }, cb);
	// cb(start, end);
</script> -->

<script src="<?= base_url('assets/js/apps.js') ?>"></script>

<script>
	$('#dataTable-0').DataTable({
		"language": {
			"lengthMenu": "Tampilkan _MENU_ data per set",
			"zeroRecords": "Laporan kosong.",
			"info": "Record _START_ sampai _END_ dari _TOTAL_ total record.",
			"infoEmpty": "Tidak ada record.",
			"infoFiltered": "(Pencarian dari _MAX_ total record.)",
			"search": "Cari",
			"paginate": {
				"first": "Ke halaman awal",
				"last": "Ke halaman akhir",
				"previous": "Sebelumnya",
				"next": "Berikutnya"
			}
		},
		"paging": false
		// "sorting": false
	});
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[25, 50, 100, -1],
			[25, 50, 100, "Semua"]
		],
		"language": {
			"lengthMenu": "Tampilkan _MENU_ data per set",
			"zeroRecords": "Laporan kosong.",
			"info": "Record _START_ sampai _END_ dari _TOTAL_ total record.",
			"infoEmpty": "Tidak ada record.",
			"infoFiltered": "(Pencarian dari _MAX_ total record.)",
			"search": "Cari",
			"paginate": {
				"first": "Ke halaman awal",
				"last": "Ke halaman akhir",
				"previous": "Sebelumnya",
				"next": "Berikutnya"
			}
		},
	});
</script>

<script>
	function keluar() {
		window.location.href = "<?= base_url('auth/logout/system') ?>"
	}
	setInterval(keluar, 1800000);
</script>

</body>

</html>
