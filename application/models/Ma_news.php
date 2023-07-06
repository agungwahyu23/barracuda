<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ma_news extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT * FROM news
		WHERE deleted_at IS NULL
		ORDER BY id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function save_data($data)
	{
		$result = $this->db->insert('news', $data);
		return $result;
	}
	
	public function select_by_id($id)
	{
		$sql = "SELECT a.*, g.genre, u.name, o.attachment, o.status 
				FROM news a 
				LEFT JOIN genre g ON a.genre_id = g.id 
				LEFT JOIN user u ON u.id = a.user_id
				LEFT JOIN tb_order o ON o.id = a.order_id
				WHERE a.id = '".$id."'
				ORDER BY a.id ASC";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function select_detail_single($id)
	{
		$sql = "SELECT sa.*, s.title, s.first_name_composer, s.file
				FROM single_album sa 
				LEFT JOIN single s ON s.id = sa.single_id
				WHERE sa.album_id = '".$id."'
				ORDER BY sa.id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('news', $data, $where);
		return $result;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM news WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
