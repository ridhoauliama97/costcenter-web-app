<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth/login'));
		}
		// if (empty($this->session->userdata('costcenter'))) {
		// 	$this->session->set_flashdata('buku_alert', '
		// 	<div class="alert alert-warning p-1 text-center">
		// 		<small>Mohon pilih Cost Center terlebih dahulu.</small>
		// 	</div>');
		// 	redirect(base_url('dashboard'));
		// }
	}

	public function index()
	{
	}

	public function individual($id)
	{
		$data['menu'] = 4;
		$data['title'] = 'Laporan | CV. Pelita Karya Sejahtera';
		$this->load->model('Laporan_model');
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		if (empty($id) | !isset($id)) {
			$data['laporan'] = $this->Laporan_model->get_all();
			$this->load->view('laporan/individual/index', $data);
		} else {
			$this->load->model('CC_model');
			$this->session->unset_userdata('tahun_cc');
			$data['cc'] = $this->CC_model->get_cc(str_replace('%20', ' ', $id));
			$data['p_dana'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 1, 1);
			$data['p_bonus'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 1, 2);
			$data['p_retur'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 1, 3);
			$data['p_lainnya'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 1, 4);
			$data['hpp'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 5);
			$data['b_gaji'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 6);
			$data['b_sekret'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 7);
			$data['b_komunikasi'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 8);
			$data['b_legalitas'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 9);
			$data['b_lainnya'] = $this->Laporan_model->get_per_cc(str_replace('%20', ' ', $id), 2, 10);
			$this->load->view('laporan/individual/individual', $data);
		}
		$this->load->view('templates/footer');
	}

	public function annual($tahun)
	{
		$data['menu'] = 4;
		$data['title'] = 'Laporan | CV. Pelita Karya Sejahtera';
		$this->load->model('Laporan_model');
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		if (empty($tahun) || !isset($tahun)) {
			$min = $this->Laporan_model->get_tahun_min();
			$max = $this->Laporan_model->get_tahun_max();

			$data['min'] = $min['mulai_cc'];
			$data['max'] = $max['akhir_cc'];

			if (empty($min['mulai_cc']) || empty($max['akhir_cc'])) {
				$data['min'] = date('Y');
				$data['max'] = date('Y');
			}

			$data['laporan'] = (int)$data['max'] - (int)$data['min'] + 1;
			$this->load->view('laporan/annual/index', $data);
		} else {
			$data['tahun'] = $tahun;
			$this->session->set_userdata('tahun_cc', $tahun);
			$data['laporan'] = $this->Laporan_model->get_per_tahun($tahun);
			$this->load->model('CC_model');
			$this->load->view('laporan/annual/annual', $data);
		}
		$this->load->view('templates/footer');
	}
}
