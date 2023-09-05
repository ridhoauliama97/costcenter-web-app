<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
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

	public function petunjuk_penggunaan()
	{
		$data['menu'] = 8;
		$data['title'] = 'Petunjuk Penggunaan | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('bantuan/petunjuk_penggunaan', $data);
		$this->load->view('templates/footer');
	}

	public function faq()
	{
		$data['menu'] = 8;
		$data['title'] = 'FAQ | Cost Center CV. Pelita Karya Sejahtera';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('bantuan/faq', $data);
		$this->load->view('templates/footer');
	}
}
