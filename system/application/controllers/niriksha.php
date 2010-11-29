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
		//$this->load->view('sidebar');
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
	
		function registrasi()
	{
		$this->load->view('header');
		$this->load->view('registrasi');
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
	
	function profile()
	{      
	        $id = $this->session->userdata('id');
	        $this->system_user->check_session("profile");
	        $data = $this->system_user->user_profile($id);
		$this->load->view('header');
		$this->load->view('profile',$data);
		//$this->load->view('sidebar');
		$this->load->view('footer');
	}
	
	function edit_user($id){
	$data = $this->system_user->user_profile($id);
	$this->load->view('admin_edit_user',$data);
	}
	
	function delete_user($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/delete_user/$id\" method=\"POST\" id=\"del_user\">";
	echo "Are you sure want to delete this user? <br/><br/>";
	echo "</form></p>";
	}
	
	function edit_div($id){
	$site = site_url();
	$this->db->reconnect();
	$query = $this->db->query("select * from divisi where id_div=$id");
	$row = $query->row_array();
	$nama_div = $row['nama_div'];
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/edit_div/$id\" method=\"POST\" id=\"editdiv\">";
	echo "<input type=\"text\" name=\"new_div\" value=\"$nama_div\"";
	echo "</form></p>";
	}
	
	function delete_div($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/delete_div/$id\" method=\"POST\" id=\"del_div\">";
	echo "Are you sure want to delete this division? <br/><br/>";
	echo "</form></p>";
	}
	
	function edit_pos($id){
	$site = site_url();
	$this->db->reconnect();
	$query = $this->db->query("select * from jabatan where id_jab=$id");
	$row = $query->row_array();
	$nama_jab = $row['nama_jab'];
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/edit_pos/$id\" method=\"POST\" id=\"editpos\">";
	echo "<input type=\"text\" name=\"new_pos\" value=\"$nama_jab\"";
	echo "</form></p>";
	}
	
	function delete_pos($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/delete_pos/$id\" method=\"POST\" id=\"del_pos\">";
	echo "Are you sure want to delete this position? <br/><br/>";;
	echo "</form></p>";
	}
	
	function edit_lok($id){
	$site = site_url();
	$this->db->reconnect();
	$query = $this->db->query("select * from lokasi where id_lok=$id");
	$row = $query->row_array();
	$nama_lok = $row['nama_lok'];
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/edit_lok/$id\" method=\"POST\" id=\"edit_lok\">";
	echo "<input type=\"text\" name=\"new_lok\" value=\"$nama_lok\"";
	echo "</form></p>";
	}
	
	function delete_lok($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/dellok/$id\" method=\"POST\" id=\"dellok\">";
	echo "Are you sure want to delete this location? <br/><br/>";
	echo "</form></p>";
	}
	
	function delete_cam($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/delcam/$id\" method=\"POST\" id=\"delcam\">";
	echo "Are you sure want to delete this configuration? <br/><br/>";
	echo "</form></p>";
	}
	
	function start_cam($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/startcam/$id\" method=\"POST\" id=\"startcam\">";
	echo "Are you sure want to start streaming? <br/><br/>";
	echo "</form></p>";
	}
	
	function start_rec($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/startrec/$id\" method=\"POST\" id=\"startrec\">";
	echo "Are you sure want to start recording? <br/><br/>";
	echo "</form></p>";
	}
	
	function stop_rec($id){
	$site = site_url();
	echo "<p align=\"center\"><form action=\"$site/lib_niriksha/stoprec/$id\" method=\"POST\" id=\"stoprec\">";
	echo "Are you sure want to stop recording? <br/><br/>";
	echo "</form></p>";
	}
	
	 function logout(){
         $this->session->sess_destroy();
         redirect('niriksha');
         }
         
     function upload_success(){
	  
		 }
         
    
}


