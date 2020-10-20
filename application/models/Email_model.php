<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

	function account_opening_email($account_type = '' , $email = '', $password = '')
	{
		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;

		$email_msg		=	"Welcome to ".$system_name."<br />";
		$email_msg		.=	"Your account type : ".$account_type."<br />";
		$email_msg		.=	"Your login password : ". $password ."<br />";
		$email_msg		.=	"Login Here : ".base_url()."<br />";

		$email_sub		=	"Account opening email";
		$email_to		=	$email;

		//$this->do_email($email_msg , $email_sub , $email_to);
		$this->send_php_mail($email_msg , $email_sub , $email_to);
	}

	function password_reset_email($new_password = '' , $email = '')
	{
		$query = $this->db->get_where('users' , array('email' => $email));
		if($query->num_rows() > 0)
		{

			$email_msg	=	"Your password has been changed.";
			$email_msg	.=	"Your new password is : ".$new_password."<br />";

			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			//$this->do_email($email_msg , $email_sub , $email_to);
			$this->send_php_mail($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{
			return false;
		}
	}

	function contact_message_email($email_from, $email_to, $email_message) {
		$email_sub = "Message from School Website";
		//$this->do_email($email_message, $email_sub, $email_to, $email_from);
		$this->send_php_mail($email_message, $email_sub, $email_to, $email_from);
	}

    function personal_message_email($email_from, $email_to, $email_message) {
        $email_sub = "Message from School Website";
        //$this->do_email($email_message, $email_sub, $email_to, $email_from);
        $this->send_php_mail($email_message, $email_sub, $email_to, $email_from);
    }

	public function send_mail_on_course_status_changing($course_id = "", $mail_subject = "", $mail_body = "") {
		$instructor_id		 = 0;
		$course_details    = $this->crud_model->get_course_by_id($course_id)->row_array();
		if ($course_details['user_id'] != "") {
			$instructor_id = $course_details['user_id'];
		}else {
			$instructor_id = $this->session->userdata('user_id');
		}
		$instuctor_details = $this->user_model->get_all_user($instructor_id)->row_array();
		$email_from = get_settings('system_email');

		$this->send_php_mail($mail_body, $mail_subject, $instuctor_details['email'], $email_from);
	}
	/***custom email sender****/
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{

		$config = array();
    $config['useragent']	= "CodeIgniter";
    $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
    $config['protocol']		= "smtp";
    $config['smtp_host']	= "localhost";
    $config['smtp_port']	= "25";
    $config['mailtype']		= 'html';
    $config['charset']		= 'utf-8';
    $config['newline']		= "\r\n";
    $config['wordwrap']		= TRUE;

    $this->load->library('email');

    $this->email->initialize($config);

		$system_name	=	$this->db->get_where('settings' , array('key' => 'system_name'))->row()->value;
		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('key' => 'system_email'))->row()->value;

		$this->email->from($from, $system_name);
		$this->email->from($from, $system_name);
		$this->email->to($to);
		$this->email->subject($sub);

		$msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"http://codecanyon.net/item/ekattor-school-management-system-pro/6087521?ref=joyontaroy\">&copy; 2013 Ekattor School Management System Pro</a></center>";
		$this->email->message($msg);

		$this->email->send();

		//echo $this->email->print_debugger();
	}

	public function send_php_mail($msg=NULL, $sub=NULL, $to=NULL, $from=NULL, $attachment_url=NULL) {

	   $from = $this->db->get_where('settings' , array('key' => 'system_email'))->row()->value;

	   $headers = "From: ".$from."\r\n";
	   $headers .= "Reply-To: ".$to."\r\n";
	   $headers .= "Return-Path: ".$to."\r\n";
	   //$headers .= "CC: almobin777@gmail.com\r\n";
	   //$headers .= "BCC: instance.of.venture@gmail.com\r\n";
	   if ( $attachment_url != NULL) {
		   $msg .=	"\r\nAttachment URL: ".$attachment_url;
	   }
	   if ( mail($to,$sub,$msg,$headers) ) {

	   } else {
		   echo "The email has failed!";
	   }
   }
}
