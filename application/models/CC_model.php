<?php

class CC_model extends CI_Model
{
	public function get_cc($id)
	{
		return $this->db->get_where('t_cc', ['kode_cc' => $id])->row_array();
	}

	public function get_all()
	{
		$this->db->order_by('mulai_cc', 'desc');
		return $this->db->get('t_cc')->result_array();
	}

	public function check_active($id)
	{
		$q = $this->db->get_where('t_cc', ['kode_cc' => $id]);
		return $q->num_rows();
	}

	public function tambah()
	{
		$this->db->set('kode_cc', strtoupper($this->input->post('kode_cc', true)));
		$this->db->set('nama_cc', $this->input->post('nama_cc', true));
		$this->db->set('mulai_cc', $this->input->post('mulai_cc', true));
		$this->db->set('akhir_cc', $this->input->post('akhir_cc', true));
		return $this->db->insert('t_cc');
	}

	public function edit()
	{
		$this->db->set('nama_cc', $this->input->post('nama_cc', true));
		$this->db->set('mulai_cc', $this->input->post('mulai_cc', true));
		$this->db->set('akhir_cc', $this->input->post('akhir_cc', true));
		$this->db->where('kode_cc', $this->input->post('kode_cc', true));
		return $this->db->update('t_cc');
	}

	public function hapus($id)
	{
		$this->db->where('kode_cc', $id);
		$a = $this->db->delete('t_cc');

		$this->db->where('kode_cc', $id);
		$b = $this->db->delete('t_transaksi');

		$this->db->where('costcenter', $id);
		$c = $this->db->delete('t_preferensi');

		if ($a && $b && $c) {
			return 1;
		} else {
			return 0;
		}
	}

	public function get_last()
	{
		$this->db->order_by('mulai_cc');
		$this->db->select('kode_cc');
		return $this->db->get('t_cc')->row_array();
	}

	public function get_cc_sub($kat, $akun)
	{
		if ($kat == 'dana_proyek') {
			$id = 1;
		} else if ($kat == 'bonus') {
			$id = 2;
		} else if ($kat == 'retur') {
			$id = 3;
		} else if ($kat == 'lainnya') {
			if ($akun == 1) {
				$id = 4;
			} else {
				$id = 10;
			}
		} else if ($kat == 'material') {
			$id = 5;
		} else if ($kat == 'gaji_upah') {
			$id = 6;
		} else if ($kat == 'kesekretariatan') {
			$id = 7;
		} else if ($kat == 'komunikasi_transportasi') {
			$id = 8;
		} else if ($kat == 'legalitas') {
			$id = 9;
		} else if ($kat == 'lainnya') {
			$id = 10;
		} else if ($kat == 'hutang') {
			$id = 11;
		} else if ($kat == 'piutang') {
			$id = 12;
		} else {
			$id = 0;
		}
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		$this->db->join('t_akun', 't_akun.id_akun=t_transaksi.akun_transaksi', 'inner');
		$this->db->join('t_kategori', 't_kategori.id_kategori=t_transaksi.kategori_transaksi', 'inner');
		$this->db->order_by('tanggal_faktur', 'asc');
		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		if ($id <= 10) {
			$this->db->where('kategori_transaksi', $id);
		} else if ($id == 11) {
			$this->db->where('akun_transaksi', 2);
			$this->db->where('status_transaksi', 0);
		} else if ($id == 12) {
			$this->db->where('akun_transaksi', 1);
			$this->db->where('status_transaksi', 0);
		}
		return $this->db->get('t_transaksi')->result_array();
	}




	public function get_pendapatan()
	{
		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->where('akun_transaksi', 1);
		$a = $this->db->get('t_transaksi')->result_array();
		$total = 0;
		foreach ($a as $key) {
			if ($key['status_transaksi'] == 1) {
				$total = $total + $key['total_biaya_transaksi'];
			}
		}
		return $total;
	}

