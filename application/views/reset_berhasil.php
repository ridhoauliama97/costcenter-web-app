<h4>Password berhasil direset.</h4>
<h1>"<?= $this->session->userdata('psw') ?>"</h1>
<b>Mohon ubah password Anda melalui menu Pengaturan Akun setelah Anda berhasil login.</b>
<a href="<?= base_url('auth/login') ?>">Login</a>
<?= $this->session->sess_destroy() ?>
