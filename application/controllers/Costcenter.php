<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Costcenter extends CI_Controller
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
		$data['menu'] = 1;
		$data['title'] = 'Akun Cost Center | CV. Pelita Karya Sejahtera';
		$this->load->model('CC_model');
		$data['saldo_pendapatan'] = $this->CC_model->get_pendapatan();
		$data['saldo_beban'] = $this->CC_model->get_beban();
		$data['tertunda'] = $this->CC_model->get_tertunda();
		$data['saldo_proyek'] = $data['saldo_pendapatan'] - $data['saldo_beban'];
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('costcenter/index', $data);
		$this->load->view('templates/footer');
	}


	// PENDAPATAN ---------------------------------------------------------------------------------------------------------------

	public function pendapatan($kat)
	{
		$this->session->set_userdata('kat', $kat);
		$data['menu'] = 1;
		$data['title'] = 'Pendapatan';
		$this->load->model('CC_model');
		$this->load->model('Transaksi_model');
		$akun = 1;
		$data['cc'] = $this->CC_model->get_cc_sub($kat, $akun);
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('costcenter/p_' . $kat, $data);
		$this->load->view('templates/footer');
	}

	public function tambah_pendapatan()
	{
		$this->load->model('CC_model');
		$a = $this->CC_model->tambah_pendapatan();
		if ($a == 1) {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/pendapatan/' . $this->session->userdata('kat')));
		} else {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Transaksi tidak ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/pendapatan/' . $this->session->userdata('kat')));
		}
	}

	public function ubah_pendapatan()
	{
		$this->load->model('CC_model');
		$a = $this->CC_model->ubah_pendapatan();
		if ($a == 1) {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil diubah.</small>
			</div>');
			redirect(base_url('costcenter/pendapatan/' . $this->session->userdata('kat')));
		} else {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Transaksi tidak diubah.</small>
			</div>');
			redirect(base_url('costcenter/pendapatan/' . $this->session->userdata('kat')));
		}
	}

	public function hapus_pendapatan($id)
	{
		$this->db->where('id_transaksi', str_replace('%20', ' ', $id));
		$this->db->delete('t_transaksi');
		$this->session->set_flashdata('cc_alert', '
		<div class="alert alert-success p-1 text-center">
			<small>Transaksi berhasil dihapus.</small>
		</div>');
		redirect(base_url('costcenter/pendapatan/' . $this->session->userdata('kat')));
	}

	// --------------------------------------------------------------------------------------------------------------------------


	// BEBAN --------------------------------------------------------------------------------------------------------------------

	public function beban($kat)
	{
		$this->session->set_userdata('kat', $kat);
		$data['menu'] = 1;
		$data['title'] = 'Beban/Biaya';
		$this->load->model('CC_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Preferensi_model');
		$akun = 2;
		$data['cc'] = $this->CC_model->get_cc_sub($kat, $akun);
		$data['preferensi'] = $this->Preferensi_model->get_all_for_transaksi();
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('costcenter/b_' . $kat, $data);
		$this->load->view('templates/footer');
	}

	public function tambah_beban()
	{
		$this->load->model('CC_model');
		$a = $this->CC_model->tambah_beban();
		if ($a == 1) {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/beban/' . $this->session->userdata('kat')));
		} else {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Transaksi tidak ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/beban/' . $this->session->userdata('kat')));
		}
	}

	public function ubah_beban()
	{
		$this->load->model('CC_model');
		$a = $this->CC_model->ubah_beban();
		if ($a == 1) {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil diubah.</small>
			</div>');
			redirect(base_url('costcenter/beban/' . $this->session->userdata('kat')));
		} else {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Transaksi tidak diubah.</small>
			</div>');
			redirect(base_url('costcenter/beban/' . $this->session->userdata('kat')));
		}
	}

	public function hapus_beban($id)
	{
		$this->db->where('id_transaksi', str_replace('%20', ' ', $id));
		$this->db->delete('t_transaksi');
		$this->session->set_flashdata('cc_alert', '
		<div class="alert alert-success p-1 text-center">
			<small>Transaksi berhasil dihapus.</small>
		</div>');
		redirect(base_url('costcenter/beban/' . $this->session->userdata('kat')));
	}

	// --------------------------------------------------------------------------------------------------------------------------


	// TERTUNDA -----------------------------------------------------------------------------------------------------------------

	public function tertunda($kat)
	{
		$this->session->set_userdata('kat', $kat);
		$data['menu'] = 1;
		$data['title'] = 'Tertunda';
		$this->load->model('CC_model');
		$this->load->model('Transaksi_model');
		$akun = 3;
		$data['format'] = $this->format;
		$data['cc'] = $this->CC_model->get_cc_sub($kat, $akun);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		if (!empty($this->input->get('transaksi', true))) {
			$data['id'] = $this->input->get('transaksi', true);
			$data['detail'] = $this->CC_model->get_detail_tertunda($data);
			$data['transaksi'] = $this->CC_model->get_transaksi_tertunda($data);
			$this->load->view('costcenter/t_' . $kat . '_detail', $data);
		} else {
			$this->load->view('costcenter/t_' . $kat, $data);
		}
		$this->load->view('templates/footer');
	}

	public function bayar_tertunda()
	{
		$this->load->model('CC_model');
		$a = $this->CC_model->bayar_tertunda();
		if ($a == 1) {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/tertunda/' . $this->session->userdata('kat') . '?transaksi=' . $this->input->post('tagihan', true)));
		} else {
			$this->session->set_flashdata('cc_alert', '
			<div class="alert alert-danger p-1 text-center">
				<small>Transaksi tidak ditambahkan.</small>
			</div>');
			redirect(base_url('costcenter/tertunda/' . $this->session->userdata('kat') . '?transaksi=' . $this->input->post('tagihan', true)));
		}
	}

	public function hapus_tertunda($id)
	{
		$this->load->model('CC_model');
		$this->CC_model->hapus_tertunda(str_replace('%20', ' ', $id));
		$this->session->set_flashdata('cc_alert', '
		<div class="alert alert-success p-1 text-center">
			<small>Transaksi berhasil dihapus.</small>
		</div>');
		redirect(base_url('costcenter/tertunda/' . $this->session->userdata('kat')));
	}

	// --------------------------------------------------------------------------------------------------------------------------
}
