<?php
$this->db->select('foto');
$a = $this->db->get_where('t_user', ['username' => $this->session->userdata('user')])->row_array();
$foto = $a['foto'];
?>

<div class="wrapper">
	<nav class="topnav navbar navbar-light">
		<button type="button" class="navbar-toggler text-secondary mt-2 p-0 mr-3 collapseSidebar">
			<i class="fe fe-menu navbar-toggler-icon"></i>
		</button>
		<ul class="nav">
			<li class="nav-item my-2">
				<?= $this->session->flashdata('greeting') ?>
				<?php $this->session->unset_userdata('greeting') ?>
			</li>
			<!-- <li class="nav-item nav-notif">
				<a class="nav-link text-secondary my-2" href="#" data-toggle="modal" data-target=".modal-notif">
					<span class="fe fe-clock fe-16"></span>
					<span class="dot dot-md bg-success"></span>
				</a>
			</li> -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-secondary pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="avatar avatar-sm mt-2">
						<img src="<?= base_url('assets/images/avatars/' . $foto) ?>" alt="..." class="avatar-img rounded-circle">
					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="<?= base_url('akun/informasi_akun') ?>">Akun Saya</a>
					<a class="dropdown-item" href="<?= base_url('akun/pengaturan_akun') ?>">Pengaturan Akun</a>
					<hr>
					<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Keluar</a>
				</div>
			</li>
		</ul>
	</nav>
