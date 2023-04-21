<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('M_withdraw');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Withdraw";
		$data['content'] 	= "admin/v_withdraw/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$withdraws = $this->M_withdraw->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($withdraws as $withdraw) {

			$no++;
			$row = array();
			$row[] = $withdraw->amount;
			$row[] = $withdraw->status;
			$row[] = $withdraw->attachment;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/withdraw-detail') . "/" . 
			$withdraw->id . '">Detail</a></li>';

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
		$id_user = $this->session->userdata('id');
		$data['page'] 		= "Add Withdraw";
		$data['content'] 	= "admin/v_withdraw/add";
		$data['user'] 	= $this->M_withdraw->getUser($id_user);
		
		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$amount = $this->input->post('amount');
		$status = 0;

		$data = [
			'user_id' 				=> $id_user,
			'amount' 				=> $amount,
			'status' 				=> $status,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'created_by' 			=> $id_user,
		];
		
		$result = $this->M_withdraw->save_data($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Withdraw";
		$data['withdraw'] = $this->M_withdraw->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_withdraw/detail";

		$this->loadkonten('admin/app_base',$data);
	}
}
