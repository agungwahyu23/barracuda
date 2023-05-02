<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->library('session');
		$this->load->model('Ma_album');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Album";
		$data['content'] 	= "admin/v_aalbum/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$albums = $this->Ma_album->getData();

		$data = array();
		$no = @$_POST['start'];
		foreach ($albums as $album) {

			$no++;
			$row = array();
			$row[] = $album->title;
			$row[] = $album->user_id;
			$row[] = $album->created_at;
			$row[] = $album->genre;
			
			$status = '';
			if ($album->status == 0) {
				$status = "Pending";
			}elseif ($album->status == 1) {
				$status = "Sukses";
			}else{
				$status = "-";
			}
			$row[] = $status;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Aksi <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';

			$action .= '<li><a href="' . base_url('v2/user/album-update') . "/" . 
			$album->id . '">Edit</a></li>';
				
				// $action .= '<li><a href="#" class="delete-album" data-id='."'".$album->id."'".'>Hapus</a></li>';


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
		$data['page'] 		= "Add Album";
		$data['content'] 	= "admin/v_aalbum/add";
		$data['genre'] 	= $this->Ma_album->getGenre();

		// generate code with format ITEM-random code
		$random = mt_rand(1111,9999);
		$data['code'] = 'ITEM-'.$random;


		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		$id_user 	= $this->session->userdata('id');
		$judul = $this->input->post('title');
		$newnamefile = 'album_' . $id_user . '_' .date('ymd') . '_' . str_replace(" ", "_", strtolower($judul));
		$config['upload_path'] = './upload/album';
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
			$album_file = $this->upload->data();
			$path['link']= "upload/album/";

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
				'file'            		=> $path['link'] . ''. $album_file['file_name'],
				
			];
			
			$result = $this->Ma_album->save_data($data);

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
			
			$result = $this->Ma_album->save_data($data);

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
		$data['page'] = "Detail Album";
		$data['genre'] 	= $this->Ma_album->getGenre();
		$data['album'] = $this->Ma_album->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_aalbum/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function Update($id)
	{
		$data['page'] = "Update Album";
		$data['genre'] 	= $this->Ma_album->getGenre();
		$data['album'] = $this->Ma_album->select_by_id($id);
		$data['single'] = $this->Ma_album->select_detail_single($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_aalbum/update";

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
