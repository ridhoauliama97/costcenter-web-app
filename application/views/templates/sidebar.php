<?php
for ($i = 0; $i < 9; $i++) {
	${'active' . $i} = '';
	${'font' . $i} = '';
	if ($menu == $i) {
		${'active' . $i} = 'active';
		${'font' . $i} = 'font-weight-bold';
	}
}
?>

<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
	<a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-secondary ml-2 mt-3" data-toggle="toggle">
		<i class="fe fe-x"><span class="sr-only"></span></i>
	</a>
	<nav class="vertnav navbar navbar-light">
		<!-- nav bar -->
		<div class="w-100 mb-4 d-flex">
			<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= base_url('dashboard') ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
					<image id="image0" width="60" height="60" x="0" y="0" href="data:image/png;base64,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" />
				</svg>
			</a>
		</div>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item <?= $active0 ?>">
				<a class="nav-link" href="<?= base_url('dashboard') ?>">
					<i class="fe fe-home fe-16"></i>
					<span class="ml-3 item-text <?= $font0 ?>">Dashboard</span>
					<span class="sr-only">(current)</span>
				</a>
			</li>
		</ul>
		<p class="text nav-heading mt-4 mb-1">
			<span>Menu Utama</span>
			<?php if (!empty($this->session->userdata('costcenter'))) { ?>
				<span>[<?= str_replace('%20', ' ', $this->session->userdata('costcenter')) ?>]</span>
			<?php } ?>
		</p>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100 <?= $active1 ?>">
				<a class="nav-link" href="<?= base_url('costcenter') ?>">
					<i class="fe fe-monitor fe-16"></i>
					<span class="ml-3 item-text  <?= $font1 ?>">Akun Cost Center</span>
				</a>
			</li>
			<li class="nav-item w-100 <?= $active2 ?>">
				<a class="nav-link" href="<?= base_url('preferensi') ?>">
					<i class="fe fe-sliders fe-16"></i>
					<span class="ml-3 item-text  <?= $font2 ?>">Preferensi</span>
				</a>
			</li>
			<!-- <li class="nav-item w-100 <?= $active3 ?>">
				<a class="nav-link" href="<?= base_url('transaksi/list') ?>">
					<i class="fe fe-file-text fe-16"></i>
					<span class="ml-3 item-text  <?= $font3 ?>">Transaksi</span>
				</a>
			</li> -->
			<li class="nav-item w-100 <?= $active3 ?>">
				<a class="nav-link" href="<?= base_url('ledger') ?>">
					<i class="fe fe-book-open fe-16"></i>
					<span class="ml-3 item-text  <?= $font3 ?>">Jurnal Umum</span>
				</a>
			</li>
			<li class="nav-item dropdown <?= $active4 ?>">
				<a href="#laporan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
					<i class="fe fe-clipboard fe-16"></i>
					<span class="ml-3 item-text  <?= $font4 ?>">Laporan Laba-Rugi</span>
				</a>
				<ul class="collapse list-unstyled pl-4 w-100" id="laporan">
					<a class="nav-link pl-3" href="<?= base_url('laporan/individual') ?>"><span class="ml-1">Laporan Per Cost Center</span></a>
					<a class="nav-link pl-3" href="<?= base_url('laporan/annual') ?>"><span class="ml-1">Laporan Tahunan</span></a>
				</ul>
			</li>
		</ul>
		<p class="text-black nav-heading mt-4 mb-1">
			<span>Lainnya</span>
		</p>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100 <?= $active5 ?>">
				<a class="nav-link" href="<?= base_url('kontak') ?>">
					<i class="fe fe-book fe-16"></i>
					<span class="ml-3 item-text  <?= $font5 ?>">Kontak</span>
				</a>
			</li>
			<li class="nav-item dropdown <?= $active6 ?>">
				<a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
					<i class="fe fe-user fe-16"></i>
					<span class="ml-3 item-text  <?= $font6 ?>">Profil</span>
				</a>
				<ul class="collapse list-unstyled pl-4 w-100" id="profile">
					<a class="nav-link pl-3" href="<?= base_url('akun/informasi_akun') ?>"><span class="ml-1">Informasi Akun</span></a>
					<a class="nav-link pl-3" href="<?= base_url('akun/pengaturan_akun') ?>"><span class="ml-1">Pengaturan Akun</span></a>
				</ul>
			</li>
			<?php
			if ($this->session->userdata('role') == 1) {
			?>
				<li class="nav-item dropdown <?= $active7 ?>">
					<a href="#akun" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
						<i class="fe fe-users fe-16"></i>
						<span class="ml-3 item-text  <?= $font7 ?>">Pengguna</span>
					</a>
					<ul class="collapse list-unstyled pl-4 w-100" id="akun">
						<a class="nav-link pl-3" href="<?= base_url('user/list_pengguna') ?>"><span class="ml-1">List Pengguna</span></a>
						<a class="nav-link pl-3" href="<?= base_url('user/kode_pendaftaran') ?>"><span class="ml-1">Kode Pendaftaran</span></a>
					</ul>
				</li>
			<?php
			}
			?>
			<li class="nav-item dropdown <?= $active8 ?>">
				<a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
					<i class="fe fe-help-circle fe-16"></i>
					<span class="ml-3 item-text  <?= $font8 ?>">Bantuan</span>
				</a>
				<ul class="collapse list-unstyled pl-4 w-100" id="support">
					<a class="nav-link pl-3" href="<?= base_url('bantuan/petunjuk_penggunaan') ?>"><span class="ml-1">Petunjuk Penggunaan</span></a>
					<a class="nav-link pl-3" href="<?= base_url('bantuan/faq') ?>"><span class="ml-1">FAQs</span></a>
				</ul>
			</li>
		</ul>
	</nav>
</aside>
