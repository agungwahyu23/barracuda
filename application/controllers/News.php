<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class News extends CI_Controller {

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
		$data['content'] 	= "";

		$this->loadkonten('public/artikel/template',$data);
	}

	public function show($id) 
	{
		$data['content'] 	= $this->db->query("select * from news where slug = '".$id."'")->row();

		$this->loadkonten('public/artikel/template',$data);
	}
}
