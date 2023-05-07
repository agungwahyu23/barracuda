<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_donation extends CI_Model
{

	public function getData($id_user)
	{
		$sql = "SELECT
		d.*
		FROM
			donation d
		WHERE d.created_by = '".$id_user."'
		ORDER BY
			d.id ASC";
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
