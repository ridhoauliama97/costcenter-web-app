<?php

class Preferensi_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('t_preferensi');
		$this->db->where('costcenter', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->or_where('kode_preferensi <', 11);
		$this->db->order_by('uraian_preferensi', 'asc');
		return $this->db->get()->result_array();
	}

	public function get_all_pref()
	{
		$this->db->select('*');
		$this->db->from('t_preferensi');
		$this->db->where('kode_preferensi >', 10);
		$this->db->order_by('uraian_preferensi', 'asc');
		return $this->db->get()->result_array();
	}

	public function get_all_for_transaksi()
	{
		$this->db->select('*');
		$this->db->from('t_preferensi');
		$this->db->where('costcenter', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->where('kode_preferensi >', 10);
		$this->db->order_by('uraian_preferensi', 'asc');
		return $this->db->get()->result_array();
	}

	public function max_id()
	{
		$q = $this->db->query('SELECT max(kode_preferensi) AS max_id FROM t_preferensi')->row_array();
		return $q['max_id'] + 1;
	}

	public function tambah()
	{
		$this->db->set('uraian_preferensi', $this->input->post('uraian_preferensi', true));
		$this->db->set('kategori_preferensi', $this->input->post('kategori_preferensi', true));
		$this->db->set('satuan_preferensi', $this->input->post('satuan_preferensi', true));
		$this->db->set('harga_preferensi', $this->input->post('harga_preferensi', true));
		$this->db->set('costcenter', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		return $this->db->insert('t_preferensi');
	}

	public function edit()
	{
		$this->db->set('uraian_preferensi', $this->input->post('uraian_preferensi', true));
		$this->db->set('kategori_preferensi', $this->input->post('kategori_preferensi', true));
		$this->db->set('satuan_preferensi', $this->input->post('satuan_preferensi', true));
		$this->db->set('harga_preferensi', $this->input->post('harga_preferensi', true));
		$this->db->where('kode_preferensi', intval($this->input->post('kode_preferensi', true)));
		return $this->db->update('t_preferensi');
	}

	public function get_pref_salin()
	{
		$this->db->select('*');
		$this->db->from('t_preferensi');
		$this->db->where('costcenter', $this->input->post('kode_cc', true));
		$this->db->where('kode_preferensi >', 10);
		$this->db->order_by('uraian_preferensi', 'asc');
		return $this->db->get()->result_array();
	}

	public function salin_pref($data)
	{
		$this->db->set('uraian_preferensi', $data['uraian']);
		$this->db->set('satuan_preferensi', $data['satuan']);
		$this->db->set('harga_preferensi', $data['harga']);
		$this->db->set('costcenter', $data['costcenter']);
		return $this->db->insert('t_preferensi');
	}
}
