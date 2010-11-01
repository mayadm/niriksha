<?php
class System_user extends Model {


    function System_user()
    {
        parent::Model();
    }
    
     function check_session($before){
      $user = $this->session->userdata('username');
      $password = $this->session->userdata('password');
      $level = $this->session->userdata('level');
      if ($user != "" && $password != ""){
          $this->db->reconnect();
          $query = $this->db->query("select * from user where user like '$user' and pw like '$password'");
          if ($query->num_rows() > 0){
             $now = $this->uri->segment(2);
             if ($now != $before){
                  redirect("niriksha/$before");
                }
             }else if ($query->num_rows() == 0){
               redirect("niriksha/login/$before");
          }
      }else redirect("niriksha/login/$before");
    }
    
     function user_login($user,$pass){
	 $encpass = sha1($pass);
	 $this->db->reconnect();
	 $query = $this->db->query("select * from user where user like '$user' and pw like '$encpass'");
	 if ($query->num_rows() > 0){
	     $row = $query->row_array();
	     if ($row['user'] == $user  && $row['pw'] == $encpass){
	        $level = $row['level'];
	        $id = $row['id_user'];
	        $name = $row['name'];
	        $login = array(
                    'username' => $user,
                    'password' => $encpass,
                    'level' => $level,
                    'id' => $id,
                    'name' => $name 
                        );
            $this->session->set_userdata($login);
            return 1;
	  }else if ($row['pw'] != $encpass){
	   return 2;
           }
          }else if ($query->num_rows() == 0){
         return 0;
      }
      }

     function system_error($error){
     $message['error'] = $error;
     $this->load->view('header');
     $this->load->view('error',$message);
     $this->load->view('sidebar');
     $this->load->view('footer');
     }
     
     function user_profile($id){
     $this->db->reconnect();
     $query = $this->db->query("select * from user where id_user=$id");
     $row = $query->row_array();
     $data['name'] = $row['name'];
     $data['nip'] = $row['nip'];
     $data['id_div'] = $row['id_div'];
     $data['id_jab'] = $row['id_jab'];
     $data['email'] = $row['email'];
     return $data;
     }
}
?>
