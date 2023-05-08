<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->library('session');
		$this->load->helper('app');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$data['page'] 		= "Dashboard";
		$data['content'] 	= "admin/dashboard";
		$data['album'] 		= $this->db->query("SELECT COUNT(album.id) as result FROM album LEFT JOIN tb_order ON tb_order.id = album.order_id WHERE tb_order.status = 1 AND album.user_id = '".$id."'")->row();

		$data['single'] 		= $this->db->query("SELECT COUNT(single.id) as result FROM single LEFT JOIN tb_order ON tb_order.id = single.order_id WHERE tb_order.status = 1 AND  (single.is_album != 1 OR single.is_album IS null) AND single.user_id = '".$id."'")->row();
		
		$data['income'] 		= $this->db->query("SELECT total_income as result FROM user where id = '".$id."'")->row();


		$this->loadkonten('admin/app_base',$data);
	}

}
