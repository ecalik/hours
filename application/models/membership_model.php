<?php

class Membership_model extends CI_Model {
	
	function validate()
	{
			$this->db->where('email_address', $this->input->post('username'));
			$this->db->where('password', sha1($this->input->post('password')));
			$query = $this->db->get('users');
			
			if($query->num_rows == 1)
			{
				return true;
			}
	}
	
	/*
	function create_member()
	{
		$new_member_insert_data = array(
		   'first_name' => $this->input->post('username') ,
		   'last_name' => $this->input->post('last_name') ,
		   'email_address' => $this->input->post('email_address'),
		   'username' => $this->input->post('username'),
		   'password' => sha1($this->input->post('password'))
		);
	
		$insert = $this->db->insert('users', $new_member_insert_data); 
		return $insert;
	}
	*/

}
?>