<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Donation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('M_donation');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Donation";
		$data['content'] 	= "admin/v_donation/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id_user 	= $this->session->userdata('id');
		$donations = $this->M_donation->getData($id_user);

		$data = array();
		$no = @$_POST['start'];
		foreach ($donations as $donation) {

			$no++;
			$row = array();
			$row[] = date("j F Y", strtotime($donation->created_at));
			$row[] = $donation->amount;

			$status = '';
			if ($donation->status == '1') {
				$status = 'Success';
			}else{
				$status = 'Pending';
			}

			$row[] = $status;
			
			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/donation-detail') . "/" . 
			$donation->id . '">Detail</a></li>';

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
		$data['page'] 		= "Add Donation";
		$data['content'] 	= "admin/v_donation/add";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$user_name 	= $this->session->userdata('user_name');
		$amount = $this->input->post('amount');

		$newnamefile = 'donation_' . $id_user . '_' .date('ymd');
		$config['upload_path'] = './upload/donation_attachment';
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
				'user_id' 				=> $id_user,
				'amount' 				=> $amount,
				'status' 				=> 0,
				'attachment'            => $attachment['file_name'],
				'created_at'            => date('Y-m-d H:i:s'),
				'created_by'            => $id_user,
			];
		}else{
			$data = [
				'user_id' 				=> $id_user,
				'amount' 				=> $amount,
				'status' 				=> 0,
				'created_at'            => date('Y-m-d H:i:s'),
				'created_by'            => $id_user,
			];
		}
		
		$result = $this->M_donation->save_data($data);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Donation";
		$data['donation'] = $this->M_donation->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_donation/detail";

		$this->loadkonten('admin/app_base',$data);
	}
}
