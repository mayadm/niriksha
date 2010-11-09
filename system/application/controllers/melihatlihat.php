<?php

class Melihatlihat extends Controller {

	function Melihatlihat()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function stream()
	{
		$this->load->view('header');
		$this->load->view('stream');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function video()
	{
		$this->load->view('header');
		$this->load->view('video');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function conference()
	{
		$this->load->view('header');
		$this->load->view('conference');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function about()
	{
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
        
        function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}

        function error()
	{
		$this->load->view('header');
		$this->load->view('error');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
