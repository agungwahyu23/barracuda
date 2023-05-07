<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unclaim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('M_unclaim');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Unclaim";
		$data['content'] 	= "admin/v_unclaim/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id_user 	= $this->session->userdata('id');
		$unclaims = $this->M_unclaim->getData($id_user);

		$data = array();
		$no = @$_POST['start'];
		foreach ($unclaims as $unclaim) {

			$no++;
			$row = array();
			$row[] = $unclaim->email;
			$row[] = date("j F Y", strtotime($unclaim->created_at));

			$status = '';
			if ($unclaim->email == '1') {
				$status = 'Success';
			}else{
				$status = 'Pending';
			}

			$row[] = $status;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/unclaim-detail') . "/" . 
			$unclaim->id . '">Detail</a></li>';

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
			$data=$this->M_unclaim->getSingle($id_user);
		}elseif ($id == 'album') {
			$data=$this->M_unclaim->getAlbum($id_user);
		}
        echo json_encode($data);
    }

	public function add()
	{
		$data['page'] 		= "Add Unclaim";
		$data['content'] 	= "admin/v_unclaim/add";

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
				'type' 					=> 2,
				'email' 				=> $email,
				'single_id' 			=> $single,
				'month' 				=> date('Y-m-d'),
				'status' 				=> 0, //pending
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
		}elseif ($take_down_type == 'album') {
			$data = [
				'type' 					=> 2,
				'email' 				=> $email,
				'album_id' 			=> $single,
				'month' 				=> date('Y-m-d'),
				'status' 				=> 0, //pending
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
		}
		
		$result = $this->M_unclaim->save_data($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Unclaim";
		$data['unclaim'] = $this->M_unclaim->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_unclaim/detail";

		$this->loadkonten('admin/app_base',$data);
	}
}
