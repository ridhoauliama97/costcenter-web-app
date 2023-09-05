<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ledger extends CI_Controller
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
		$id = str_replace('%20', ' ', $this->session->userdata('costcenter'));
		$data['menu'] = 3;
		$data['title'] = 'Jurnal Umum | CV. Pelita Karya Sejahtera';

		$this->load->model('Laporan_model');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$data['format'] = $this->format;
		$this->load->model('CC_model');
		$data['cc'] = $this->CC_model->get_cc($id);
		$data['ledger'] = $this->CC_model->get_ledger();
		// $data['p_dana'] = $this->Laporan_model->get_per_cc($id, 1, 1);
		// $data['p_bonus'] = $this->Laporan_model->get_per_cc($id, 1, 2);
		// $data['p_retur'] = $this->Laporan_model->get_per_cc($id, 1, 3);
		// $data['p_lainnya'] = $this->Laporan_model->get_per_cc($id, 1, 4);
		// $data['hpp'] = $this->Laporan_model->get_per_cc($id, 2, 5);
		// $data['b_gaji'] = $this->Laporan_model->get_per_cc($id, 2, 6);
		// $data['b_sekret'] = $this->Laporan_model->get_per_cc($id, 2, 7);
		// $data['b_komunikasi'] = $this->Laporan_model->get_per_cc($id, 2, 8);
		// $data['b_legalitas'] = $this->Laporan_model->get_per_cc($id, 2, 9);
		// $data['b_lainnya'] = $this->Laporan_model->get_per_cc($id, 2, 10);
		$this->load->view('ledger/index', $data);
		$this->load->view('templates/footer');
	}
}
