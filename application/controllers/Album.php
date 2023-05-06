<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
			}else{
				$status = 'Success';
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

		// $data_mail = [
		// 	'order_id' 		=> 9,
		// 	'user_id'		=> $this->session->userdata('id'),
		// ];

		// $this->loadkonten('admin/email_template_album', $data_mail, TRUE);

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		// define all input
		$id_user 	= $this->session->userdata('id');
		$user_name 	= $this->session->userdata('user_name');
		$judul = $this->input->post('title');
		$description = $this->input->post('description');
		$cover = $_FILES["cover"]['name'];
		$produser = $this->input->post('produser');
		$genre_id = $this->input->post('genre_id');
		$composser = $this->input->post('composser');
		$artist = $this->input->post('artist');
		$file = $_FILES["file"]['name'];
		
		// cek apakah upload file
		if (isset($file)) {
			// insert to tb_order
			$newnamefile = 'proof_payment_album_' . $id_user . '_' . date('ymdhis');

			$config['upload_path'] = './upload/proof_attachment';
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

			if ($this->upload->do_upload('proof_payment')){
				$proof_attachment = $this->upload->data();
				$data_order = [
					'user_id' 				=> $id_user,
					'attachment'			=> $proof_attachment['file_name'],
					'status'				=> 0,
					'created_at' 			=> date('Y-m-d H:i:s'),
					'created_by' 			=> $id_user,
				];
			}else{
				$data_order = [
					'user_id' 				=> $id_user,
					'status'				=> 0,
					'created_at' 			=> date('Y-m-d H:i:s'),
					'created_by' 			=> $id_user,
				];
			}
			$result_order = $this->M_album->save_data_order($data_order);
			$order_id = $this->db->insert_id();

			$user = $this->Ma_user->select_by_id($id_user);
				
			$data_mail = [
				'order_id' 		=> $this->encryption_lib->encode($order_id),
				'user_id'		=> $this->encryption_lib->encode($id_user),
			];
	
			$to = $user->email;
			$subject = 'Payment Album';
			$message_template = $this->load->view('admin/email_template_album', $data_mail, TRUE);
			send_email($to, $subject, $message_template);

			// input to tb_album
			$newnamefile = 'cover_album_' . $id_user . '_' .date('ymd') . '_' . str_replace(" ", "_", strtolower($judul));

			$config['upload_path'] = './upload/album';
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
					'title' 				=> $judul,
					'description' 			=> $description,
					'cover' 				=> $cove_file['file_name'],
					'composser' 			=> $this->input->post('composser'),
					'produser' 				=> $this->input->post('produser'),
					'created_at' 			=> date('Y-m-d H:i:s'),
					'created_by' 			=> $id_user,
					'artist' 				=> $artist,
				];
			}
			$result_album = $this->M_album->save_data($data);
			$album_id = $this->db->insert_id();

			if(isset($_FILES['file'])) {
				$countfiles = count($_FILES["file"]['name']); //Hitung Jumlah File yang di upload
				$filled_count = 0;

				// hitung jumlah input terisi
				for($i=0; $i<$countfiles; $i++) {
					if($_FILES['file']['name'][$i] != '') {
					  $filled_count++;
					}
				}

				// konfigurasi upload file
				for ($i = 0; $i < $filled_count; $i++) {
					$file_name = 'single_album_' . $id_user . '_' .date('ymdhis') . '_' . str_replace(" ", "_", strtolower($judul)) . $i;

					$config['upload_path'] = './upload/single';
					$config['allowed_types'] = 'wav';
					$config['max_size'] = '102400';
					$config['max_width'] = 0;
					$config['max_height'] = 0;
					$config['file_name'] = $file_name;
	
					// memuat library upload
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					$files = $_FILES['file'];

					$_FILES['file_single']['name'] = $files['name'][$i];
					$_FILES['file_single']['type'] = $files['type'][$i];
					$_FILES['file_single']['tmp_name'] = $files['tmp_name'][$i];
					$_FILES['file_single']['error'] = $files['error'][$i];
					$_FILES['file_single']['size'] = $files['size'][$i];

					$this->upload->initialize($config);
		
					if (!$this->upload->do_upload('file_single')) {
						$error = array('error' => $this->upload->display_errors());
					} else {
						$data = array('upload_data' => $this->upload->data());

						// insert to tb single
						$data_single = [
							'user_id' 				=> $id_user,
							'order_id' 				=> $order_id,
							'artist' 				=> $artist,
							'genre_id' 				=> $genre_id,
							'title' 				=> $this->input->post('title'),
							'description' 			=> $this->input->post('description'),
							'genre_id' 				=> $this->input->post('genre_id'),
							'first_name_composer' 	=> $this->input->post('composser'),
							'last_name_composer' 	=> $this->input->post('composser'),
							'produser' 				=> $this->input->post('produser'),
							'status' 				=> 0,
							'is_album' 				=> 1,
							'created_at' 			=> date('Y-m-d H:i:s'),
							'created_by' 			=> $id_user,
							'file'            		=> $file_name,
						];
						$result = $this->M_album->save_single($data_single);
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
				}
			}
			
			if ($result_album > 0) {
				$out = array('status'=>'berhasil');
			} else {
				$out['status'] = 'gagal';
			}
		}else{
			$out['status'] = 'gagal';
		}

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
		$newnamefile = 'proof_payment_album_' . $user_id . '_' . date('ymdhis');

		$config['upload_path'] = './upload/proof_attachment';
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
			$data = [
				'attachment'			=> $proof_attachment['file_name'],
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
			$data = [
				'updated_at' 			=> date('Y-m-d H:i:s'),
				'updated_by' 			=> $user_id,
			];
			
			$result = $this->db->update('tb_order', $data, array('id' => $order_id));

			if ($result > 0) {
				$out['status'] = 'berhasil';
			} else {
				$out['status'] = 'gagal';
			}
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

		echo json_encode($out);

	}
}
