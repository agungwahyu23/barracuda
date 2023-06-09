<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin_single extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_single');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Single";
		$data['content'] 	= "admin/v_asingle/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$singles = $this->Ma_single->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($singles as $single) {

			$no++;
			$row = array();
			$row[] = $single->title;
			$row[] = $single->artist;
			$row[] = $single->created_at;
			
			$status = '';
			if ($single->status == 0) {
				$status = "Pending";
			}elseif ($single->status == 1) {
				$status = "Sukses";
			}elseif ($single->status == 2) {
				$status = "Reject";
			}else{
				$status = "-";
			}
			$row[] = $status;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Aksi <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';

			$action .= '<li><a href="' . base_url('v2/user/single-update') . "/" . 
			$single->id . '">Edit</a></li>';
				
				// $action .= '<li><a href="#" class="delete-single" data-id='."'".$single->id."'".'>Hapus</a></li>';


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
		$data['page'] 		= "Add Single";
		$data['content'] 	= "admin/v_asingle/add";
		$data['genre'] 	= $this->Ma_single->getGenre();

		// generate code with format ITEM-random code
		$random = mt_rand(1111,9999);
		$data['code'] = 'ITEM-'.$random;


		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		$id_user 	= $this->session->userdata('id');
		$judul = $this->input->post('title');
		$newnamefile = 'single_' . $id_user . '_' .date('ymd') . '_' . str_replace(" ", "_", strtolower($judul));
		$config['upload_path'] = './upload/single';
		$config['allowed_types'] = 'wav';
		$config['max_size'] = '102400';
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['file_ext_tolower'] = TRUE;
		$config['file_name'] = $newnamefile;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')){
			$single_file = $this->upload->data();
			$path['link']= "upload/single/";

			$data = [
				'title' 				=> $this->input->post('title'),
				'artist' 				=> $this->input->post('artist'),
				'description' 			=> $this->input->post('description'),
				'language' 				=> $this->input->post('language'),
				'genre_id' 				=> $this->input->post('genre_id'),
				'first_name_composer' 	=> $this->input->post('first_composer'),
				'last_name_composer' 	=> $this->input->post('last_composer'),
				'arranger' 				=> $this->input->post('arranger'),
				'produser' 				=> $this->input->post('produser'),
				'year_production' 		=> $this->input->post('year_production'),
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
				'status' 				=> 0,
				'file'            		=> $path['link'] . ''. $single_file['file_name'],
				
			];
			
			$result = $this->Ma_single->save_data($data);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
		}else{
			$data = [
				'title' 				=> $this->input->post('title'),
				'artist' 				=> $this->input->post('artist'),
				'description' 			=> $this->input->post('description'),
				'language' 				=> $this->input->post('language'),
				'genre_id' 				=> $this->input->post('genre_id'),
				'first_name_composer' 	=> $this->input->post('first_composer'),
				'last_name_composer' 	=> $this->input->post('last_composer'),
				'arranger' 				=> $this->input->post('arranger'),
				'produser' 				=> $this->input->post('produser'),
				'year_production' 		=> $this->input->post('year_production'),
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
				'status' 				=> 0,
				
			];
			
			$result = $this->Ma_single->save_data($data);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}

			$out['status'] = 'gagal';
		}

			

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Single";
		$data['genre'] 	= $this->Ma_single->getGenre();
		$data['single'] = $this->Ma_single->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_asingle/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function Update($id)
	{
		$data['page'] = "Update Single";
		$data['genre'] 	= $this->Ma_single->getGenre();
		$data['single'] = $this->Ma_single->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_asingle/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

			$order_id =  $this->input->post('order_id');

			$id_user 	= $this->session->userdata('id');

			$data = [
				'title' 				=> $this->input->post('title'),
				'artist' 				=> $this->input->post('artist'),
				'description' 			=> $this->input->post('description'),
				'language' 				=> $this->input->post('language'),
				'genre_id' 				=> $this->input->post('genre_id'),
				'first_name_composer' 	=> $this->input->post('first_composer'),
				'last_name_composer' 	=> $this->input->post('last_composer'),
				'arranger' 				=> $this->input->post('arranger'),
				'produser' 				=> $this->input->post('produser'),
				'year_production' 		=> $this->input->post('year_production'),
				'updated_at' 			=> date('Y-m-d H:i:s'),
				'updated_by' 			=> $id_user,
				'status' 				=> $this->input->post('status'),
			];

			$data_order = [
				'status' 				=> $this->input->post('status'),
			];
			
			$this->db->update('tb_order', $data_order, array('id' => $order_id));
			$result = $this->Ma_single->update($data, $where);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
			

		echo json_encode($out);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$result = $this->Ma_single->hapus($id);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
}
