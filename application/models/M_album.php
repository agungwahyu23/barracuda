<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_album extends CI_Model
{

	public function getData($id)
	{
		$sql = "SELECT a.*, g.genre, o.status
		FROM album a 
		LEFT JOIN genre g ON a.genre_id = g.id 
		LEFT JOIN tb_order o ON a.order_id = o.id 
		WHERE a.created_by = '".$id."'
		ORDER BY a.id ASC";
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
		$result = $this->db->insert('album', $data);
		return $result;
	}
	
	public function save_single($data)
	{
		$result = $this->db->insert('single', $data);
		return $result;
	}
	
	public function save_single_album($data)
	{
		$result = $this->db->insert('single_album', $data);
		return $result;
	}

	public function select_by_id($id)
	{
		$sql = "SELECT a.*, g.genre, u.name, o.attachment 
				FROM album a 
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
		$sql = "SELECT sa.*, s.title, s.first_name_composer 
				FROM single_album sa 
				LEFT JOIN single s ON s.id = sa.single_id
				WHERE sa.album_id = '".$id."'
				ORDER BY sa.id ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function update($data, $where)
	{
		$result = $this->db->update('album', $data, $where);
		return $result;
	}

	public function hapus($id)
	{
		$sql = "DELETE FROM album WHERE id='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
