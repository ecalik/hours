<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	function signup_validate(){
		
		$this->load->library('form_validation');
		//fieldname errormesage validationrules
		
		$this->form_validation->set_rules('company', 'Company', 'trim|required|min_length[3]|xss_clean|is_unique[temp_users.company]');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|xss_clean|is_unique[users.email_address]');
		$this->form_validation->set_rules('tel', 'Telephone', 'trim|required|integer|exact_length[10]|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			
			$data ['main_content'] = "signup";
		
			$this->load->view('loginincludes/template', $data);
		
		} else {
		
			$this->load->model("signup_model");
			
			$key = md5(uniqid());
			
			if($this->signup_model->signup($key)){
				
				$config = array(
				
					'protocol'	=> 'smtp',
					'smtp_host'	=> 'ssl://smtp.googlemail.com',
					'smtp_port'	=> 465,
					'smtp_user'	=> 'ecalik@gmail.com',
					'smtp_pass'	=> 'lailaheillallah',
					'mailtype'	=> 'html',
					'newline'	=> "\r\n"
				);
				
				$this->load->library('email', $config);
				
				$this->email->from('e_calik@yahoo.com', "Erhan");
				$this->email->to($this->input->post('email'));
				$this->email->subject("Account confirmation");
				
				$message = "<p>Thank you for registering</p>"; 
				$message .= "<p>" . anchor('signup/register_user/' . $key, "Click here to confirm your email address!") . "</p>";
				
				$this->email->message($message);
				
				if ($this->email->send()){
								
				$data['main_content'] = 'signup_succes';
				$this->load->view('loginincludes/template', $data);
				
				} else {
					show_error($this->email->print_debugger());
				}
				
			} else {
				
				$data ['main_content'] = "signup";
		
				$this->load->view('loginincludes/template', $data);
				
			}
		}
	}
	
	function register_user($key){
			
		$this->load->model('signup_model');
		
		if($this->signup_model->is_key_valid($key)){
			
			$this->signup_model->add_user($key);
			
			echo 'check your email for your login credentials';
			
		} else {
			
			echo 'invalid key';
			
		}
	
	}
	
}
