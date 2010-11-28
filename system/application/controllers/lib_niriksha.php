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
		$username = $_POST['user'];
		$user = strtolower($username);
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
	$user = strtolower($username);
	$password = $this->input->post('password');
	$name = $this->input->post('name');
	$email = $this->input->post('email');
	$phone = $this->input->post('phone');
	$jabatan = $this->input->post('jabatan');
	$divisi = $this->input->post('divisi');
	$nip = $this->input->post('nip');
	$this->db->reconnect();
	$encpass = sha1($password);
        $query = $this->db->query("insert into user (user,nip,id_div,id_jab,email,pw,level,name,phone) values('$user','$nip','$divisi','$jabatan','$email','$encpass','NULL','$name','$phone')");
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
	if ($id != 1){
		$query = "update user set user='$username',name='$name',email='$email',phone='$phone',id_div='$divisi',id_jab='$jabatan',nip='$nip' where id_user=$id";
	}else if ($id == 1){
		$query = "update user set user='$username',name='$name',email='$email',phone='$phone',id_div='$divisi',nip='$nip' where id_user=$id";
	}
	$this->db->query($query);
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
	     $this->system_user->system_error('Please fill out all password form!!');
	   }else if ($encpw != $pw){
	      $this->system_user->system_error('invalid old password!!');
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
	
	function delete_user($id){
	 if ( $id != "1"){
	 $this->db->query("delete from user where id_user=$id");	
	 redirect("/niriksha/profile/");
	 }else if ( $id == "1"){
	   $this->system_user->system_error("You can't DELETE Administrator !!!!");
	 }	 
	}
	
	function edit_div($id){
	   $divisi = $this->input->post('new_div');
	   $this->db->reconnect();
	   $this->db->query("update divisi set nama_div='$divisi' where id_div=$id");	
	   redirect("/niriksha/profile/");
	}
	
	function delete_div($id){
	 $this->db->query("delete from divisi where id_div=$id");	
	 redirect("/niriksha/profile/");
	 }
	 
	 function edit_pos($id){
	   $jabatan = $this->input->post('new_jab');
	   $this->db->reconnect();
	   $this->db->query("update jabatan set nama_jab='$jabatan' where id_jab=$id");	
	   redirect("/niriksha/profile/");
	}
	
	function delete_pos($id){
	 $this->db->query("delete from jabatan where id_jab=$id");	
	 redirect("/niriksha/profile/");
	 }
	 
	 function add_location(){
	$lok = $this->input->post('lokasi');
	$this->db->reconnect();
	$this->db->query("insert into lokasi(nama_lok) values('$lok')");
	redirect("niriksha/profile");	 
		 }
		 
	function edit_lok($id){
	   $lok = $this->input->post('new_lok');
	   $this->db->reconnect();
	   $this->db->query("update lokasi set nama_lok='$lok' where id_lok=$id");	
	   redirect("/niriksha/profile/");
	}
	
	function dellok($id){
	 $this->db->query("delete from lokasi where id_lok=$id");	
	 redirect("/niriksha/profile/");
	 }
	 
	 function delcam($id){
	 $this->db->query("delete from camconfig where id_conf=$id");	
	 redirect("/niriksha/profile/");
	 }
	 
	  function add_camera(){
	$lok = $this->input->post('lokasi');
	$nama = $this->input->post('nama');
	$type = $this->input->post('type');
	$ip = $this->input->post('ip');
	$port = $this->input->post('port');
	$sp = $this->input->post('sp');
	$this->db->reconnect();
	$this->db->query("insert into camconfig(nama_conf,cam_type,id_lok,ip,port,share_point) values('$nama','$type','$lok','$ip','$port','$sp')");
	
	redirect("niriksha/profile");	 
		 }
		 
	function startcam($id){
	 $this->db->reconnect();
	 $site = site_url();
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $ip = $row['ip'];
	 $port = $row['port'];
	 $sp = $row['share_point'];	
	 header("location:$site/niriksha/profile");
	 flush(); @ob_flush();
	 set_time_limit(0);
	 ignore_user_abort(0);
	 shell_exec("cvlc v4l2:///dev/video0 --syslog --sout '#transcode{vcodec=FLV1}:std{access=http,dst=0.0.0.0:$port/$sp.flv}'&");
	 
	  
	 }
	 
	 function startrec($id){
	 $this->db->reconnect();
     $video_path = $this->config->item('video_path');
     $server_ip = $this->config->item('ip');	 
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $ip = $row['ip'];
	 $port = $row['port'];
	 $sp = $row['share_point'];	
     shell_exec("wget -c -P $video_path http://$ip:$port/$sp.flv > /dev/null & ");
     redirect("/niriksha/profile/");
	 }
	 
	 function stoprec($id){
	   $this->db->reconnect();
     $video_path = $this->config->item('video_path');
     $server_ip = $this->config->item('ip');	 
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $ip = $row['ip'];
	 $port = $row['port'];
	 $sp = $row['share_point'];	
	 $pid = shell_exec("ps ax | grep -m 1 \"wget -c -P $video_path http://$server_ip:$port/$sp.flv\" | cut -d\" \" -f 1");
     shell_exec("kill -9 $pid");
     redirect("/niriksha/profile/");	 
     }
	
}
