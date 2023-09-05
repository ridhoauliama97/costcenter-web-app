<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth/login'));
		}
	}

	public function index()
	{
	}

	public function pengaturan_akun()
	{
		$data['menu'] = 6;
		$data['title'] = 'Pengaturan Akun | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('Akun_model');
		$this->load->model('Auth_model');
		$data['akun'] = $this->Akun_model->get_biodata();
		$data['q'] = $this->Auth_model->get_q();
		$q = $this->db->get_where('t_pertanyaan', ['id' => $data['akun']['keamanan_1']])->row_array();
		$data['q1'] = $q['id'];
		$q = $this->db->get_where('t_pertanyaan', ['id' => $data['akun']['keamanan_2']])->row_array();
		$data['q2'] = $q['id'];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('akun/pengaturan_akun', $data);
		$this->load->view('templates/footer');
	}

	public function informasi_akun()
	{
		$data['menu'] = 6;
		$data['title'] = 'Informasi Akun | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('Akun_model');
		$data['akun'] = $this->Akun_model->get_biodata();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('akun/informasi_akun', $data);
		$this->load->view('templates/footer');
	}

	public function ubah_biodata()
	{
		$username = $this->input->post('username', true);
		$a = $this->db->get_where('t_user', ['username' => $username])->row_array();
		$format = array('.jpg', '.jpeg', '.png');
		$nama_file = str_replace($format, '', $a['foto']);
		$l = strlen($nama_file);
		if ($nama_file != 'default') {
			$n = strlen($a['username']);
			$x = $l - $n;
			$i = (int)(substr($nama_file, ($l - $x), $x));
			$inc = $i + 1;
			$nama_file = substr($nama_file, 0, $n) . $inc;
		} else {
			$nama_file = $a['username'] . '1';
		}

		$this->load->model('Akun_model');
		if ($_FILES['foto']['name'] == true) {
			$upload_image = $_FILES['foto']['name'];
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 4096;
			$config['upload_path'] = './assets/images/avatars';
			$config['file_name'] = $nama_file;
			$config['overwrite'] = true;
			$this->load->library('upload', $config);
			$test = $this->upload->do_upload('foto');
			$new_image = $this->upload->data('file_name');
			$this->db->set('foto', $new_image);
		} else {
			$this->db->set('foto', $this->input->post('file_lama', true));
		}
		$ubah = $this->Akun_model->ubah_biodata();

		if ($ubah) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Info berhasil diubah.</small>
			</div>');
		} else {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Info gagal diubah.</small>
			</div>');
		}
		redirect(base_url('akun/informasi_akun'));
	}

	public function ubah_password()
	{
		if (empty($this->input->post('username', true))) {
			redirect(base_url('akun/pengaturan_akun'));
		}
		$this->load->model('Akun_model');
		$x = $this->Akun_model->get_biodata();
		$pw = $x['password'];
		$pl = hash('sha256', $this->input->post('pl', true));

		if ($pl != $pw) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Password Lama salah.</small>
			</div>');
			redirect(base_url('akun/pengaturan_akun'));
		}

		if ($this->input->post('pb1', true) != $this->input->post('pb2', true)) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Konfirmasi Password tidak sama.</small>
			</div>');
			redirect(base_url('akun/pengaturan_akun'));
		}

		if ($this->input->post('pl', true) == $this->input->post('pb1', true)) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-warning p-1 text-center">
				<small>Password Lama dan Password Baru sama. Password tidak diganti.</small>
			</div>');
			redirect(base_url('akun/pengaturan_akun'));
		}

		$ubah = $this->Akun_model->ubah_password();
		if ($ubah) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Password berhasil diubah.</small>
			</div>');
		} else {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Password gagal diubah.</small>
			</div>');
		}
		redirect(base_url('akun/pengaturan_akun'));
	}

	public function ubah_pertanyaan()
	{
		if (empty($this->input->post('username', true))) {
			redirect(base_url('akun/pengaturan_akun'));
		}
		$this->load->model('Akun_model');
		$ubah = $this->Akun_model->ubah_pertanyaan();

		if ($ubah) {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Pertanyaan keamanan berhasil diubah.</small>
			</div>');
		} else {
			$this->session->set_flashdata('akun_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Pertanyaan keamanan gagal diubah.</small>
			</div>');
		}
		redirect(base_url('akun/pengaturan_akun'));
	}
}
