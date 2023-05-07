<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_takedown extends CI_Model
{

	public function getData($id_user)
	{
		$sql = "SELECT
		r.*,
		a.title,
		s.title
		FROM
			request r
		LEFT JOIN album a ON
			r.album_id = a.id
		LEFT JOIN single s ON s.id = r.single_id 
		WHERE r.type = 1 AND r.created_by = '".$id_user."'
		ORDER BY
			r.id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function getSingle($id_user)
	{
		$sql = "SELECT
			id,
			CONCAT(title, '  - single') as title
		FROM
			single
		WHERE user_id = '".$id_user."'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function getAlbum($id_user)
	{
		$sql = "SELECT
			id,
			CONCAT(title, '  - album') as title
		FROM
			album
		WHERE user_id = '".$id_user."'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function save_data($data)
	{
		$result = $this->db->insert('request', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT r.*, a.title as title_album, s.title as title_single FROM request r
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
