<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Takedown extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('M_takedown');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Takedown";
		$data['content'] 	= "admin/v_takedown/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id_user 	= $this->session->userdata('id');
		$takedowns = $this->M_takedown->getData($id_user);

		$data = array();
		$no = @$_POST['start'];
		foreach ($takedowns as $takedown) {

			$no++;
			$row = array();
			$row[] = $takedown->email;
			$row[] = date("j F Y", strtotime($takedown->created_at));

			$status = '';
			if ($takedown->status == '1') {
				$status = 'Success';
			}else{
				$status = 'Pending';
			}

			$row[] = $status;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/takedown-detail') . "/" . 
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
		$id_user 	= $this->session->userdata('id');
        $id=$this->input->post('id');

		if ($id == 'single') {
			$data=$this->M_takedown->getSingle($id_user);
		}elseif ($id == 'album') {
			$data=$this->M_takedown->getAlbum($id_user);
		}
        echo json_encode($data);
    }

	public function add()
	{
		$data['page'] 		= "Add Takedown";
		$data['content'] 	= "admin/v_takedown/add";

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
		
		$result = $this->M_takedown->save_data($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Takedown";
		$data['takedown'] = $this->M_takedown->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_takedown/detail";

		$this->loadkonten('admin/app_base',$data);
	}
}