	public function tambah_pendapatan()
	{
		$this->db->set('kode_cc', $this->input->post('costcenter', true));
		$this->db->set('kode_preferensi', $this->input->post('preferensi', true));
		$this->db->set('akun_transaksi', $this->input->post('akun', true));
		$this->db->set('kategori_transaksi', $this->input->post('kategori', true));
		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('no_faktur', $this->input->post('faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal', true));
		$this->db->set('total_satuan_transaksi', 1);
		$this->db->set('total_biaya_transaksi', $this->input->post('nominal', true));
		if (!empty($this->input->post('keterangan', true))) {
			$this->db->set('keterangan', $this->input->post('keterangan', true));
		}
		if (!empty($this->input->post('status', true))) {
			$this->db->set('status_transaksi', $this->input->post('status', true));
		} else {
			$this->db->set('status_transaksi', 1);
		}
		return $this->db->insert('t_transaksi');
	}

	public function ubah_pendapatan()
	{
		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('no_faktur', $this->input->post('faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal', true));
		$this->db->set('total_biaya_transaksi', $this->input->post('nominal', true));
		if (!empty($this->input->post('keterangan', true))) {
			$this->db->set('keterangan', $this->input->post('keterangan', true));
		}
		if (!empty($this->input->post('status', true))) {
			$this->db->set('status_transaksi', $this->input->post('status', true));
		} else {
			$this->db->set('status_transaksi', 1);
		}
		$this->db->where('id_transaksi', $this->input->post('id'));
		return $this->db->update('t_transaksi');
	}




	public function get_beban()
	{
		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->where('akun_transaksi', 2);
		$a = $this->db->get('t_transaksi')->result_array();
		$total = 0;
		foreach ($a as $key) {
			if ($key['status_transaksi'] == 1) {
				$total = $total + $key['total_biaya_transaksi'];
			}
		}
		return $total;
	}

	public function tambah_beban()
	{
		$this->db->set('kode_cc', $this->input->post('costcenter', true));
		$this->db->set('kode_preferensi', $this->input->post('preferensi', true));
		$this->db->set('akun_transaksi', $this->input->post('akun', true));
		$this->db->set('kategori_transaksi', $this->input->post('kategori', true));
		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('no_faktur', $this->input->post('faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal', true));
		$this->db->set('total_satuan_transaksi',  $this->input->post('total_satuan_transaksi', true));
		$this->db->set('total_biaya_transaksi', $this->input->post('total_biaya_transaksi', true));
		$this->db->set('status_transaksi', $this->input->post('status', true));
		if (!empty($this->input->post('keterangan', true))) {
			$this->db->set('keterangan', $this->input->post('keterangan', true));
		}
		return $this->db->insert('t_transaksi');
	}

	public function ubah_beban()
	{
		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('no_faktur', $this->input->post('faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal', true));
		$this->db->set('total_biaya_transaksi', $this->input->post('total_biaya_transaksi', true));
		$this->db->set('status_transaksi', $this->input->post('status', true));
		if (!empty($this->input->post('keterangan', true))) {
			$this->db->set('keterangan', $this->input->post('keterangan', true));
		}
		$this->db->where('id_transaksi', $this->input->post('id'));
		return $this->db->update('t_transaksi');
	}




	public function get_tertunda()
	{
		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->where('status_transaksi', 0);
		$this->db->where('akun_transaksi', 2);
		$q = $this->db->get('t_transaksi');
		$h = $q->num_rows();

		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		$this->db->where('status_transaksi', 0);
		$this->db->where('akun_transaksi', 1);
		$q = $this->db->get('t_transaksi');
		$p = $q->num_rows();

		return $h . 'H / ' . $p . 'P';
	}

	public function get_detail_tertunda($data)
	{
		$this->db->join('t_akun', 'id_akun=akun_transaksi', 'inner');
		$this->db->join('t_kategori', 'id_kategori=kategori_transaksi', 'inner');
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		return $this->db->get_where('t_transaksi', ['id_transaksi' => $data['id']])->row_array();
	}

