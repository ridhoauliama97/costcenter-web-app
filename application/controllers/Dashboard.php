<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['menu'] = 0;
		$data['title'] = 'Dashboard | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('CC_model');
		$check = $this->CC_model->check_active($this->session->userdata('costcenter'));
		if ($check != 1) {
			$this->session->unset_userdata('costcenter');
		}
		$data['format'] = $this->format;
		$data['cc'] = $this->CC_model->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
		$this->load->view('costcenter/M_tambahcc');
		$this->load->view('costcenter/M_detailcc', $data);
		$this->load->view('costcenter/M_editcc', $data);
		$this->load->view('costcenter/M_progrescc', $data);
	}

	public function pilih_cc($id)
	{
		$this->session->set_userdata('costcenter', urldecode($id));
		redirect(base_url('costcenter'));
	}

	public function tambah()
	{
		if (empty($this->input->post('kode_cc', true)) | empty($this->input->post('nama_cc', true))) {
			redirect(base_url());
		}
		$this->load->model('CC_model');
		$x = $this->db->get_where('t_cc', ['kode_cc' => strtoupper($this->input->post('kode_cc', true))]);
		$a = $x->num_rows();
		if ($a > 0) {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Kode CC sudah ada. Coba kode lainnya atau gunakan penomoran.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
		$tambah = $this->CC_model->tambah();
		if ($tambah) {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Cost Center berhasil ditambahkan.</small>
					</div>');
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Cost Center gagal ditambahkan.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
	}

	public function edit()
	{
		if (empty($this->input->post('kode_cc', true)) | empty($this->input->post('nama_cc', true))) {
			redirect(base_url());
		}
		$this->load->model('CC_model');
		$edit = $this->CC_model->edit();
		if ($edit) {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Cost Center berhasil diubah.</small>
					</div>');
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Cost Center gagal diubah.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
	}

	public function hapus($id)
	{
		if (empty($id)) {
			redirect(base_url());
		}
		$this->load->model('CC_model');
		$hapus = $this->CC_model->hapus(str_replace('%20', ' ', $id));
		if ($hapus) {
			$this->session->unset_userdata('costcenter');
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Cost Center berhasil dihapus.</small>
					</div>');
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Cost Center gagal dihapus.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
	}

	public function update_progres()
	{
		if (empty($this->input->post('kode_cc', true))) {
			redirect(base_url());
		}
		$this->load->model('CC_model');
		$x = $this->db->get_where('t_cc', ['kode_cc' => strtoupper($this->input->post('kode_cc', true))]);
		$a = $x->num_rows();
		if ($a < 1) {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Kode CC tidak ada.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
		$update = $this->CC_model->update_progres();
		if ($update) {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Progres Cost Center ' . $this->input->post('kode_cc', true) . ' berhasil diperbarui.</small>
					</div>');
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('buku_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Progres Cost Center gagal diperbarui.</small>
					</div>');
			redirect(base_url('dashboard'));
		}
	}

	public function detail_progres($id)
	{
		$data['menu'] = 0;
		$data['title'] = 'Detail Progres | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->model('CC_model');
		$data['format'] = $this->format;
		$data['cc'] = $this->CC_model->get_detail_progres(urldecode($id));
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('costcenter/detail_progres', $data);
		$this->load->view('templates/footer');
	}
}
