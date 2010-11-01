<?php

class Niriksha extends Controller {

	function Niriksha()
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
		$this->system_user->check_session('video');
		$this->load->view('header');
		$this->load->view('video');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function conference()
	{
		$this->system_user->check_session('conference');
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
	
	 function logout(){
         $this->session->sess_destroy();
         redirect('niriksha');
         }
}


