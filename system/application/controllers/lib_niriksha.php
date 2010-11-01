<?php

class Lib_niriksha extends Controller {

	function Lib_niriksha()
	{
		parent::Controller();	
	}
	
	function index()
	{
		echo "Hallo aku lib Melihatlihat";
	}
	
	function login()
	{   
		$before = $_POST['before']; 
		$user = $_POST['user'];
		$password = $_POST['password'];
		$valid = $this->system_user->user_login($user,$password);
		if ($valid == 1 ){
			redirect("/niriksha/$before"); 
	        }else if ( $valid == 2){
			redirect("/niriksha/login");
		}else echo "user name nya nggak ada";
		
	}
	
	
}
