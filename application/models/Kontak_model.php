<?php

class Kontak_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('t_kontak')->result_array();
	}

	public function tambah_kontak()
	{
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('telp', $this->input->post('telp'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		return $this->db->insert('t_kontak');
	}

	public function ubah_kontak()
	{
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('telp', $this->input->post('telp'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('t_kontak');
	}
}
