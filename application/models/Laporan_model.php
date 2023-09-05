<?php

class Laporan_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('t_cc')->result_array();
	}

	public function get_tahun_min()
	{
		$this->db->select('mulai_cc');
		$this->db->order_by('mulai_cc', 'asc');
		return $this->db->get('t_cc')->row_array();
	}

	public function get_tahun_max()
	{
		$this->db->select('akhir_cc');
		$this->db->order_by('akhir_cc', 'desc');
		return $this->db->get('t_cc')->row_array();
	}

	public function get_per_tahun($tahun)
	{
		$this->db->like('mulai_cc', $tahun, 'after');
		$this->db->or_like('akhir_cc', $tahun, 'after');
		return $this->db->get('t_cc')->result_array();
	}

	public function get_per_cc($id, $acc, $kat)
	{
		$this->db->select('uraian_preferensi, total_biaya_transaksi, akun_transaksi, status_transaksi, kategori_transaksi');
		$this->db->join('t_cc', 't_cc.kode_cc=t_transaksi.kode_cc', 'inner');
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		$this->db->join('t_kategori', 't_kategori.id_kategori=t_transaksi.kategori_transaksi', 'inner');
		$this->db->where('t_transaksi.kode_cc', str_replace('%20', ' ', $id));
		$this->db->where('t_transaksi.akun_transaksi', $acc);
		$this->db->where('kategori_transaksi', $kat);
		if (!empty($this->session->userdata('tahun_cc'))) {
			$this->db->where('tanggal_faktur>=', $this->session->userdata('tahun_cc') . '-01-01');
			$this->db->where('tanggal_faktur<=', $this->session->userdata('tahun_cc') . '-12-31');
		}
		return $this->db->get('t_transaksi')->result_array();
	}
}
