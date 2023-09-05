<?php

class Transaksi_model extends CI_Model
{
	public function max_id()
	{
		$q = $this->db->query('SELECT max(id_transaksi) AS max_id FROM t_transaksi')->row_array();
		return $q['max_id'] + 1;
	}

	public function get_per_cc($cc)
	{
		$this->db->join('t_cc', 't_cc.kode_cc=t_transaksi.kode_cc', 'inner');
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		$this->db->join('t_kategori', 't_kategori.id_kategori=t_transaksi.kategori_transaksi', 'inner');
		$this->db->order_by('t_preferensi.kode_preferensi', 'asc');
		$this->db->where('t_transaksi.kode_cc', str_replace('%20', ' ', $cc));
		return $this->db->get('t_transaksi')->result_array();
	}

	public function get_all()
	{
		$this->db->join('t_cc', 't_cc.kode_cc=t_transaksi.kode_cc', 'inner');
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		$this->db->join('t_kategori', 't_kategori.id_kategori=t_transaksi.kategori_transaksi', 'inner');
		$this->db->order_by('mulai_cc', 'desc');
		$this->db->order_by('t_preferensi.kode_preferensi', 'asc');
		return $this->db->get('t_transaksi')->result_array();
	}

	public function tambah()
	{
		$this->db->set('kode_cc', $this->input->post('kode_cc', true));
		$this->db->set('kode_preferensi', $this->input->post('kode_preferensi', true));
		$this->db->set('no_faktur', $this->input->post('no_faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal_faktur', true));
		$this->db->set('total_satuan_transaksi', $this->input->post('total_satuan_transaksi', true));
		$this->db->set('total_biaya_transaksi', $this->input->post('total_biaya_transaksi', true));
		$this->db->set('akun_transaksi', $this->input->post('akun_transaksi', true));
		$this->db->set('kategori_transaksi', $this->input->post('kategori_transaksi', true));
		$this->db->set('username', $this->session->userdata('user'));
		return $this->db->insert('t_transaksi');
	}

	public function edit()
	{
		$this->db->set('kode_cc', $this->input->post('kode_cc', true));
		$this->db->set('kode_preferensi', $this->input->post('kode_preferensi', true));
		$this->db->set('no_faktur', $this->input->post('no_faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal_faktur', true));
		$this->db->set('total_satuan_transaksi', $this->input->post('total_satuan_transaksi', true));
		$this->db->set('total_biaya_transaksi', $this->input->post('total_biaya_transaksi', true));
		$this->db->set('akun_transaksi', $this->input->post('akun_transaksi', true));
		$this->db->set('kategori_transaksi', $this->input->post('kategori_transaksi', true));
		$this->db->set('username', $this->session->userdata('user'));
		$this->db->where('id_transaksi', $this->input->post('id_transaksi', true));
		return $this->db->update('t_transaksi');
	}
}
