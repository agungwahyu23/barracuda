<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('M_profile');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');
		
		$this->load->view($page, $data);
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$data['page'] 		= "Profile";
		$data['user']		 = $this->M_profile->select_by_id($id);
		$data['content'] 	= "admin/v_profile/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
		$id = $this->session->userdata('id');
		$name = $this->input->post('name');
		$password 	= $this->input->post('password');

		// var_dump($newnamefile);
		// die;

		$where = [
			'id' 		   => $this->input->post('id')
		];

		$newnamefile = 'profile_' . $id . '_' . str_replace(" ", "_", strtolower($name));
		$config['upload_path'] = './upload/profile';
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size'] = '102400';
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['file_ext_tolower'] = TRUE;
		$config['file_name'] = $newnamefile;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (isset($password)) {
			// cek upload foto atau tidak
			if ($this->upload->do_upload('photo')){
				$profile_file = $this->upload->data();
				$path['link']= "upload/profile/";

				$data = [
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email'),
					'name' 			=> $this->input->post('name'),
					'gender' 		=> $this->input->post('gender'),
					'phone' 		=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					'is_active' 		=> $this->input->post('is_active'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					'password' 		=> md5($this->input->post('password')),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id'),
					'photo'            		=> $profile_file['file_name'],
				];
			}else{
				$data = [
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email'),
					'name' 			=> $this->input->post('name'),
					'gender' 		=> $this->input->post('gender'),
					'phone' 		=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					'is_active' 		=> $this->input->post('is_active'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					'password' 		=> md5($this->input->post('password')),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id')
				];
			}
		}else{
			if ($this->upload->do_upload('photo')){
				$profile_file = $this->upload->data();
				
				$data = [
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email'),
					'name' 			=> $this->input->post('name'),
					'gender' 		=> $this->input->post('gender'),
					'phone' 		=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					'is_active' 	=> $this->input->post('is_active'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					// 'password' 		=> md5($this->input->post('password'))
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id'),
					'photo'            		=> $profile_file['file_name']
				];
			}else{
				$data = [
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email'),
					'name' 			=> $this->input->post('name'),
					'gender' 		=> $this->input->post('gender'),
					'phone' 		=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					'is_active' 	=> $this->input->post('is_active'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					// 'password' 		=> md5($this->input->post('password'))
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id')
				];
			}
		}
		$result = $this->M_profile->update($data, $where);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}
}
