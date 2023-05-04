<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_withdraw extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT w.*, u.name FROM withdraw w
		LEFT JOIN user u ON w.user_id = u.id 
		ORDER BY id ASC";
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
		$sql = "SELECT id, user_id, amount, attachment, created_at, created_by, updated_at, updated_by, status
				FROM withdraw
				WHERE id = '".$id."'
				ORDER BY id ASC";
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
