<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->helper('email');
		$this->load->helper('app');
		$this->load->library('session');
		$this->load->model('M_withdraw');
		$this->load->model('M_single');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$id 	= $this->session->userdata('id');
		$data['page'] 		= "Withdraw";
		$data['user'] = $this->M_withdraw->getUser($id);
		$data['content'] 	= "admin/v_withdraw/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id 	= $this->session->userdata('id');
		$withdraws = $this->M_withdraw->getData($id);

		$data = array();
		$no = @$_POST['start'];
		foreach ($withdraws as $withdraw) {

			$no++;
			$row = array();
			$row[] = '$ '.$withdraw->amount;
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
				$attachment = '<a href="#" data-toggle="modal" data-target="#defaultModal" data-image="'.$withdraw->attachment.'" id="attachment" class="badge bg-green">Click to Show Attachment</a>';
			}else{
				$attachment = '<span class="badge bg-red">No Attachment</span>';
			}
			$row[] = $attachment;
			
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

		// get user
		$user = $this->M_single->getUser($id_user);
		$name_user = str_replace(" ", "_", strtolower($user->name));

		$data_mail = [
			'name' 			=> $user->name,
			'email' 		=> $user->email,
			'user_id'		=> $id_user,
			'title'			=> 'Request Withdraw',
		];

		$to = 'admin@tomokoyuki.com';
		$subject = 'Request Withdraw';
		$message_template = $this->load->view('admin/email_withdraw_to_admin', $data_mail, TRUE);
		send_email($to, $subject, $message_template);

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
