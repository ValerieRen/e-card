<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{
		//$this->load->view('welcome_message');
		$this->form_validation->set_rules ( 'client_email', 'Client Email', 'trim|required' );
		$this->form_validation->set_rules ( 'client_first_name', 'Client First Name', 'trim|required' );
/* 		$this->form_validation->set_rules ( 'client_last_name', 'Client Last Name', 'trim|required' );
 */		$this->form_validation->set_rules ( 'sender_email', 'Sender Email', 'trim|required' );
/* 		$this->form_validation->set_rules ( 'sender_first_name', 'Sender First Name', 'trim|required' );
		$this->form_validation->set_rules ( 'sender_last_name', 'Sender Last Name', 'trim|required' ); */
		$this->form_validation->set_rules ( 'sender_name', 'Sender Name', 'trim|required' ); 
		$this->form_validation->set_rules ( 'message', 'Message', 'trim|required' );
		
		if ($this->form_validation->run () == FALSE)
		{
			$this->load->view('shared/header');
			$this->load->view('admin/send_card');
			$this->load->view('shared/footer');
		}
		else
		{
		
			$client_email = $this->input->post('client_email');
			$client_first_name = $this->input->post('client_first_name');
			$client_last_name = $this->input->post('client_last_name');
			$sender_email = $this->input->post('sender_email');
/* 			$sender_first_name = $this->input->post('sender_first_name');
			$sender_last_name = $this->input->post('sender_last_name'); */
			$sender_name = $this->input->post('sender_name');
			$message = $this->input->post('message');
		
			$config['protocol']    	= 'smtp';
			$config['smtp_host']	= 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_user']    = 'xxxxxxx@gmail.com';
			$config['smtp_pass']    = 'xxxxxx';
			$config['charset']    	= 'utf-8';
			$config['newline']    	= "\r\n";
			$config['mailtype']		= 'html';
			$config['validate'] = TRUE; // bool whether to validate email or not
				
			$this->email->initialize($config);
		
			$mail_body = '<!DOCTYPE html>';
			$mail_body .= '<head>';
			$mail_body .= '</head>';
			$mail_body .= '<body>';
			$mail_body .= '<table cellpadding="20px" background="' . base_url() . '/assets/img/card.jpg" width="400px" height="600px" align="center">';
			$mail_body .= '<tr width="100%"><td><br><br><br><br><br></td></tr>';
			$mail_body .= '<tr><td><table width="100%" >';
			$mail_body .= '<tr><td align="left"><font face="Comic Sans MS">Dear '.$client_first_name.':</font></td></tr>';
			$mail_body .= '<tr><td><font face="Comic Sans MS">&nbsp;&nbsp;'.$message.'</font></td></tr>';
			$mail_body .= '<tr><td>&nbsp;</td></tr>';
			$mail_body .= '<tr><td align="right"><font face="Comic Sans MS">'.$sender_name.'</font>&nbsp;&nbsp;&nbsp;</td></tr>';
			$mail_body .= '	</table></td></tr>';
			$mail_body .= '</table>';
			$mail_body .= '</body>';
			$mail_body .= '</html>';

			
			//$this->email->set_newline("\r\n");
			$this->email->from($sender_email, $sender_name);								//sender email & sender name
			$this->email->to($client_email);	
			$this->email->bcc($sender_email);												//client email
			$this->email->subject("Merry Christmas");										//email title
			$this->email->message($mail_body);												//email content
		
			if ( ! $this->email->send())
				echo $this->email->print_debugger();
			else
				header ( "Location: /" );				
		}
	}
}
