	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">Welcome Home <?php echo $name;?></h2>
						<div class="entry" style="height:215px;">
						<p>
						 <?php
						  $id = $this->session->userdata('id');
						  $this->db->reconnect();
						  $query = $this->db->query("select phone,email,nama_div,nama_jab,level from user u,divisi d,jabatan j where id_user=$id and u.id_div=d.id_div and u.id_jab=j.id_jab");
						  $row = $query->row_array();
						  $level = $row['level'];
						  $jabatan = $row['nama_jab'];
						  $div = $row['nama_div'];
						  $email = $row['email'];
						  $phone = $row['phone'];
						 ?>
						  <table cellpadding="15">
						    <tr><td>Your Sure Name</td><td>:</td><td><?php echo $name;?></td></tr>
						    <tr><td>Your Position</td><td>:</td><td><?php echo $jabatan;?></td></tr>
						    <tr><td>Your Email Address</td><td>:</td><td><?php echo $email;?></td></tr>
						    <tr><td>Your Phone</td><td>:</td><td><?php echo $phone;?></td></tr>
						    <tr><td>Your Departement</td><td>:</td><td><?php echo $div;?> Departement</td></tr>
						    <tr><td> <input type="button" id="edit-pass" value="Edit Password"></td><td></td><td> <input type="button" id="edit-profile" value="Edit Profile"></td></tr>
						  </table>
						</p>
						<p>
						<script>
						$(function() {

                                           	$("#user_profile").dialog({
			                          autoOpen: false,
						  height: 300,
						  width: 400,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						 $('#edit-profile')
			                          .button()
			                          .click(function() {
				                  $('#user_profile').dialog('open');
		                                 });
		                                 
		                                 $("#user_pass").dialog({
			                          autoOpen: false,
						  height: 220,
						  width: 350,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						  });
						 $('#edit-pass')
			                          .button()
			                          .click(function() {
				                  $('#user_pass').dialog('open');
		                                 });
		                                 $('#profile')
			                          .button()
			                          .click(function() {
				                   $("#form-profile").submit();
		                                 });
		                                 $('#pass')
			                          .button()
			                          .click(function() {
				                   $("#form-profile").submit();
		                                 });
		                               });
						</script>



                                          <div id="user_profile" style="display: none;">
                                                    <form action="#" method="POST" id="form_profile">
                                                    <table cellpadding="5">
						    <tr><td>Your Sure Name</td><td>:</td><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
						    <tr><td>Your Position</td><td>:</td><td><select name="jabatan"><?php
						                                           $list = $this->db->query("select * from jabatan");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id = $row['id_jab'];
                                                                                             $jab =$row['nama_jab'];
                                                                                             echo "<option value=\"$id\">$jab</option>";
                                                                                           }
	 					                                        ?></select></td></tr>
						    <tr><td>Your Email Address</td><td>:</td><td><input type="text" name="email" value="<?php echo $email;?>"/></td></tr>
						    <tr><td>Your Phone</td><td>:</td><td><input type="text" name="phone" value="<?php echo $phone;?>"/></td></tr>
						    <tr><td>Your Departement</td><td>:</td><td><select name="jabatan"><?php
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
                                                    <form action="#" method="POST" id="form_password">
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
