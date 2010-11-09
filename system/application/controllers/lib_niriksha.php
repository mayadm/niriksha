<?php

class Lib_niriksha extends Controller {

	function Lib_niriksha()
	{
		parent::Controller();	
	}
	
	function index()
	{
	        $id = $this->session->userdata('id');
		redirect("/niriksha/profile/$id");
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
	
	function add_user(){
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$jabatan = $this->input->post('jabatan');
	$divisi = $this->input->post('divisi');
	$nip = $this->input->post('nip');
	$this->db->reconnect();
	$encpass = sha1($password);
        $query = $this->db->query("insert into user (user,nip,id_div,id_jab,email,pw,level,name,phone) values('$username','$nip','$divisi','$jabatan','$email','$encpass','NULL','$name','$phone')");
	redirect('/niriksha/profile/1');
	}
	
	function edit_profile($id){
	$username = $this->input->post('username');
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$jabatan = $this->input->post('jabatan');
	$divisi = $this->input->post('divisi');
	$nip = $this->input->post('nip');
	$this->db->reconnect();
	$query = $this->db->query("update user set user='$username',name='$name',email='$email',phone='$phone',id_div='$divisi',id_jab='$jabatan',nip='$nip' where id_user=$id");
	redirect("/niriksha/profile/$id");
	}
	
	function edit_password($id){
	$password = $this->input->post('new_password');
	$oldpassword = $this->input->post('old_password');
	$pass = $this->input->post('2nd_password');
	$encpw = sha1($oldpassword);
	$this->db->reconnect();
	$query = $this->db->query("select pw from user where id_user=$id");
	$row = $query->row_array();
	$pw = $row['pw'];
	
	 if ($oldpassword == "" || $pass == "" || $password == ""){
	     $this->system_user->system_error('Please fill out all password form !!');
	   }else if ($encpw != $pw){
	      $this->system_user->system_error('You not entered valid old password !!');
	   }else if ($password != $pass){
	      $this->system_user->system_error('Please insert 2 new password identicaly');
	   }else if ( $encpw == $pw && $password == $pass ){
	      $inputpass = sha1($password);
	      $this->db->reconnect();
              $query = $this->db->query("update user set pw='$inputpass' where id_user=$id");
              redirect("/niriksha/profile/$id");
	   }
	}
	
	function add_divisi(){
	   $divisi = $this->input->post('divisi');
	   $this->db->reconnect();
	   $this->db->query("insert into divisi(nama_div) values('$divisi')");	
	   redirect("/niriksha/profile/");
	}
	
	function add_position(){
	   $jabatan = $this->input->post('jabatan');
	   $this->db->reconnect();
	   $this->db->query("insert into jabatan(nama_jab) values('$jabatan')");	
	   redirect("/niriksha/profile/");
	}
	
}
