<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_user');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');
		
		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "User";
		$data['content'] 	= "admin/v_auser/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$list = $this->Ma_user->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $user) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user->username;
			$row[] = $user->email;
			$row[] = $user->phone;
			$row[] = $user->name;
			$row[] = $user->gender;

			$status = '';
			if ($user->status == 'Active') {
				$status = '<span class="badge bg-green">Aktif</span>';
			}elseif ($user->status == 'Nonactive') {
				$status = '<span class="badge bg-red">Nonaktif</span>';
			}else{
				$status = '-';
			}
			$row[] = $status;

			$verified_at = '';
			if ($user->verified_at != '' || $user->verified_at != null) {
				$verified_at = '<span class="badge bg-green">Terverifikasi</span>';
			}elseif ($user->verified_at == '' || $user->verified_at == null) {
				$verified_at = '<span class="badge bg-red">Belum verifikasi</span>';
			}else{
				$verified_at = '-';
			}
			$row[] = $verified_at;

			$row[] = $user->level;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Aksi <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('v2/user-detail') . "/" . 
			$user->id . '">Detail</a></li>';

			$action .= '<li><a href="' . base_url('v2/user-update') . "/" . 
			$user->id . '">Edit</a></li>';
			
			$action .= '<li><a href="#" class="delete-user" data-id='."'".$user->id."'".'>Hapus</a></li>';


			$action .= '</ul>';
			$action .= '</div>';
			$row[] = $action;
			
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function add()
	{
		$data['page'] 		= "Add User";
		$data['content'] 	= "admin/v_auser/add";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
			$id_user 	= $this->session->userdata('id_user');
			$data = [
				'code_employee' 		=> $this->input->post('code_employee'),
				'name_of_employee' 		=> $this->input->post('name_of_employee'),
				'no_telp' 		=> $this->input->post('no_telp'),
				'part_of' 		=> $this->input->post('part_of'),
				'company' 		=> $this->input->post('company'),
				'status' 		=> $this->input->post('status'),
				'level' 		=> $this->input->post('level'),
				'username' 		=> $this->input->post('username'),
				'password' 		=> md5($this->input->post('password'))
			];
			
		$result = $this->Ma_user->save_data($data);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function Update($id)
	{
		$data['page'] = "Update User";
		$data['user'] = $this->Ma_user->select_by_id($id);
		$data['content'] 	= "admin/v_auser/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$password 	= $this->session->userdata('password');
			$where = [
				'id' 		   => $this->input->post('id')
			];
			if (isset($password)) {
				$data = [
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email'),
					'name' 			=> $this->input->post('name'),
					'gender' 		=> $this->input->post('gender'),
					'phone' 		=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					'is_active' 		=> $this->input->post('is_active'),
					'level' 		=> $this->input->post('level'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					'password' 		=> md5($this->input->post('password')),
					'verified_at' 		=> date('Y-m-d'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id')
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
					'level' 		=> $this->input->post('level'),
					'total_income' 	=> $this->input->post('total_income'),
					'username' 		=> $this->input->post('username'),
					'verified_at' 		=> date('Y-m-d'),
					// 'password' 		=> md5($this->input->post('password'))
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'updated_by' 		=> $this->session->userdata('id')
				];
			}
			$result = $this->Ma_user->update($data, $where);

			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}

		echo json_encode($out);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$result = $this->Ma_user->hapus($id);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}

	public function Detail($id)
	{
		$data['page'] = "Detail User";
		$data['user'] = $this->Ma_user->select_by_id($id);

		$data['content'] 	= "admin/v_auser/detail";

		$this->loadkonten('admin/app_base',$data);
	}
}
