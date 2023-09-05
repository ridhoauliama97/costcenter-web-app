<?php

class Kategori_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('t_kategori')->result_array();
	}
}
