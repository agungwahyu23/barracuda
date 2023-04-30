<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session', 'email');
		$this->load->helper('email');
		$this->load->model('Ma_user');
		$this->load->model('M_auth');
	}

	public function loadkonten($page, $data) {
		$this->load->view($page, $data);
	}

	public function index()
	{
		$data['content'] 	= "public/login";

		$this->loadkonten('public/login',$data);
	}
	
	public function register()
	{
		$data['content'] 	= "public/login";

		$this->loadkonten('public/register',$data);
	}

	public function proses_register()
	{
		$email = $this->input->post('email');
		$random_chr = uniqid();
		$password = md5($random_chr);

		$data = [
			'name' 			=> $this->input->post('name'),
			'email' 		=> $this->input->post('email'),
			'username' 		=> $this->input->post('email'),
			'password' 		=> $password,
			'gender' 		=> $this->input->post('gender'),
			'phone' 		=> $this->input->post('phone'),
			'address' 		=> $this->input->post('address'),
			'level' 		=> '2',
			'is_active'		=> '0',
			'total_income'	=> '0',
			'created_at' 	=> date('Y-m-d H:i:s'),
			
		];
		$result = $this->M_auth->register($data);
		$user_id = $this->db->insert_id();

		$data_mail = [
			'email' 		=> $this->input->post('email'),
			'password' 		=> $random_chr,
			'user_id'		=> $this->encryption_lib->encode($user_id),
		];

		$to = $email;
        $subject = 'Pembuatan Akun Baru';
		$message_template = $this->load->view('public/email_template_register', $data_mail, TRUE);
		send_email($to, $subject, $message_template);

		if ($result > 0) {
			$out = array('status'=>'berhasil');
		} else {
			$out['status'] = 'gagal';
		}

		echo json_encode($out);
	}

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

		$cek = $this->M_auth->cek_login($username, $password);
		if(!empty($cek)){
			foreach($cek as $user) {
				$session_data = [
				'id' => $user['id'],
				'email' => $user['email'],
				'username' => $user['username'],
				'name' => $user['name'],
				'email' => $user['email'],
				'gender' => $user['gender'],
				'level' => $user['level'],
			];
				$this->session->set_userdata($session_data);
				if ($user['level'] == '2') {
					$out['status'] = 'berhasil';
				}elseif ($user['level'] == '1') {
					$out['status'] = 'berhasil';
				}else{
					$out['status'] = 'gagal';
				} 
			}
		}else{
			$out['status'] = 'gagal';
		} 
		
		echo json_encode($out);
	} 

	public function payment($id)
	{
		$data['id'] = $this->encryption_lib->decode($id);
		$data['content'] 	= "public/login";

		$this->loadkonten('public/upload_pembayaran',$data);
	}

	public function proses_payment()
	{
		$user_id = $this->input->post('id');

		$newnamefile = 'proof_of_payment_' . $user_id . '_' .date('ymd');

		$config['upload_path'] = './upload/profile';
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
			$proof_of_payment = $this->upload->data();

			$where = [
				'id' 		   => $user_id
			];

			$data = [
				'id' 				=> $user_id,
				'proof_of_payment' 	=> $proof_of_payment['file_name'],
				'updated_at' 		=> date('Y-m-d H:i:s'),
			];
			$result = $this->Ma_user->proses_payment($data, $where);

			// get user
			$user = $this->Ma_user->select_by_id($user_id);

			$data_mail = [
				'name' 			=> $user->name,
				'email' 		=> $user->email,
				'user_id'		=> $user_id,
			];
	
			$to = 'admin@tomokoyuki.com';
			$subject = 'Pembayaran Pendaftaran';
			$message_template = $this->load->view('public/email_template_register_to_admin', $data_mail, TRUE);
			send_email($to, $subject, $message_template);

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

	public function logout()
    {
        $params = array('username', 'email', 'gender', 'level');
        $this->session->unset_userdata($params);
        redirect('login');
    }

	public function success() {
		$this->loadkonten('public/success_payment', null);
	}

	public function send_example_email() {
		// $email = 'email@email.com';
		// $random_chr = uniqid();
		// $password = md5($random_chr);

		// $data = [
		// 	'email' 			=> $email,
		// 	'password' 		=> $random_chr,
			
		// ];

		// $to = 'agungwahyu23699@gmail.com';
        // $subject = 'Test Email';
		// $message_template = $this->load->view('public/email_template', $data, TRUE);

		// if (send_email($to, $subject, $message_template)) {
        //     $out = array('status'=>'berhasil');
        // } else {
        //     $out['status'] = 'gagal';
        // }

		// echo json_encode($out);
		$data['content'] 	= "public/login";
		$data_mail = [
			'password' 		=> 'ssfsdfsd',
			'user_id'		=> $this->encryption_lib->encode('19'),
		];

		$this->loadkonten('public/email_template_register',$data_mail);
	}
}