	public function get_transaksi_tertunda($data)
	{
		$this->db->select('id_tagihan, id_bayar, no_faktur, tanggal_faktur, total_biaya_transaksi, keterangan, username');
		$this->db->join('t_transaksi', 'id_transaksi=id_bayar', 'inner');
		$this->db->join('t_akun', 'id_akun=akun_transaksi', 'inner');
		$this->db->join('t_kategori', 'id_kategori=kategori_transaksi', 'inner');
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		return $this->db->get_where('t_tertunda', ['id_tagihan' => $data['id']])->result_array();
	}

	public function bayar_tertunda()
	{
		$this->db->set('kode_cc', $this->input->post('costcenter', true));
		$this->db->set('kode_preferensi', $this->input->post('preferensi', true));
		$this->db->set('akun_transaksi', $this->input->post('akun', true));
		$this->db->set('kategori_transaksi', $this->input->post('kategori', true));
		$this->db->set('username', $this->input->post('username', true));
		$this->db->set('no_faktur', $this->input->post('faktur', true));
		$this->db->set('tanggal_faktur', $this->input->post('tanggal', true));
		$this->db->set('total_satuan_transaksi', 1);
		$this->db->set('total_biaya_transaksi', $this->input->post('total_biaya_transaksi', true));
		if (!empty($this->input->post('keterangan', true))) {
			$this->db->set('keterangan', $this->input->post('keterangan', true));
		}
		$this->db->insert('t_transaksi');

		$q = $this->db->query('SELECT max(id_transaksi) AS max_id FROM t_transaksi')->row_array();
		$id_bayar = $q['max_id'];

		$this->db->set('id_tagihan', $this->input->post('tagihan', true));
		$this->db->set('id_bayar', $id_bayar);
		return $this->db->insert('t_tertunda');
	}

	public function hapus_tertunda($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete('t_transaksi');

		$this->db->where('id_bayar', $id);
		$this->db->delete('t_tertunda');
	}

	public function update_progres()
	{
		$q = $this->db->get_where('t_cc', ['kode_cc' => strtoupper($this->input->post('kode_cc', true))])->row_array();

		$this->db->set('progres_cc', $q->progres_cc + $this->input->post('progres_cc', true));
		$this->db->where('kode_cc', $this->input->post('kode_cc', true));
		$this->db->update('t_cc');

		$this->db->set('costcenter', $this->input->post('kode_cc', true));
		$this->db->set('tanggal', $this->input->post('tanggal', true));
		$this->db->set('keterangan', $this->input->post('keterangan', true));
		$this->db->set('progres', $this->input->post('progres_cc', true));
		return $this->db->insert('t_cc_progress');
	}

	public function get_detail_progres($id)
	{
		$this->db->select('no, nama_cc, costcenter, tanggal, keterangan, progres');
		$this->db->join('t_cc', 'costcenter=kode_cc', 'inner');
		return $this->db->get_where('t_cc_progress', ['costcenter' => $id])->result_array();
	}





	public function get_ledger()
	{
		$this->db->join('t_preferensi', 't_preferensi.kode_preferensi=t_transaksi.kode_preferensi', 'inner');
		$this->db->join('t_akun', 't_akun.id_akun=t_transaksi.akun_transaksi', 'inner');
		$this->db->join('t_kategori', 't_kategori.id_kategori=t_transaksi.kategori_transaksi', 'inner');
		$this->db->order_by('tanggal_faktur', 'asc');
		$this->db->where('kode_cc', str_replace('%20', ' ', $this->session->userdata('costcenter')));
		// if ($id <= 10) {
		// 	$this->db->where('kategori_transaksi', $id);
		// } else if ($id == 11) {
		// 	$this->db->where('akun_transaksi', 2);
		// 	$this->db->where('status_transaksi', 0);
		// } else if ($id == 12) {
		// 	$this->db->where('akun_transaksi', 1);
		// 	$this->db->where('status_transaksi', 0);
		// }
		return $this->db->get('t_transaksi')->result_array();
	}
}
