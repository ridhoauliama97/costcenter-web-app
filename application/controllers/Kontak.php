<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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
		$data['menu'] = 5;
		$data['title'] = 'Kontak | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('Kontak_model');
		$data['kontak'] = $this->Kontak_model->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kontak/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('kontak/M_detailkontak', $data);
		$this->load->view('kontak/M_tambahkontak', $data);
		$this->load->view('kontak/M_editkontak', $data);
	}

	public function tambah()
	{
		$this->load->model('Kontak_model');
		$a = $this->Kontak_model->tambah_kontak();
		if ($a == 1) {
			$this->session->set_flashdata('kontak_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Kontak berhasil ditambahkan.</small>
			</div>');
			redirect(base_url('kontak'));
		} else {
			$this->session->set_flashdata('kontak_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Kontak tidak ditambahkan.</small>
			</div>');
			redirect(base_url('kontak'));
		}
	}

	public function ubah()
	{
		$this->load->model('Kontak_model');
		$a = $this->Kontak_model->ubah_kontak();
		if ($a == 1) {
			$this->session->set_flashdata('kontak_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Kontak berhasil diubah.</small>
			</div>');
			redirect(base_url('kontak'));
		} else {
			$this->session->set_flashdata('kontak_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Kontak tidak diubah.</small>
			</div>');
			redirect(base_url('kontak'));
		}
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('t_kontak');
		$this->session->set_flashdata('kontak_alert', '
		<div class="alert alert-success p-1 text-center">
			<small>Kontak dihapus.</small>
		</div>');
		redirect(base_url('kontak'));
	}
}
