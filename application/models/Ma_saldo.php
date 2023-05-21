<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_saldo extends CI_Model
{

	public function getData($id_user)
	{
		$sql = "SELECT
		u.*
		FROM
			user u
		ORDER BY
			u.id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function save_data($data)
	{
		$result = $this->db->insert('donation', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT d.* FROM donation d
				WHERE d.id = '".$id."'
				ORDER BY d.id ASC";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('donation', $data, $where);
		return $result;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM donation WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
