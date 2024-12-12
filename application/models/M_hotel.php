<?php

class M_hotel extends CI_Model 
{
	public function simpan($data)
	{
		$this->db->insert('tbl_hotel', $data);
		
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tbl_hotel');
		$this->db->order_by('id_hotel', 'desc');
		return $this->db->get()->result();
	}

	public function detail($id_hotel)
	{
		$this->db->select('*');
		$this->db->from('tbl_hotel');
		$this->db->where('id_hotel', $id_hotel);
		return $this->db->get()->row();
	}
	public function edit($data)
	{
		$this->db->where('id_hotel', $data['id_hotel']);
		$this->db->update('tbl_hotel', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_hotel', $data['id_hotel']);
		$this->db->delete('tbl_hotel', $data);
	}
}


