<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
	public function getData()
	{
		$sql = "SELECT u.id, 
		u.username, 
		u.email, 
		u.name, 
		u.gender,
		u.phone,
		u.is_active,
		u.verified_at,
		u.level,
		u.created_at,
		u.created_by,
		u.updated_at,
		u.updated_by,
		(CASE
			WHEN u.is_active = '1' THEN 'Active'
			WHEN u.is_active = '0' THEN 'Nonactive'
			else '-' 
		END) as status,
		(CASE
			WHEN u.gender = '1' THEN 'Laki-laki'
			WHEN u.gender = '0' THEN 'Perempuan'
			else '-' 
		END) as gender,
		(CASE
			WHEN u.level = '1' THEN 'Admin'
			WHEN u.level = '2' THEN 'User'
			else '-' 
		END) as level
		FROM user u";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function select_by_id($id)
	{
		$sql = "SELECT u.*  FROM user u where u.id = ?";
		$data = $this->db->query($sql, array($id));
		return $data->row();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('user', $data, $where);
		return $result;
	}
}
