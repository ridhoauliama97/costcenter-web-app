<?php

/**
 *
 */
class Auth_model extends CI_Model
{
	// Login START
	public function check_user()
	{
		$x = $this->db->get_where('t_user', ['username' => $this->input->post('username', true), 'password' => hash('sha256', $this->input->post('password', true))]);
		return $x->num_rows();
	}

	public function login()
	{
		return $this->db->get_where('t_user', ['username' => $this->input->post('username', true)])->row_array();
	}
	// Login END

	// Register START
	public function check_code()
	{
		$x = $this->db->get_where('t_kode', ['kode_daftar' => hash('sha256', $this->input->post('kode', true)), 'username' => '']);
		return $x->num_rows();
	}

	public function check_user_reg()
	{
		$x = $this->db->get_where('t_user', ['username' => $this->input->post('username', true)]);
		return $x->num_rows();
	}

	public function register()
	{
		$this->db->set('username', $this->input->post('username', true));
		$this->db->where('kode_daftar', hash('sha256', $this->input->post('kode', true)));
		$this->db->update('t_kode');

		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('password', hash('sha256', $this->input->post('password', true)));
		$this->db->set('nama_pengguna', 'Nama Pengguna');
		$this->db->set('role', 2);
		$this->db->insert('t_user');
	}

	public function get_q()
	{
		return $this->db->get('t_pertanyaan')->result_array();
	}

	public function simpan_setup()
	{
		$this->db->set('nama_pengguna', $this->input->post('nama', true));
		$this->db->set('keamanan_1', $this->input->post('pertanyaan1', true));
		$this->db->set('keamanan_2', $this->input->post('pertanyaan2', true));
		$this->db->set('jawaban_1', strtolower($this->input->post('jawaban1', true)));
		$this->db->set('jawaban_2', strtolower($this->input->post('jawaban2', true)));
		$this->db->where('username', $this->session->userdata('user'));
		$this->db->update('t_user');
	}
	// Register END

	// Reset
	public function check_user_reset()
	{
		$x = $this->db->get_where('t_user', ['username' => $this->session->userdata('user_reset')]);
		return $x->num_rows();
	}

	public function q_reset()
	{
		return $this->db->get_where('t_user', ['username' => $this->session->userdata('user_reset')])->row_array();
	}

	public function cek_jawaban()
	{
		$x = $this->db->get_where('t_user', ['username' => $this->session->userdata('user_reset'), 'jawaban_1' => strtolower($this->input->post('jawaban1', true))]);
		$a1 = $x->num_rows();
		$x = $this->db->get_where('t_user', ['username' => $this->session->userdata('user_reset'), 'jawaban_2' => strtolower($this->input->post('jawaban2', true))]);
		$a2 = $x->num_rows();
		return $a1 . $a2;
	}

	public function reset_password()
	{
		$this->db->set('password', hash('sha256', $this->session->userdata('psw')));
		$this->db->where('username', $this->session->userdata('user_reset'));
		$this->db->update('t_user');
	}
	// Reset END
}
