<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function register($data)
	{
		$result = $this->db->insert('user', $data);
		return $result;
	}

	public function cek_login($username, $password)
	{
		$sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password'";
		$query = $this->db->query($sql);
		$user = $query->row();
		if (!empty($user)) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
}
