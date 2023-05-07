<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_single extends CI_Model
{

	public function getData($id_user)
	{
		$sql = "SELECT * FROM single WHERE user_id = '".$id_user."' and is_album = 0 ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function getGenre()
	{
		$sql = "SELECT * FROM genre ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function save_data_order($data)
	{
		$result = $this->db->insert('tb_order', $data);
		return $result;
	}

	public function save_data($data)
	{
		$result = $this->db->insert('single', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT s.*, g.genre 
		FROM single s 
		LEFT JOIN genre g on g.id = s.genre_id
		where s.id = ?";
		$data = $this->db->query($sql, array($id));
		return $data->row();
	}

	public function getUser($id)
	{
		$sql = "SELECT *
		FROM user 
		where id = ?";
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
