<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

	public function formatAngka($num)
	{
		$str = $num;
		if (substr($num, 0, 1) == '-') {
			$str = $str * (-1);
			if (strlen($str) % 3 == 2) {
				$res = str_split("0$str", 3);
				$res[0] = (int) $res[0];
				return '-' . implode('.', $res);
			} elseif (strlen($str) % 3 == 1) {
				$res = str_split("00$str", 3);
				$res[0] = (int) $res[0];
				return '-' . implode('.', $res);
			} else {
				$res = str_split($str, 3);
				return '-' . implode('.', $res);
			}
		} else {
			if (strlen($str) % 3 == 2) {
				$res = str_split("0$str", 3);
				$res[0] = (int) $res[0];
				return '' . implode('.', $res);
			} elseif (strlen($str) % 3 == 1) {
				$res = str_split("00$str", 3);
				$res[0] = (int) $res[0];
				return '' . implode('.', $res);
			} else {
				$res = str_split($str, 3);
				return '' . implode('.', $res);
			}
		}
	}

	public function index()
	{
	}

	public function list()
	{
		$data['menu'] = 3;
		$data['title'] = 'Transaksi | CV. Pelita Karya Sejahtera';
		$this->load->model('CC_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Preferensi_model');
		$this->load->model('Kategori_model');
		$data['cc'] = $this->CC_model->get_all();
		$data['preferensi'] = $this->Preferensi_model->get_all();
		$data['kategori'] = $this->Kategori_model->get_all();
		$data['transaksi'] = $this->CC_model->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('transaksi/M_tambahtransaksi', $data);
	}

	public function detail($cc)
	{
		$data['menu'] = 3;
		if (empty($cc) | !isset($cc)) {
			redirect(base_url('transaksi/list'));
		}

		$data['title'] = 'Transaksi | CV. Pelita Karya Sejahtera';
		$this->load->model('CC_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Preferensi_model');
		$this->load->model('Kategori_model');
		$data['transaksi'] = $this->Transaksi_model->get_per_cc($cc);
		$data['preferensi'] = $this->Preferensi_model->get_all();
		$data['kategori'] = $this->Kategori_model->get_all();
		$data['cc'] = $this->CC_model->get_all($cc);
		$data['id'] = $cc;
		$data['format'] = $this->format;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/index_per_cc', $data);
		$this->load->view('templates/footer');
		$this->load->view('transaksi/M_detailtransaksi', $data);
		$this->load->view('transaksi/M_tambahtransaksi', $data);
		$this->load->view('transaksi/M_edittransaksi', $data);
	}

	public function tambah()
	{
		if (empty($this->input->post('kode_cc', true)) | empty($this->input->post('kode_preferensi', true))) {
			redirect(base_url());
		}
		$this->load->model('Transaksi_model');
		$tambah = $this->Transaksi_model->tambah();
		if ($tambah) {
			$this->session->set_flashdata('transaksi_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil ditambahkan.</small>
			</div>');
			redirect(base_url('transaksi'));
		} else {
			$this->session->set_flashdata('transaksi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Transaksi gagal ditambahkan.</small>
					</div>');
			redirect(base_url('transaksi'));
		}
	}

	public function edit()
	{
		if (empty($this->input->post('kode_cc', true)) | empty($this->input->post('kode_preferensi', true)) | empty($this->input->post('id_transaksi', true))) {
			redirect(base_url());
		}

		$this->load->model('Transaksi_model');
		$ubah = $this->Transaksi_model->edit();
		if ($ubah) {
			$this->session->set_flashdata('transaksi_alert', '
			<div class="alert alert-success p-1 text-center">
				<small>Transaksi berhasil diubah.</small>
			</div>');
			redirect(base_url('transaksi'));
		} else {
			$this->session->set_flashdata('transaksi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Transaksi gagal diubah.</small>
					</div>');
			redirect(base_url('transaksi'));
		}
	}

	public function hapus($id)
	{
		if (empty($id)) {
			redirect(base_url());
		}

		$this->load->model('Transaksi_model');
		$this->db->where('id_transaksi', str_replace('%20', ' ', $id));
		$hapus = $this->db->delete('t_transaksi');
		if ($hapus) {
			$this->session->set_flashdata('transaksi_alert', '
					<div class="alert alert-success p-1 text-center">
						<small>Transaksi berhasil dihapus.</small>
					</div>');
			redirect(base_url('transaksi'));
		} else {
			$this->session->set_flashdata('transaksi_alert', '
					<div class="alert alert-danger p-1 text-center">
						<small>Transaksi gagal dihapus.</small>
					</div>');
			redirect(base_url('transaksi'));
		}
	}
}
