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
                $url = site_url();
                $login_url = "$url/niriksha/login";
                $message = "Username and password not found or incorrect, Please <a href=$login_url>Relogin</a>";
		$valid = $this->system_user->user_login($user,$password);
		if ($valid == 1 ){
			redirect("/niriksha/$before"); 
	        }else if ( $valid == 2){
			redirect("/niriksha/login");
		}else if ( $valid == 0){ $this->system_user->system_error($message);
             }
		
	}
	
	
}
