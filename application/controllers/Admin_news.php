<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin_news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_news');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "News";
		$data['content'] 	= "admin/v_anews/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$news = $this->Ma_news->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($news as $news) {

			$no++;
			$row = array();
			$row[] = $news->title;
			$row[] = $news->created_at;
			
			$status = '';
			if ($news->is_publish == 0) {
				$is_publish = "Draft";
			}elseif ($news->is_publish == 1) {
				$is_publish = "Sukses";
			}else{
				$is_publish = "-";
			}
			$row[] = $is_publish;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Aksi <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';

			$action .= '<li><a href="' . base_url('v2/user/news-update') . "/" . 
			$news->id . '">Edit</a></li>';
				
			$action .= '<li><a href="#" class="delete-news" data-id='."'".$news->id."'".'>Hapus</a></li>';


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
		$data['page'] 		= "Add News";
		$data['content'] 	= "admin/v_anews/add";


		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		$id_user 	= $this->session->userdata('id');
		$judul = $this->input->post('title');
		$slug = str_replace(" ", "_", strtolower($judul));
		$newnamefile = 'artikel_' . str_replace(" ", "_", strtolower($judul));
		$config['upload_path'] = './upload/artikel';
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size'] = '102400';
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['file_ext_tolower'] = TRUE;
		$config['file_name'] = $newnamefile;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('thumbnail')){
			$album_file = $this->upload->data();
			$path['link']= "upload/artikel/";

			$data = [
				'title' 				=> $this->input->post('title'),
				'slug' 					=> $slug,
				'content' 				=> $this->input->post('content'),
				'thumbnail'       		=> $album_file['file_name'],
				'is_publish' 			=> $this->input->post('is_publish'),
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $this->session->userdata('name'),				
			];
			
			$result = $this->Ma_news->save_data($data);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
		}else{
			$data = [
				'title' 				=> $this->input->post('title'),
				'slug' 					=> $slug,
				'content' 				=> $this->input->post('content'),
				'is_publish' 			=> $this->input->post('is_publish'),
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $this->session->userdata('name'),
				
			];
			
			$result = $this->Ma_news->save_data($data);

			if ($result > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
		}

			

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail News";
		$data['genre'] 	= $this->Ma_album->getGenre();
		$data['news'] = $this->Ma_album->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_anews/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function Update($id)
	{
		$data['page'] = "Update News";
		$data['genre'] 	= $this->Ma_album->getGenre();
		$data['news'] = $this->Ma_album->select_by_id($id);
		$data['single'] = $this->Ma_album->select_detail_single($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_anews/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

			$order_id =  $this->input->post('order_id');

			$id_user 	= $this->session->userdata('id');

			$data_order = [
				'status' 				=> $this->input->post('status'),
			];
			
			$result = $this->db->update('tb_order', $data_order, array('id' => $order_id));

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
		$result = $this->Ma_album->hapus($id);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
}
