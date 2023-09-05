<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10 col-xl-8">
				<h2 class="h3 mb-4 page-title">Informasi Pribadi</h2>
				<?= $this->session->flashdata('akun_alert') ?>
				<?php $this->session->unset_userdata('akun_alert') ?>
				<div class="my-4">
					<div class="row mt-5 align-items-center">
						<div class="col-md-3 text-center mb-5">
							<div class="avatar avatar-xl">
								<img src="<?= base_url('assets/images/avatars/' . $akun['foto']) ?>" alt="..." class="avatar-img rounded-circle">
							</div>
						</div>
						<div class="col">
							<div class="row align-items-center">
								<div class="col-md-7">
									<h4 class="mb-1"><?= $akun['nama_pengguna'] ?></h4>
									<?php
									if ($akun['role'] == 1) {
										$role = 'Admin Utama';
									} else if ($akun['role'] == 2) {
										$role = 'Admin';
									}
									?>
									<p class="small mb-3"><span class="badge badge-dark"><?= $role ?></span></p>
								</div>
							</div>
						</div>
					</div>
					<hr class="my-4">
					<form class="mb-4" id="form_biodata" method="post" action="<?= base_url('akun/ubah_biodata') ?>" enctype="multipart/form-data">
						<input type="hidden" name="username" value="<?= $akun['username'] ?>">
						<input type="hidden" name="file_lama" value="<?= $akun['foto'] ?>">
						<div class="form-group">
							<label for="foto">Foto Profil</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="foto" name="foto" accept="image/jpg, image/jpeg, image/png" onchange="ganti_foto()" disabled>
								<label id="custom-file-label" class="custom-file-label" for="foto">Pilih Photo Anda</label>
							</div>
						</div>
						<div class="form-group">
							<label for="nama">Nama Pengguna</label>
							<input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $akun['nama_pengguna'] ?>" placeholder="Nama Anda" readonly required>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= $akun['alamat'] ?>" placeholder="Alamat Anda" readonly required>
						</div>
						<div class="form-group">
							<label for="no_hp">No. Handphone</label>
							<input type="number" class="form-control form-control-sm" id="hp" name="hp" value="<?= $akun['no_hp'] ?>" placeholder="Tanpa +62 atau 0" readonly required>
						</div>
						<hr class="my-4">
						<button type="button" id="btn_ubah" class="btn btn-primary" onclick="ubah()">Ubah Informasi Akun</button>
						<button type="reset" id="btn_batal" class="btn btn-secondary d-none" onclick="batal()">Batal</button>
						<button type="submit" id="btn_simpan" class="btn btn-primary d-none">Simpan Perubahan</button>
					</form>
				</div> <!-- /.card-body -->
			</div> <!-- /.col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main>

<script>
	function ubah() {
		$("#foto").attr("disabled", false);
		$("#nama").attr("readonly", false);
		$("#alamat").attr("readonly", false);
		$("#hp").attr("readonly", false);
		$("#btn_ubah").addClass('d-none');
		$("#btn_batal").removeClass('d-none');
		$("#btn_simpan").removeClass('d-none');
	}

	function batal() {
		$("#foto").attr("disabled", true);
		$("#nama").attr("readonly", true);
		$("#alamat").attr("readonly", true);
		$("#hp").attr("readonly", true);
		$("#btn_ubah").removeClass('d-none');
		$("#btn_batal").addClass('d-none');
		$("#btn_simpan").addClass('d-none');
	}

	function ganti_foto() {
		var file = $('#foto').val();
		var text = file.replace('C:', 'Drive:');
		$('#custom-file-label').text(text);
	}
</script>
