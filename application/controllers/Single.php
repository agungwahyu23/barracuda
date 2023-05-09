<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Single extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->helper('email');
		$this->load->library('session');
		$this->load->model('M_single');
		$this->load->model('Ma_user');
	}

	public function loadkonten($page, $data) {
		$data['username'] 	= $this->session->userdata('username');

		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['page'] 		= "Single";
		$data['content'] 	= "admin/v_single/home";

		$this->loadkonten('admin/app_base',$data);
	}

	public function ajax_list()
	{
		$id_user 	= $this->session->userdata('id');
		$singles = $this->M_single->getData($id_user);

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
				$status = "Success";
			}else{
				$status = "-";
			}
			$row[] = $status;

			$action = '<div class="btn-group">';
			$action .= '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span></button>';

			$action .= '<ul class="dropdown-menu">';
			
			$action .= '<li><a href="' . base_url('user/single-detail') . "/" . 
			$single->id . '">Detail</a></li>';

			// if ($single->status != 1) {
			// 	$action .= '<li><a href="' . base_url('user/single-update') . "/" . 
			// 	$single->id . '">Edit</a></li>';
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
		$data['page'] 		= "Add Single";
		$data['content'] 	= "admin/v_single/add";
		$data['genre'] 	= $this->M_single->getGenre();

		// generate code with format ITEM-random code
		$random = mt_rand(1111,9999);
		$data['code'] = 'ITEM-'.$random;


		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesAdd()
	{
		$id_user 	= $this->session->userdata('id');
		$judul = $this->input->post('title');

		// get user
		$user = $this->M_single->getUser($id_user);
		$name_user = str_replace(" ", "_", strtolower($user->name));

		$upload_path = './upload/single/';
		$folder_name = $id_user . '_' . $name_user . '/' . date('ymdhi');

		// cek apakah folder sudah ada
		if (!is_dir($upload_path . $folder_name)) {
    		// jika folder belum ada, buat folder baru
    		mkdir($upload_path . $folder_name, 0777, true);
		}

		// mengambil data file yang diunggah
		$cover_name = 'cover_album_' . $id_user . '_' . str_replace(" ", "_", strtolower($user->name));
		$ktp_name = 'ktp_' . $id_user . '_' . str_replace(" ", "_", strtolower($user->name));
		$file = $_FILES['file'];
		// $file = $_FILES["file"]['name'];

		$newnamefile = $judul;
		$dir = $id_user . '_' . str_replace(" ", "_", strtolower($user->name));

		$config['upload_path'] = $upload_path . $folder_name;
		$config['allowed_types'] = 'wav';
		$config['max_size'] = '102400';
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = FALSE;
		$config['file_ext_tolower'] = TRUE;
		$config['file_name'] = $newnamefile;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$data_order = [
			'user_id' 				=> $id_user,
			'status'				=> 0,
			'path'					=> $upload_path . $folder_name,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'created_by' 			=> $id_user,
		];

		$result_order = $this->M_single->save_data_order($data_order);
		$order_id = $this->db->insert_id();

		$data_mail = [
			'order_id' 		=> $this->encryption_lib->encode($order_id),
			'user_id'		=> $this->encryption_lib->encode($id_user),
		];

		$to = $user->email;
		$subject = 'Payment Single';
		$message_template = $this->load->view('admin/email_template_single', $data_mail, TRUE);
		send_email($to, $subject, $message_template);

		if ($this->upload->do_upload('file')){
			$single_file = $this->upload->data();

			// konfigurasi upload image
			$config2['upload_path'] = $upload_path . $folder_name; // direktori utama untuk pengunggahan file
			$config2['allowed_types'] = 'jpg|png'; // tipe file yang diperbolehkan
			$config2['max_size'] = 2048; // ukuran maksimal file dalam KB
			$this->load->library('upload', $config2); // memuat library upload

			// mengupload file cover 
			$this->upload->initialize(array(
				'upload_path' => $upload_path . $folder_name,
				'allowed_types' => 'jpg|png',
				'max_size' => 2048,
				'file_name' => $cover_name
			));
			if ($this->upload->do_upload('cover')) {
				// file cover berhasil diunggah
				$cover_data = $this->upload->data();
				$cover_single = $cover_data['file_name'];
			} else {
				// file cover gagal diunggah
				$error = $this->upload->display_errors();
			}

			// mengupload file ktp
			$this->upload->initialize(array(
				'upload_path' => $upload_path . $folder_name,
				'allowed_types' => 'jpg|png',
				'max_size' => 2048,
				'file_name' => $ktp_name
			));
			if ($this->upload->do_upload('ktp')) {
				// file ktp berhasil diunggah
				$ktp_data = $this->upload->data();
				$ktp_single = $ktp_data['file_name'];
			} else {
				// file ktp gagal diunggah
				$error = $this->upload->display_errors();
			}

			$data = [
				'user_id'	 			=> $id_user,
				'order_id'	 			=> $order_id,
				'title' 				=> $this->input->post('title'),
				'artist' 				=> $this->input->post('artist'),
				'featuring_artist' 		=> $this->input->post('featuring_artist'),
				'description' 			=> $this->input->post('description'),
				'file'            		=> $upload_path . $folder_name . '/' . $single_file['file_name'],
				'cover'            		=> $upload_path . $folder_name . '/' . $cover_single,
				'status' 				=> 0,
				'language' 				=> $this->input->post('language'),
				'genre_id' 				=> $this->input->post('genre_id'),
				'sub_genre' 			=> $this->input->post('sub_genre'),
				'first_name_composer' 	=> $this->input->post('first_composer'),
				'last_name_composer' 	=> $this->input->post('last_composer'),
				'arranger' 				=> $this->input->post('arranger'),
				'produser' 				=> $this->input->post('produser'),
				'year_production' 		=> $this->input->post('year_production'),
				'is_album' 				=> 0,
				'release_date' 			=> $this->input->post('release_date'),
				'lyrics' 				=> $this->input->post('lyrics'),
				'spotify_link' 			=> $this->input->post('spotify_link'),
				'itunes_link' 			=> $this->input->post('itunes_link'),
				'yt_link' 				=> $this->input->post('yt_link'),
				'start_preview_tiktok' 	=> $this->input->post('start_preview_tiktok'),
				'contact_person' 		=> $this->input->post('contact_person'),
				'ig' 					=> $this->input->post('ig'),
				'ktp' 					=> $upload_path . $folder_name . '/' . $ktp_single,
				'created_at' 			=> date('Y-m-d H:i:s'),
				'created_by' 			=> $id_user,
			];
			
			$result = $this->M_single->save_data($data);

			if ($result > 0) {
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
		$data['page'] = "Detail Single";
		$data['single'] = $this->M_single->select_by_id($id);
		$data['id'] = $id;
		$data['genre'] 	= $this->M_single->getGenre();

		$data['content'] 	= "admin/v_single/detail";

		$this->loadkonten('admin/app_base',$data);
	}

	public function Update($id)
	{
		$data['page'] = "Update Single";
		$data['single'] = $this->M_single->select_by_id($id);
		$data['id'] = $id;
		$data['genre'] 	= $this->M_single->getGenre();

		$data['content'] 	= "admin/v_single/update";

		$this->loadkonten('admin/app_base',$data);
	}

	public function prosesUpdate()
	{
			$where = [
				'id' 		   => $this->input->post('id')
			];

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
					'updated_at' 			=> date('Y-m-d H:i:s'),
					'updated_by' 			=> $id_user,
					'status' 				=> $this->input->post('status'),
					'file'            		=> $path['link'] . ''. $single_file['file_name'],
					
				];
				
				$result = $this->M_single->update($data, $where);
	
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
					'updated_at' 			=> date('Y-m-d H:i:s'),
					'updated_by' 			=> $id_user,
					'status' 				=> $this->input->post('status'),
					
				];
				
				$result = $this->M_single->update($data, $where);
	
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
		$result = $this->M_single->hapus($id);

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

		$this->loadkonten('admin/upload_pembayaran_single', $data, TRUE);
	}

	public function prosesPayment($user_id, $order_id)
	{
		$id = $order_id;
		$newnamefile = 'proof_payment_single_' . $user_id . '_' . date('ymdhi');

		// get order
		$order = $this->M_single->getOrder($id);
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
			'title'			=> 'Single',
		];

		$to = 'admin@tomokoyuki.com';
		$subject = 'Pembayaran Single';
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
}
