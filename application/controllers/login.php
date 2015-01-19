<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}
	
	function validate_credentials()
	{
		$this->load->model('membership_model');
		$q = $this->membership_model->validate();
		
		if($q) //if the users credentials validated
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('main/index');
		}

		else
		{
			$this->index();
		}
	}
	
	function signup(){
	$data['main_content'] = 'signup';
		$this->load->view('includes/template', $data);
	}
	
	
}

?>