<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model{
	
	function signup (){
		
		$signup_data = array(
			'company'	=>$this->input->post('company'),
			'email'	=>$this->input->post('email'),
			'tel'		=>$this->input->post('tel'),
			'kvk'		=>md5($this->input->post('kvk'))
		);
		
		$insert = $this->db->insert('temp_users', $signup_data);
		return $insert;
		
	}
	
	
}