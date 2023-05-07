<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($to, $subject, $message)
{
	$CI =& get_instance();
	
	// $config = array(
	// 	'protocol' => 'smtp',
	// 	'smtp_host' => 'sandbox.smtp.mailtrap.io',
	// 	'smtp_port' => 2525,
	// 	'smtp_user' => '4fb5c44ec5c474',
	// 	'smtp_pass' => 'fbb2866db7af21',
	// 	'mailtype'  => 'html', 
	// 	'charset'   => 'utf-8',
	// 	'crlf'   => "\r\n",
	// 	'newline'   => "\r\n"
	// );

	$config = array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.tomokoyuki.com',
		'smtp_port' => 465,
		'smtp_user' => 'admin@tomokoyuki.com',
		'smtp_pass' => 'V!5]8o@R,yC6',
		'smtp_crypto' => 'ssl',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1',
		'crlf'   => "\r\n",
		'newline'   => "\r\n"
	);

	$CI->load->library('email', $config);

	$CI->email->from('admin@tomokoyuki.com', 'Admin Tomokoyuki');
	$CI->email->to($to);
	$CI->email->subject($subject);
	$CI->email->message($message);

	if ($CI->email->send()) {
        return true;
    } else {
        return false;
    }
}
