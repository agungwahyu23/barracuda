<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_single extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT * FROM single WHERE is_album = 0 OR is_album IS NULL ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function getGenre()
	{
		$sql = "SELECT * FROM genre ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function save_data($data)
	{
		$result = $this->db->insert('single', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT s.*, o.attachment, o.status FROM single s
		LEFT JOIN tb_order o ON s.order_id=o.id
		where s.id = ?";
		$data = $this->db->query($sql, array($id));
		return $data->row();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('single', $data, $where);
		return $result;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM single WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
