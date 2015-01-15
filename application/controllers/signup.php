<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	function signup_validate(){
		
		$this->load->library('form_validation');
		//fieldname errormesage validationrules
		
		$this->form_validation->set_rules('company', 'Company', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email');
		$this->form_validation->set_rules('tel', 'Telephone', 'trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('kvk', 'KvK', 'trim|required|exact_length[8]|integer');
		
		if($this->form_validation->run() == FALSE){
			
			$data ['content'] = "signup";
		
			$this->load->view('template/template', $data);
		
		} else {
		
			$this->load->model("signup_model");
			
			if($q = $this->signup_model->signup()){
				
				$data['content'] = 'signup_succes';
				$this->load->view('template/template', $data);
				
			} else {
				
				$data ['content'] = "signup";
		
				$this->load->view('template/template', $data);
				
			}
		}
	}
}
