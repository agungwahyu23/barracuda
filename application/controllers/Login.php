<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_user');
		$this->load->model('M_auth');
	}

	public function loadkonten($page, $data) {
		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['content'] 	= "public/login";

		$this->loadkonten('public/login',$data);
	}
	
	public function register()
	{
		$data['content'] 	= "public/login";

		$this->loadkonten('public/register',$data);
	}

	public function proses_register()
	{
		$random_chr = uniqid();
		$password = md5($random_chr);

		$data = [
			'name' 			=> $this->input->post('name'),
			'email' 		=> $this->input->post('email'),
			'username' 		=> $this->input->post('email'),
			'password' 		=> $password,
			'gender' 		=> $this->input->post('gender'),
			'phone' 		=> $this->input->post('phone'),
			'address' 		=> $this->input->post('address'),
			'level' 		=> '2',
			
		];
		$result = $this->M_auth->register($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

		$cek = $this->M_auth->cek_login($username, $password);
		if(!empty($cek)){
			foreach($cek as $user) {
				$session_data = [
				'email' => $user['email'],
				'username' => $user['username'],
				'name' => $user['name'],
				'email' => $user['email'],
				'gender' => $user['gender'],
				'level' => $user['level'],
			];
				$this->session->set_userdata($session_data);
				if ($user['level'] == '2') {
					$out['status'] = 'berhasil';
				}else{
					$out['status'] = 'gagal';
				} 
			}
		}else{
			$out['status'] = 'gagal';
		} 
		
		echo json_encode($out);
	} 

	public function logout()
    {
        $params = array('username', 'email', 'gender', 'level');
        $this->session->unset_userdata($params);
        redirect('login');
    }
}
