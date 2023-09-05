<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

	public function list_pengguna()
	{
		$data['menu'] = 7;
		$data['title'] = 'List Akun | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('Akun_model');
		$data['akun'] = $this->Akun_model->get_all_biodata();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/list_pengguna', $data);
		$this->load->view('templates/footer');
	}

	public function kode_pendaftaran()
	{
		$data['menu'] = 7;
		$data['title'] = 'Buat Kode | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('Akun_model');
		$data['kode'] = $this->Akun_model->get_kode();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/kode_pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function buat_kode()
	{
		$i = 2;
		while ($i) {
			$n = 8;
			$char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $n; $i++) {
				$index = rand(0, strlen($char) - 1);
				$randomString .= $char[$index];
			}
			$kode = $randomString;
			$this->load->model('Akun_model');
			$check = $this->Akun_model->check_kode($kode);
			if ($check == 0) {
				$i = 0;
			}
		}

		$tambah = $this->Akun_model->tambah_kode($kode);
		if ($tambah) {
			$this->session->set_flashdata('kode_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Kode berhasil ditambahkan.</small>
					</div>');
			redirect(base_url('user/kode_pendaftaran'));
		} else {
			$this->session->set_flashdata('kode_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Kode gagal ditambahkan.</small>
					</div>');
			redirect(base_url('user/kode_pendaftaran'));
		}
	}

	public function hapus_kode($kode)
	{
		$this->load->model('Akun_model');
		$hapus = $this->Akun_model->hapus_kode($kode);
		if ($hapus) {
			$this->session->set_flashdata('kode_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Kode berhasil dihapus.</small>
					</div>');
			redirect(base_url('user/kode_pendaftaran'));
		} else {
			$this->session->set_flashdata('kode_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Kode tidak dihapus.</small>
					</div>');
			redirect(base_url('user/kode_pendaftaran'));
		}
	}



	public function reset_user($kode)
	{
		echo $kode;
	}

	public function hapus_user($kode)
	{
		echo $kode;
	}
}
