<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Preferensi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth/login'));
		}
		if (empty($this->session->userdata('costcenter'))) {
			$this->session->set_flashdata('buku_alert', '
			<div class="alert alert-warning p-1 text-center">
				<small>Mohon pilih Cost Center terlebih dahulu.</small>
			</div>');
			redirect(base_url('dashboard'));
		}
	}

	public function index()
	{
		$data['menu'] = 2;
		$data['title'] = 'Preferensi | CV. Pelita Karya Sejahtera';
		$this->load->model('Preferensi_model');
		$this->load->model('CC_model');
		$data['preferensi'] = $this->Preferensi_model->get_all();
		$data['format'] = $this->format;
		$data['max_id'] = $this->Preferensi_model->max_id();
		$data['cc'] = $this->CC_model->get_all();
		$data['all_pref'] = $this->Preferensi_model->get_all_pref();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('preferensi/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('preferensi/M_detailpreferensi', $data);
		$this->load->view('preferensi/M_tambahpreferensi', $data);
		$this->load->view('preferensi/M_editpreferensi', $data);
		$this->load->view('preferensi/M_salinpreferensi', $data);
	}

	public function tambah()
	{
		if (empty($this->input->post('kode_preferensi', true)) | empty($this->input->post('uraian_preferensi', true))) {
			redirect(base_url());
		}
		$this->load->model('Preferensi_model');
		$tambah = $this->Preferensi_model->tambah();
		if ($tambah) {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Preferensi berhasil ditambahkan.</small>
					</div>');
			redirect(base_url('preferensi'));
		} else {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Preferensi gagal ditambahkan.</small>
					</div>');
			redirect(base_url('preferensi'));
		}
	}

	public function edit()
	{
		if (empty($this->input->post('kode_preferensi', true)) | empty($this->input->post('uraian_preferensi', true))) {
			redirect(base_url());
		}
		$this->load->model('Preferensi_model');
		$edit = $this->Preferensi_model->edit();
		if ($edit) {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Preferensi berhasil diubah.</small>
					</div>');
			redirect(base_url('preferensi'));
		} else {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Preferensi gagal diubah.</small>
					</div>');
			redirect(base_url('preferensi'));
		}
	}

	public function hapus($id)
	{
		if (empty($id)) {
			redirect(base_url());
		}
		$this->load->model('Preferensi_model');
		$this->db->where('kode_preferensi', str_replace('%20', ' ', $id));
		$hapus = $this->db->delete('t_preferensi');
		if ($hapus) {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Preferensi berhasil dihapus.</small>
					</div>');
			redirect(base_url('preferensi'));
		} else {
			$this->session->set_flashdata('preferensi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Preferensi gagal dihapus.</small>
					</div>');
			redirect(base_url('preferensi'));
		}
	}

	public function salin()
	{
		$this->load->model('Preferensi_model');
		$pref = $this->Preferensi_model->get_pref_salin();

		// echo $this->input->post('kode_cc', true) . '<br />';
		foreach ($pref as $key) {
			if ($this->input->post('pref_' . $key['kode_preferensi'], true) == 1) {
				$data['uraian'] = $key['uraian_preferensi'];
				$data['satuan'] = $key['satuan_preferensi'];
				$data['harga'] = $this->input->post('harga_' . $key['kode_preferensi'], true);
				$data['costcenter'] = str_replace('%20', ' ', $this->session->userdata('costcenter'));
				$salin = $this->Preferensi_model->salin_pref($data);
			}
		}
		$this->session->set_flashdata('preferensi_alert', '
		<div class="alert alert-success p-1 text-center">
			<small>Preferensi berhasil disalin.</small>
		</div>');
		redirect(base_url('preferensi'));
	}
}
