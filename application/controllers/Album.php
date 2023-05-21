<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Album extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->helper('email');
		$this->load->library('session');
		$this->load->model('M_album');
		$this->load->model('Ma_user');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Album";
		$data['content'] 	= "admin/v_album/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$user_id = $this->session->userdata('id');
		$albums = $this->M_album->getData($user_id);

		$data = array();
		$no = @$_POST['start'];
		foreach ($albums as $album) {

			$no++;
			$row = array();
			$row[] = $album->title;
			$row[] = date("j F Y", strtotime($album->created_at));
			$row[] = $album->genre;

			$status = '';
			if ($album->status == 0) {
				$status = 'Pending';
			}elseif ($album->status == 1) {
				$status = "Success";
			}elseif ($album->status == 2) {
				$status = "Reject";
			}else{
				$status = '-';
			}
			$row[] = $status;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Aksi <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/album-detail') . "/" . 
			$album->id . '">Detail</a></li>';

			// if ($album->status != 1) {
			// 	$action .= '<li><a href="' . base_url('user/album-update') . "/" . 
			// 	$album->id . '">Edit</a></li>';
				
			// 	$action .= '<li><a href="#" class="delete-album" data-id='."'".$album->id."'".'>Hapus</a></li>';
			// }


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
		$data['content'] 	= "admin/v_album/add";
		$data['genre'] 	= $this->M_album->getGenre();
		$data['wizard'] 		= "";
		$data['order_id'] 		= "";
		$data['data_album'] 	= "";

		$this->loadkonten('admin/app_base',$data);
	}

	function checkTitle(){
		$id_user 	= $this->session->userdata('id');
		$title = $this->input->post('title_single');
		$if_exists = $this->M_album->checkTitleExist($title, $id_user);
		
		if ($if_exists > 0) {
		  $out['status'] = 'exists';
		  echo json_encode($out);
		} else {
		  $out['status'] = 'notexists';
		  echo json_encode($out);
		}
	}

	public function wizard($wizard, $order_id)
	{	
		$data['page'] 		= "Add Album";
		$data['wizard'] 		= $wizard;
		$data['order_id'] 		= $order_id;
		$data['data_album'] 	= $this->M_album->getAlbumFromOrder($order_id);
		// $data['detail_album'] 	= $this->M_album->getAlbumFromOrder($order_id);
		$data['content'] 	= "admin/v_album/add";
		$data['genre'] 	= $this->M_album->getGenre();

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesInnerAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$user_name 	= $this->session->userdata('user_name');

		$order_id1 = $this->input->post('order_id1');

		if ($order_id1 != '') {
			$out = array('status'=>'berhasil', 'wizard'=>2, 'order_id'=>$order_id1);
		}else{

			$title = $this->input->post('title');
			$artist = $this->input->post('artist');
			$genre_id = $this->input->post('genre_id');
			$release_date = $this->input->post('release_date');
			$yt_link = $this->input->post('yt_link');
			$spotify_link = $this->input->post('spotify_link');
			$itunes_link = $this->input->post('itunes_link');
			$contact_person = $this->input->post('contact_person');
			$produser = $this->input->post('produser');
			$composser = $this->input->post('composser');
			$year_production = $this->input->post('year_production');
			$cover = $_FILES["cover"]['name'];
	
			// get data user
			$user = $this->M_album->getUser($id_user);
			$name_user = str_replace(" ", "_", strtolower($user->name));
	
			$upload_path = './upload/album/';
			$folder_name = $id_user . '_' . $name_user . '/' . date('ymd');
			$fullPath = $upload_path . $folder_name;
	
			// cek apakah folder sudah ada
			if (!is_dir($upload_path . $folder_name)) {
				// jika folder belum ada, buat folder baru
				mkdir($upload_path . $folder_name, 0777, true);
			}
	
			$data_order = [
				'user_id' 				=> $id_user,
				'status'				=> 0,
				'path'					=> $fullPath,
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
			$result_order = $this->M_album->save_data_order($data_order);
			$order_id = $this->db->insert_id();
	
			// input to tb_album
			$newnamefile = 'cover_album_' . $id_user . '_' .date('ymd') . '_' . str_replace(" ", "_", strtolower($title));
	
			$config['upload_path'] = $fullPath;
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
	
			if ($this->upload->do_upload('cover')){
				$cove_file = $this->upload->data();
				$data = [
					'user_id' 				=> $id_user,
					'order_id' 				=> $order_id,
					'genre_id' 				=> $genre_id,
					'title' 				=> $title,
					'cover' 				=> $fullPath . '/' . $cove_file['file_name'],
					'composser' 			=> $composser,
					'produser' 				=> $produser,
					'artist' 				=> $artist,
					'release_date' 			=> $release_date,
					'yt_link' 				=> $yt_link,
					'spotify_link' 			=> $spotify_link,
					'itunes_link' 			=> $itunes_link,
					'contact_person' 		=> $contact_person,
					'year_production' 		=> $year_production,
					'created_at' 			=> date('Y-m-d H:i:s'),
					'created_by' 			=> $id_user,
				];
			}
			$result_album = $this->M_album->save_data($data);
			$album_id = $this->db->insert_id();
				
			if ($result_album > 0) {
				$out = array('status'=>'berhasil', 'wizard'=>2, 'order_id'=>$order_id);
			} else {
				$out['status'] = 'gagal';
			}
		}

		echo json_encode($out);
	}

	// (A) HELPER FUNCTION - SERVER RESPONSE
	function verbose ($ok=1, $info="") {
		if ($ok==0) { 
			http_response_code(400); 
		}
		exit(
			json_encode(["ok"=>$ok, "info"=>$info])
		);
	}

	public function test()
	{
		$order_id = $_POST['order_id'];
		$id_user 	= $this->session->userdata('id');

		// get user
		$user = $this->M_album->getUser($id_user);

		// get order
		$order = $this->M_album->getOrder($order_id);
		$fullPath = $order->path;

		// (B) INVALID UPLOAD
		if (empty($_FILES) || $_FILES["file"]["error"]) {
			$this->verbose(0, "Failed to move uploaded file.");
		}

		// (C) UPLOAD DESTINATION - CHANGE FOLDER IF REQUIRED!
		$filePath = $fullPath;
		if (!file_exists($filePath)) { 
			if (!mkdir($filePath, 0777, true)) {
				$this->verbose(0, "Failed to create $filePath");
			}
		}

		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
		$filePath = $filePath . DIRECTORY_SEPARATOR . $fileName;

		// (D) DEAL WITH CHUNKS
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
		
		if ($out) {
			$in = @fopen($_FILES["file"]["tmp_name"], "rb");
			if ($in) { 
				while ($buff = fread($in, 4096)) { 
				fwrite($out, $buff); } 
			}else { 
			$this->verbose(0, "Failed to open input stream"); 
		}
			@fclose($in);
			@fclose($out);
			@unlink($_FILES["file"]["tmp_name"]);
		} else { 
			$this->verbose(0, "Failed to open output stream"); 
		}

		// (E) CHECK IF FILE HAS BEEN UPLOADED
		// $order_id = $id;
		if (!$chunks || $chunk == $chunks - 1) { 
			rename("{$filePath}.part", $filePath);			
		}

		$this->verbose(1, "Upload OK");
	}

	public function prosesAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$user_name 	= $this->session->userdata('user_name');
		$order_id = $this->input->post('order_id');
		$file = $this->input->post('file');

		// get data user
		$user = $this->M_album->getUser($id_user);

		// get path form tb_order
		$order = $this->M_album->getOrder($order_id);
		$path = $order->path;

		//get album
		$album = $this->M_album->getAlbumFromOrder($order->id);
		$album_id = $album->id;

		$filled_count = 0;

		foreach ($file as $nama) {
			if (!empty($nama)) {
				$filled_count++;
			}
		}

		// konfigurasi upload file
		for ($i = 0; $i < $filled_count; $i++) {

			$file_name = $this->input->post('file_copy'.$i+1);
			$title_single = $this->input->post('title_single'.$i+1);
			$last_name_composer = $this->input->post('last_name_composer'.$i+1);

			// insert to tb single
			$data_single = [
				'user_id' 				=> $id_user,
				'order_id' 				=> $order_id,
				'title' 				=> $title_single,
				'first_name_composer' 	=> $last_name_composer,
				'file'            		=> $path . '/' . $file_name,
				'status' 				=> 0,
				'is_album' 				=> 1,
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
				
			];
			$result_single = $this->M_album->save_single($data_single);
			$single_id = $this->db->insert_id();

			// insert single album
			$data_single_album = [
				'album_id' 				=> $album_id,
				'single_id' 			=> $single_id,
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
			$result = $this->M_album->save_single_album($data_single_album);
		}

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		$user = $this->Ma_user->select_by_id($id_user);

		$data_mail = [
			'order_id' 		=> $this->encryption_lib->encode($order_id),
			'user_id'		=> $this->encryption_lib->encode($user->id),
		];

		$to = $user->email;
		$subject = 'Payment Album';
		$message_template = $this->load->view('admin/email_template_album', $data_mail, TRUE);
		send_email($to, $subject, $message_template);

		$data_mail_admin = [
			'name' 			=> $user->name,
			'email' 		=> $user->email,
			'user_id'		=> $id_user,
			'title'			=> 'Notifikasi Upload Album',
			'content'		=> 'Unggah Album baru'
		];

		$to = 'admin@tomokoyuki.com';
		$subject = 'Unggah Album';
		$message_template = $this->load->view('admin/email_universal_to_admin', $data_mail_admin, TRUE);
		send_email($to, $subject, $message_template);

		echo json_encode($out);
	}

	public function detail($id)
	{
		$data['page'] = "Detail Album";
		$data['album'] = $this->M_album->select_by_id($id);
		$data['single'] = $this->M_album->select_detail_single($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_album/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function Update($id)
	{
		$data['page'] = "Update Album";
		$data['album'] = $this->M_album->select_by_id($id);
		$data['id'] = $id;

		$data['content'] 	= "admin/v_album/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

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
					'status' 				=> $this->input->post('status'),
					'file'            		=> $path['link'] . ''. $album_file['file_name'],
					
				];
				
				$result = $this->M_album->update($data, $where);
	
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
					'status' 				=> $this->input->post('status'),
					
				];
				
				$result = $this->M_album->update($data, $where);
	
				if ($result > 0) {
					$out = array('status'=>'berhasil');
				} else {
					$out['status'] = 'gagal';
				}
			}

		echo json_encode($out);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$result = $this->M_album->hapus($id);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}

	public function payment($user_id, $order_id)
	{
		$data = [
			'order_id' 		=> $this->encryption_lib->decode($order_id),
			'user_id'		=> $this->encryption_lib->decode($user_id),
		];

		$this->loadkonten('admin/upload_pembayaran_album', $data, TRUE);
	}

	public function prosesPayment($user_id, $order_id)
	{
		$id = $order_id;
		$newnamefile = 'proof_payment_album_' . $user_id . '_' . date('ymdhi');

		// get data user
		$user = $this->M_album->getUser($user_id);
		$name_user = str_replace(" ", "_", strtolower($user->name));

		// get order
		$order = $this->M_album->getOrder($id);
		$path = $order->path;

		$config['upload_path'] = $path;
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

		if ($this->upload->do_upload('proof_of_payment')){
			$proof_attachment = $this->upload->data();
			$proof_attachment_path = $path . '/' . $proof_attachment['file_name'];
			$data = [
				'attachment'			=> $proof_attachment_path,
				'updated_at' 			=> date('Y-m-d H:i:s'),
				'updated_by' 			=> $user_id,
			];

			$result = $this->db->update('tb_order', $data, array('id' => $order_id));

			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
		}else{
			$out['status'] = 'gagal';
		}

		$user = $this->Ma_user->select_by_id($user_id);

		$data_mail = [
			'name' 			=> $user->name,
			'email' 		=> $user->email,
			'user_id'		=> $user_id,
			'title'			=> 'Album',
		];

		$to = 'admin@tomokoyuki.com';
		$subject = 'Pembayaran Album';
		$message_template = $this->load->view('admin/email_template_to_admin', $data_mail, TRUE);
		send_email($to, $subject, $message_template);

		if ($out['status'] == 'berhasil') {
			$out['status'];
			redirect(site_url('success_payment'));
		}else{
			$out['status'];
			echo "Upload gagal";
		}
		// echo json_encode($out);

	}

	public function cancelUpload()
	{
		$order_id = $_POST['order_id'];
		$id_user 	= $this->session->userdata('id');

		$result = $this->M_album->cancelUp($order_id, $id_user);

		if ($result > 0) {
			$out['status'] = 'berhasil';
		} else {
			$out['status'] = 'gagal';
		}
	}
}
