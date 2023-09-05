<?php

class Akun_model extends CI_Model
{
	public function get_kode()
	{
		$this->db->where('username !=', 'admin');
		$this->db->order_by('username', 'asc');
		return $this->db->get('t_kode')->result_array();
	}

	public function check_kode($kode)
	{
		$q = $this->db->get_where('t_kode', ['string' => $kode]);
		return $q->num_rows();
	}

	public function tambah_kode($kode)
	{
		$this->db->set('kode_daftar', hash('sha256', $kode));
		$this->db->set('string', $kode);
		$x = $this->db->insert('t_kode');
		if ($x) {
			return 1;
		} else {
			return 0;
		}
	}

	public function hapus_kode($kode)
	{
		$q = $this->db->get_where('t_kode', ['string' => $kode]);
		$x = $q->num_rows();
		if ($x == 1) {
			$this->db->where('kode_daftar', hash('sha256', $kode));
			$this->db->delete('t_kode');
			return 1;
		} else {
			return 0;
		}
	}

	public function get_all_biodata()
	{
		$this->db->where('username !=', 'admin');
		$this->db->order_by('username', 'asc');
		return $this->db->get('t_user')->result_array();
	}


	public function get_biodata()
	{
		$this->db->where('username', $this->session->userdata('user'));
		return $this->db->get('t_user')->row_array();
	}

	public function ubah_biodata()
	{
		$this->db->set('nama_pengguna', $this->input->post('nama', true));
		$this->db->set('alamat', $this->input->post('alamat', true));
		$this->db->set('no_hp', $this->input->post('hp', true));
		$this->db->where('username', $this->input->post('username', true));
		return $this->db->update('t_user');
	}

	public function ubah_password()
	{
		$this->db->set('password', hash('sha256', $this->input->post('pb1', true)));
		$this->db->where('username', $this->input->post('username', true));
		return $this->db->update('t_user');
	}

	public function ubah_pertanyaan()
	{
		$this->db->set('keamanan_1', $this->input->post('keamanan_1', true));
		$this->db->set('keamanan_2', $this->input->post('keamanan_2', true));
		$this->db->set('jawaban_1', $this->input->post('jawaban_1', true));
		$this->db->set('jawaban_2', $this->input->post('jawaban_2', true));
		$this->db->where('username', $this->input->post('username', true));
		return $this->db->update('t_user');
	}
}
