<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin_saldo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_saldo');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Saldo User";
		$data['content'] 	= "admin/v_asaldo/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id_user 	= $this->session->userdata('id');
		$saldos = $this->Ma_saldo->getData($id_user);

		$data = array();
		$no = @$_POST['start'];
		foreach ($saldos as $saldo) {

			$no++;
			$row = array();
			$row[] = $saldo->name;
			$row[] = $saldo->email;
			$row[] = $saldo->total_income;
			
			// $action = '<div class="btn-group">';
			// $action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			// Action <span class="caret"></span></button>';

			// $action .= '<ul class="dropdown-menu">';
			
			// $action .= '<li><a href="' . base_url('v2/user/donation-detail') . "/" . 
			// $saldo->id . '">Detail</a></li>';

			// $action .= '</ul>';
			// $action .= '</div>';
			// $row[] = $action;
			
			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Donation";
		$data['donation'] = $this->Ma_donation->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_adonation/detail";

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
			
			$result = $this->Ma_donation->update($data, $where);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
			

		echo json_encode($out);
	}
}
