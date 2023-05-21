<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin_takedown extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_takedown');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Admin_takedown";
		$data['content'] 	= "admin/v_atakedown/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$takedowns = $this->Ma_takedown->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($takedowns as $takedown) {

			$no++;
			$row = array();
			$row[] = $takedown->email;
			$row[] = date("j F Y", strtotime($takedown->created_at));

			$status = '';
			if ($takedown->status == '1') {
				$status = 'sukses';
			}else {
				$status = 'pending';
			}
			$row[] = $status;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('v2/user/takedown-detail') . "/" . 
			$takedown->id . '">Detail</a></li>';

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

	function get_pilihan(){
        $id=$this->input->post('id');

		if ($id == 'single') {
			$data=$this->Ma_takedown->getSingle();
		}elseif ($id == 'album') {
			$data=$this->Ma_takedown->getAlbum();
		}
        echo json_encode($data);
    }

	public function add()
	{
		$data['page'] 		= "Add Admin_takedown";
		$data['content'] 	= "admin/v_atakedown/add";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$user_name 	= $this->session->userdata('user_name');
		$take_down_type = $this->input->post('take_down_type');
		$single = $this->input->post('single');
		$email = $this->input->post('email');

		// cek type
		if ($take_down_type == 'single') {
			$data = [
				'type' 					=> 1,
				'email' 				=> $email,
				'single_id' 			=> $single,
				'month' 				=> date('Y-m-d'),
				'status' 				=> 0, //pending
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
		}elseif ($take_down_type == 'album') {
			$data = [
				'type' 					=> 1,
				'email' 				=> $email,
				'album_id' 			=> $single,
				'month' 				=> date('Y-m-d'),
				'status' 				=> 0, //pending
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
		}
		
		$result = $this->Ma_takedown->save_data($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Admin_takedown";
		$data['takedown'] = $this->Ma_takedown->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_atakedown/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

			$id_user 	= $this->session->userdata('id');

			$data = [
				'updated_at' 			=> date('Y-m-d H:i:s'),
				'updated_by' 			=> $id_user,
				'status' 				=> $this->input->post('status'),
			];
			
			$result = $this->Ma_takedown->update($data, $where);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
			

		echo json_encode($out);
	}
}
