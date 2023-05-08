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

		$this->loadkonten('public/base_layout',$data);
	}
}
