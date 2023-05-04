<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->helper('app');
		$this->load->library('session');
		$this->load->model('Ma_withdraw');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$id 	= $this->session->userdata('id');
		$data['page'] 		= "Withdraw";
		$data['user'] = $this->Ma_withdraw->getUser($id);
		$data['content'] 	= "admin/v_awithdraw/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$withdraws = $this->Ma_withdraw->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($withdraws as $withdraw) {

			$no++;
			$row = array();
			$row[] = $withdraw->name;
			$row[] = $withdraw->amount;
			$row[] = $withdraw->created_at;

			$status = '';
			if ($withdraw->status == '0') {
				$status = '<span class="badge bg-yellow">Pending</span>';
			}elseif ($withdraw->status == '1') {
				$status = '<span class="badge bg-green">Success</span>';
			}else{
				$status = '<span class="badge bg-red">Rejected</span>';
			}
			$row[] = $status;

			$attachment = '';
			if (isset($withdraw->attachment)) {
				$attachment = '<a href="#" data-toggle="modal" data-target="#defaultModal" data-image="'.$withdraw->attachment.'" id="attachment" class="badge bg-green">Show Attachment</a>';
			}else{
				$attachment = '<span class="badge bg-red">No Attachment</span>';
			}
			$row[] = $attachment;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('v2/user/withdraw-detail') . "/" . 
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
		$data['content'] 	= "admin/v_awithdraw/add";
		$data['user'] 	= $this->Ma_withdraw->getUser($id_user);
		
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
		
		$result = $this->Ma_withdraw->save_data($data);

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
		$data['withdraw'] = $this->Ma_withdraw->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_awithdraw/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

			$id = $this->input->post('id');
			$id_user 	= $this->input->post('user_id');

			// get saldo user
			$user = $this->Ma_withdraw->getUser($id_user);
			$total_income = $user->total_income;
			$req_withdraw = $this->input->post('amount');
			$saldo = floatval($total_income) - floatval($req_withdraw);

			$newnamefile = 'withdraw_' . $id_user . '_' .date('ymd');
			$config['upload_path'] = './upload/withdraw_attachment';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '1024';
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = $newnamefile;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('attachment')){
				$attachment = $this->upload->data();

				$data = [
					'status' 				=> $this->input->post('status'),
					'attachment'            		=> $attachment['file_name'],
				];
			}else{
				$data = [
					'status' 				=> $this->input->post('status'),
				];
			}

			$data_user = [
				'total_income' 				=> $saldo,
			];
			
			$result_user = $this->db->update('user', $data_user, array('id' => $id_user));
			
			$result = $this->db->update('withdraw', $data, array('id' => $id));

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
			

		echo json_encode($out);
	}
}
