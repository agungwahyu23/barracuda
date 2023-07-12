<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function loadkonten($page, $data) {
		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['content'] 	= "public/home";
		$data['artikels'] = $this->db->query("SELECT * FROM news WHERE is_publish = 1 ORDER BY created_at DESC LIMIT 3")->result();

		$data['countArtikel'] = $this->db->query("SELECT * FROM news WHERE is_publish = 1 ORDER BY created_at DESC")->num_rows();

		$this->loadkonten('public/base_layout',$data);
	}
}
