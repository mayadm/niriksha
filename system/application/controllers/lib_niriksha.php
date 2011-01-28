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
	
	function add_category(){
	   $kategori = $this->input->post('category');
	   $this->db->reconnect();
	   $this->db->query("insert into kategori(nama_kat) values('$kategori')");	
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
	 
	  function edit_cat($id){
	   $kategori = $this->input->post('new_cat');
	   $this->db->reconnect();
	   $this->db->query("update kategori set nama_kat='$kategori' where id_kat=$id");	
	   redirect("/niriksha/profile/");
	}
	
	function delete_cat($id){
	 $this->db->query("delete from kategori where id_kat=$id");	
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
	 
	 function delvideo($id){
	 $upload_dir=$this->config->item('upload_dir'); 
	 $query = $this->db->query("select dir from upload where id_upload=$id");
	 $row = $query->row_array();
	 $dir = $row['dir'];
	 shell_exec("rm $upload_dir/$dir.flv");	
	 shell_exec("rm $upload_dir/snapshot/$dir.jpg");
	 $this->db->query("delete from upload where id_upload=$id");
	 redirect("/niriksha/video/");
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
	 $ip_server = $this->config->item('ip');
	 $this->db->reconnect();
	 $site = site_url();
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $ip = $row['ip'];
	 $port = $row['port'];
	 if ($port == 80 ){
		  $nguk = $port+$id;
		  $flv_port = "80$nguk";
		  }else $flv_port = $port+$id;
	 $sp = $row['share_point'];	
	 header("location:$site/niriksha/profile");
	 flush(); @ob_flush();
	 set_time_limit(0);
	 ignore_user_abort(0);
	 //shell_exec("cvlc http://$ip:$port/$sp --syslog --sout '#transcode{vcodec=FLV1}:std{access=http,dst=$ip_server:$flv_port/$sp.flv}'&");	  
	shell_exec("cvlc v4l2:///dev/video0 --syslog --sout '#transcode{vcodec=FLV1}:std{access=http,dst=$ip_server:$flv_port/$sp.flv}'&");	 
	 }
	 
	 function startrec($id){
         $now = getdate();
         //$now2= mdate();
	$tgl=$now['date'];
         $day = $now['weekday'];
         $mon = $now['month'];
         $year = $now['year'];
         $min = $now['minutes']; 
         $hour = $now['hours']; 
	 $this->db->reconnect();
         $video_path = $this->config->item('video_path');
         $file = "$video_path/$id--$tgl-$day-$mon-$year-$hour-$min.flv";
         $server_ip = $this->config->item('ip');	 
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $ip = $this->config->item('ip');
	 $port = $row['port'];
          if ($port == 80 ){
		  $nguk = $port+$id;
		  $flv_port = "80$nguk";
		  }else $flv_port = $port+$id;
	 $sp = $row['share_point'];	
     shell_exec("wget -c -O $file http://$ip:$flv_port/$sp.flv > /dev/null & ");
     redirect("/niriksha/profile/");
	 }
	 
	 function stoprec($id){
	   $this->db->reconnect();
     $video_path = $this->config->item('video_path');
     $server_ip = $this->config->item('ip');	 
	 $query = $this->db->query("select * from camconfig where id_conf = $id");
	 $row = $query->row_array();
	 $port = $row['port'];
         if ($port == 80 ){
		  $nguk = $port+$id;
		  $flv_port = "80$nguk";
		  }else $flv_port = $port+$id;
	 $sp = $row['share_point'];	
	 //$pid = shell_exec("ps ax | grep wget | grep \"http://$server_ip:$flv_port/$sp.flv\" | cut -d\" \" -f1 | grep -v grep");
	 $pid = "ps ax | grep wget | grep \"http://$server_ip:$flv_port/$sp.flv\" | cut -d\" \" -f1 | grep -v grep";
     //shell_exec("kill -9 $pid");
     shell_exec("killall vlc");
     redirect("/niriksha/profile/");	 
     }
     
     function upload_video(){
	 $id = $this->input->post('id_user'); 
	 $title = $this->input->post('title');
	 $desc = $this->input->post('desc');
	 $kat = $this->input->post('category');
	 $seting = $this->input->post('seting');
	 $upload_dir = $this->config->item('upload_dir');
	 
	 $config['upload_path'] = $upload_dir;
	 $config['allowed_types'] = 'flv';
	 $config['max_size']	= '0';
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$data = $this->upload->data();
		$raw_name = $data['raw_name'];
		$file_name = sha1($raw_name);
        $error = $this->upload->display_errors();
        if ($error != '' ){
		$this->system_user->system_error($error);
		}else if ($error == '' ){
		 shell_exec("mv \"$upload_dir/$raw_name.flv\" \"$upload_dir/$file_name.flv\"");
		 shell_exec("ffmpeg -i $upload_dir/$file_name.flv -s cif -r 1 -ss 00:00:20 -t 1 -f image2 $upload_dir/snapshot/$file_name.jpg");
		 $this->db->reconnect();
		 $this->db->query("insert into upload(judul,deskripsi,dir,seting,id_user,id_kat) values('$title','$desc','$file_name','$seting','$id',$kat)");
		 redirect('niriksha/video');
		}
     }
     
     function edit_video($id){
		 $title = $this->input->post('title');
		 $desc = $this->input->post('desc');
		 $perm = $this->input->post('perm');
		 $idk = $this->input->post('category');
		 $this->db->reconnect();
		 $this->db->query("update upload set judul='$title',deskripsi='$desc',seting=$perm, id_kat=$idk where id_upload=$id");
		 redirect("niriksha/tampil_video/$id");
		 }
	
}
