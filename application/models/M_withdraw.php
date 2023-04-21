<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_withdraw extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT * FROM withdraw ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function getUser($id)
	{
		$sql = "SELECT * FROM user where id = '".$id."'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function save_data($data)
	{
		$result = $this->db->insert('withdraw', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT r.*, a.title, s.title FROM request r
				LEFT JOIN album a on a.id = r.album_id
				LEFT JOIN single s on s.id = r.single_id
				WHERE r.id = '".$id."'
				ORDER BY r.id ASC";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('takedown', $data, $where);
		return $result;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM takedown WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
