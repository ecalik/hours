<?php
/**
*Author: Nuri
*Date: 19-1-2014
*Description: This controller serves as the main controller, when a member logs in 
*he will go to the frontpage and this frontpage will be accessed by this main controller
**/

class Main extends CI_Controller {
	function index()
	{
		$data['main_content'] = 'main';
		$this->load->view('includes/template', $data);
	}
}
?>