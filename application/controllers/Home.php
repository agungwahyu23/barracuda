<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
