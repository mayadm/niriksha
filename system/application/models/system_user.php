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
      $id = $this->session->userdata('id');
      if ($user != "" && $password != "" && $level!= "" && $id != ""){
          $this->db->reconnect();
          $query = $this->db->query("select * from user where user like '$user' and level like '$level' and pw like '$password' and ROWID = $id");
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
	        $login = array(
                    'username' => $user,
                    'password' => $encpass,
                    'level' => $level,
                    'id' => $row['ROWID']
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
}
?>
