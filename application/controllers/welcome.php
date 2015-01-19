<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function signup()
	{
		$data ['main_content'] = "signup";
		
		$this->load->view('includes/template', $data);
	}
	
}
