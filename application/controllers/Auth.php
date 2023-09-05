<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
	}

	public function login()
	{
		$data['title'] = 'Login &mdash; Cost Center CV. Pelita Karya Sejahtera';
		if (!empty($this->session->userdata('user'))) {
			redirect(base_url('dashboard'));
		}
		$this->load->view('login', $data);
	}

	public function reset_password()
	{
		$data['title'] = 'Lupa Password';
		$this->load->view('reset_password', $data);
	}

	public function cek_reset()
	{
		$data['title'] = 'Reset Password';
		$this->session->set_userdata('proses_reset', 1);
		if (empty($this->session->userdata('user_reset'))) {
			$this->session->set_userdata('user_reset', $this->input->post('username', true));
		}
		$this->load->model('Auth_model');
		$check = $this->Auth_model->check_user_reset();
		if ($check == 1) {
			$row = $this->Auth_model->q_reset();
			if ($row['keamanan_1'] == 0 | $row['keamanan_1'] == 0) {
				$data['q1'] = 'Pertanyaan keamanan anda belum dibuat.';
				$data['q2'] = 'Pertanyaan keamanan anda belum dibuat.';
			} else {
				$q = $this->db->get_where('t_pertanyaan', ['id' => $row['keamanan_1']])->row_array();
				$data['q1'] = $q['string'];
				$q = $this->db->get_where('t_pertanyaan', ['id' => $row['keamanan_2']])->row_array();
				$data['q2'] = $q['string'];
			}
			$this->load->view('password_ketemu', $data);
		} else {
			$this->session->set_flashdata('error_reset', '
					<div class="alert alert-danger p-1 text-center">
						<small>Username tidak ditemukan.</small>
					</div>');
			redirect(base_url('auth/reset_password'));
		}
	}

	public function register()
	{
		$data['title'] = 'Buat Akun Baru';
		$data['kode'] = '';
		if (!empty($this->input->get('kode', true))) {
			$data['kode'] = $this->input->get('kode', true);
		}
		$this->load->view('daftar', $data);
	}

	public function setup_akun()
	{
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth/login'));
		}
		$data['title'] = 'Pengaturan Akun Baru';
		$this->load->model('Auth_model');
		$data['keamanan'] = $this->Auth_model->get_q();
		$this->load->view('setup_akun', $data);
	}


	// PROSES

	public function proses_login()
	{
		$this->load->model('Auth_model');
		$check = $this->Auth_model->check_user();
		if ($check == 1) {
			$row = $this->Auth_model->login();
			$this->session->set_userdata('user', $row['username']);
			$this->session->set_userdata('role', $row['role']);
			$this->session->set_flashdata(
				'greeting',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					<p class="alert-heading mb-0"><b> Login Berhasil! </b></p>
					Selamat datang, ' . $row['nama_pengguna'] . '.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>'
			);
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('username', $this->input->post('username', true));
			$this->session->set_flashdata('error_login', '
					<div class="alert alert-danger my-3 text-center">
						<small>Username / Password salah.</small>
					</div>');
			redirect(base_url('auth/login'));
		}
	}

	public function proses_daftar()
	{
		$this->load->model('Auth_model');
		$check = $this->Auth_model->check_code();
		if ($check == 1) {
			$ckuser = $this->Auth_model->check_user_reg();
			if ($ckuser != 0) {
				$this->session->set_flashdata('username', $this->input->post('username', true));
				$this->session->set_flashdata('error_login', '
					<div class="alert alert-danger p-1 text-center">
						<small>Username telah digunakan, Silahkan coba dengan username lain.</small>
					</div>');
				redirect(base_url('auth/register'));
			} else if ($this->input->post('password', true) != $this->input->post('password2', true)) {
				$this->session->set_flashdata('username', $this->input->post('username', true));
				$this->session->set_flashdata('error_login', '
					<div class="alert alert-danger p-1 text-center">
						<small>Password dan Konfirmasi Password tidak sama.</small>
					</div>');
				redirect(base_url('auth/register'));
			} else {
				$this->Auth_model->register();
				$login = $this->Auth_model->login();
				$this->session->set_userdata('user', $login['username']);
				$this->session->set_userdata('role', $login['role']);
				redirect(base_url('auth/setup_akun'));
			}
		} else {
			$this->session->set_flashdata('username', $this->input->post('username', true));
			$this->session->set_flashdata('error_login', '
					<div class="alert alert-danger p-1 text-center">
						<small>Kode Pendaftaran Salah, Silahkan periksa lagi.</small>
					</div>');
			redirect(base_url('auth/register'));
		}
	}

	public function proses_setup()
	{
		if (empty($this->session->userdata('user'))) {
			redirect(base_url('auth/login'));
		}
		$this->load->model('Auth_model');
		$this->Auth_model->simpan_setup();
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('error_login', '
				<div class="alert alert-success p-1 text-center">
					<small>Pendaftaran selesai. Silahkan login dengan akun Anda.</small>
				</div>');
		redirect(base_url('auth/login'));
	}

	public function proses_reset()
	{
		if (!empty($this->session->userdata('proses_reset'))) {
			$this->session->set_flashdata('jawab1', $this->input->post('jawaban1', true));
			$this->session->set_flashdata('jawab2', $this->input->post('jawaban2', true));
			$this->load->model('Auth_model');
			$cek = $this->Auth_model->cek_jawaban();
			if ($cek != '11') {
				$str = array();
				if (substr($cek, 0, 1) == 0) {
					$str[] = $this->input->post('jawaban1', true);
					$this->session->unset_userdata('jawab1');
				}
				if (substr($cek, 1, 1) == 0) {
					$str[] = $this->input->post('jawaban2', true);
					$this->session->unset_userdata('jawab2');
				}
				$this->session->set_flashdata('error_jawab', '
					<div class="alert alert-danger p-1 text-center">
						<small>Jawaban salah: <br /> <strong>' . implode('<br>', $str) . '</strong></small>
					</div>');
				redirect(base_url('auth/cek_reset'));
			} else {
				$n = 6;
				$char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$randomString = '';
				for ($i = 0; $i < $n; $i++) {
					$index = rand(0, strlen($char) - 1);
					$randomString .= $char[$index];
				}
				$password = $randomString;
				$this->session->set_userdata('psw', $password);
				$this->Auth_model->reset_password();
				$this->load->view('reset_berhasil');
			}
		} else {
			$this->session->set_flashdata('error_login', '
				<div class="alert alert-danger p-1 text-center">
					<small>Sesi reset password sudah habis. Mohon lakukan reset password lagi.</small>
				</div>');
			redirect(base_url('auth/login'));
		}
	}

	public function logout($str)
	{
		if (empty($str) | !isset($str)) {
			$str = '<div class="alert alert-success my-3 text-center">
						Berhasil Keluar.
					</div>';
		} else {
			$str = '<div class="alert alert-warning my-3 text-center">
						Anda telah dikeluarkan oleh sistem karena tidak ada aktivitas.
					</div>';
		}
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('error_login', $str);
		redirect(base_url('auth/login'));
	}
}
