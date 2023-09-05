<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blocked extends CI_Controller
{

	public function index()
	{
		$data['title'] = '404 - Halaman Tidak Ditemukan';
		$this->load->view('templates/header', $data);
		$this->load->view('blocked/index', $data);
		$this->load->view('templates/footer');
	}
}
