	<?php
	  $id = $this->session->userdata('id');
	  $user = $this->session->userdata('username');
	  $this->db->reconnect();
	  $query = $this->db->query("select u.id_div as div,u.id_jab as jab,nip,phone,email,nama_div,nama_jab,level from user u,divisi d,jabatan j where id_user=$id and u.id_div=d.id_div and u.id_jab=j.id_jab");
	  $row = $query->row_array();
	  $level = $row['level'];
	  $jabatan = $row['nama_jab'];
	  $div = $row['nama_div'];
	  $id_div = $row['div'];
	  $id_jab = $row['jab'];
	  $nip = $row['nip'];
	  $email = $row['email'];
	  $phone = $row['phone'];
	 ?><div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content-profile">
					<div class="post">
						<h2 class="title">Welcome Home, <?php echo $name;?></h2>
						<div class="entry" style="height:<?php if($level == "admin"){ echo 900;} else echo 215; ?>px;">
						<p>
						
						  <table cellpadding="10">
						    <tr><td>Sure Name</td><td>:</td><td><?php echo $name;?></td></tr>
						    <tr><td>Position</td><td>:</td><td><?php echo $jabatan;?></td></tr>
						    <tr><td>NIP</td><td>:</td><td><?php echo $nip;?></td></tr>
						    <tr><td>Email Address</td><td>:</td><td><?php echo $email;?></td></tr>
						    <tr><td>Phone</td><td>:</td><td><?php echo $phone;?></td></tr>
						    <tr><td>Division</td><td>:</td><td><?php echo $div;?> Division</td></tr>
						    <tr><td> <input type="button" id="edit-pass" value="Edit Password"></td><td></td><td> <input type="button" id="edit-profile" value="Edit Profile"></td></tr>
						  </table>
						</p>  
						<?php if($level == "admin"){ $this->load->view('admin');}?>
						<p>
                                          <div id="user_profile" style="display: none;">
                                        
                                                    <form action="<?php echo site_url();?>/lib_niriksha/edit_profile/<?php echo $id;?>" method="POST" id="form_profile">
                                                    <table cellpadding="5">
                                                    <input type="hidden" name="username" value="<?php echo $user;?>"/>
						    <tr><td>Your Sure Name</td><td>:</td><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
						    <?php if ($id != 1){
						    echo "<tr><td>Your Position</td><td>:</td><td><select name=\"jabatan\" id=\"jab\" class=\"ui-select-menu\">";
						                                             echo "<option value=\"$id_jab\">----</option>";
						                                             $list = $this->db->query("select * from jabatan where nama_jab not like 'Administrator'");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id_jab = $row['id_jab'];
                                                                                             $jab =$row['nama_jab'];
                                                                                             echo "<option value=\"$id_jab\">$jab</option>";
                                                                                           }
	 					                                        echo "</select></td></tr>"; }?>
	 					     <tr><td>Your NIP</td><td>:</td><td><input type="text" name="nip" value="<?php echo $nip;?>"/></td></tr>                                    
						    <tr><td>Your Email Address</td><td>:</td><td><input type="text" name="email" value="<?php echo $email;?>"/></td></tr>
						    <tr><td>Your Phone</td><td>:</td><td><input type="text" name="phone" value="<?php echo $phone;?>"/></td></tr>
						    <tr><td>Your Departement</td><td>:</td><td><select name="divisi">
						                                          <option value="<?php echo $id_div;?>">----</option>
						                                           <?php
						                                           $list = $this->db->query("select * from divisi");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id_div = $row['id_div'];
                                                                                             $div =$row['nama_div'];
                                                                                             echo "<option value=\"$id_div\">$div</option>";
                                                                                           }
	 					                                        ?></select> Departement</td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="profile" value="Edit Profile"></td></tr>
						  </table>
						  </form>
                                          </div>
                                          <div id="user_pass" style="display: none;">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/edit_password/<?php echo $id;?>" method="POST" id="form_password">
                                                    <table cellpadding="5">
						    <tr><td>Your Old Password</td><td>:</td><td><input type="password" name="old_password"></td></tr>
						    <tr><td>Your New Password</td><td>:</td><td><input type="password" name="new_password"></td></tr>
						    <tr><td>Reinsert Password</td><td>:</td><td><input type="password" name="2nd_password"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="pass" value="Edit Password"></td></tr>
						  </table>
						  </form>
                                          </div>
                                          
						</p>
						
						</div>
				
				</div>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
