<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model{
	
	function signup ($key){
		
		$signup_data = array(
			'company'	=>$this->input->post('company'),
			'email'		=>$this->input->post('email'),
			'tel'		=>$this->input->post('tel'),
			'key'		=>$key
		);
		
		$insert = $this->db->insert('temp_users', $signup_data);
		return $insert;
		
	}
	
	function is_key_valid($key){
		
		$this->db->where('key', $key);
		$q = $this->db->get('temp_users');
		
		if ($q->num_rows() >= 1){
			return true;
		} else {
		
			return false;
		}
		
	}
	
	function add_user($key){
	
		$this->db->where('key', $key);
		$q = $this->db->get('temp_users');
		
		if ($q){
			$row = $q->row();
			
			$pass = $this->randomPassword();
			
			$data = array(
				'email_address'	=> $row->email,
				'password'		=> $pass
			);
			
			$q = $this->db->insert('users', $data);
			
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
			$this->email->to($row->email);
			$this->email->subject("Login credentials");
			
			$message = "<p>Thank you for validating your email address.</p>"; 
			$message .= "<p>Enter your email address and use the following as your password: "  . $pass . "</p>";
			
			$this->email->message($message);
			
			if ($this->email->send()){
							
				echo 'check your email for your login credentials';
			
			} else {
				show_error($this->email->print_debugger());
			}
			
		}
		
		if ($q){
				
				$this->db->where('key', $key);
				$this->db->delete('temp_users');
		} else {return false;}
	}
	

	
	function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	}
	
}