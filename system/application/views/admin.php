<p>
<div id="accordion">
        <h3><a href="#">User Editor</a></h3>
	<div>
	    <?php 
	    $batas = 6;
	    $this->db->reconnect();
	    $query = $this->db->query("select * from user where id_user not like '1' ");
	    $row = $query->num_rows();
	    $page = $row/$batas;
	    ?>
	    <script type="text/javascript">
		$(function() {
           $("#user_pagin").paginate({
				count 		: <?php echo ceil($page);?>,
				start 		: 1,
				display     : 50,
				border					: false,
				text_color  			: '#79B5E3',
				background_color    	: 'none',	
				text_hover_color  		: '#2573AF',
				background_hover_color	: 'none', 
				images					: false,
				mouse					: 'press',
				onChange     			: function(page){
											$('._current','#paginationdemo').removeClass('_current').hide();
											$('#p'+page).addClass('_current').show();
										  }

			});
         });
         </script>
		<p>
		<div id="paginationdemo" class="demo">
        <div id="p1" class="pagedemo _current" style="">
        <table cellpadding="4" class="perlu">
		<tr><th>Username</th><th>Nip</th><th>email</th><th>Name</th><th>Phone</th><th>Division</th><th>Positions</th><th>Action</th></tr>
		<?php
		           $k=1;
		           $m=2;
                   $list = $this->db->query("select id_user,user,nip,email,phone,name,nama_div,nama_jab from user u,jabatan j,divisi d where u.user not like 'admin' and u.id_div=d.id_div and j.id_jab=u.id_jab");
                   foreach ($list->result_array() as $row)
                   { 
                   $username = $row['user'];
                   $id = $row['id_user'];
                   $nip = $row['nip'];
                   $email = $row['email'];
                   $name = $row['name'];
                   $phone = $row['phone'];
                   $div = $row['nama_div'];
                   $jabatan = $row['nama_jab'];
                   $site = site_url();
                   echo "<tr><td>$username</td><td>$nip</td><td>$email</td><td>$name</td><td>$phone</td><td>$div</td><td>$jabatan</td><td> \n";
                   echo "<a title=\"Edit user $username\" class=\"edit_user\" href=\"$site/niriksha/edit_user/$id\">Edit</a> |";
                   echo "<a title=\"Delete user $username\" class=\"delete_user\" href=\"$site/niriksha/delete_user/$id\">Delete</a> </td></tr> \n";
                   if ($k == $batas){
					   echo "</table></div>\n";
					   echo "<div id=\"p$m\" class=\"pagedemo _current\" style=\"display:none;\"> \n";
					   echo "<table cellpadding=\"4\" class=\"perlu\">";
		               echo "<tr><th>Username</th><th>Nip</th><th>email</th><th>Name</th><th>Phone</th><th>Division</th><th>Positions</th><th>Action</th></tr>";
					   $m++;
					   $k=0;
					   }
                   $k++;
                   }                                                                        
		?></table>
		</div>
		</div>
		
		   <div id="user_pagin"></div>
		    <div id="user" style="display: none;" title="Add New User">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/add_user" method="POST" id="form-user">
                                                    <table cellpadding="5">
						    <tr><td>Username</td><td>:</td><td><input type="text" name="username"></td></tr>
						    <tr><td>Password</td><td>:</td><td><input type="password" name="password"></td></tr>
						    <tr><td>NIP</td><td>:</td><td><input type="text" name="nip"></td></tr>
						    <tr><td>Surename</td><td>:</td><td><input type="text" name="name"></td></tr>
						    <tr><td>Email</td><td>:</td><td><input type="text" name="email"></td></tr>
						    <tr><td>Phone</td><td>:</td><td><input type="text" name="phone"></td></tr>
						    <tr><td>Position</td><td>:</td><td><select name="jabatan"><?php
						                                           $list = $this->db->query("select * from jabatan");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id = $row['id_jab'];
                                                                                             $jab =$row['nama_jab'];
                                                                                             echo "<option value=\"$id\">$jab</option>";
                                                                                           }
	 					                                        ?></select></td></tr>
						    <tr><td>Division</td><td>:</td><td><select name="divisi"><?php
						                                           $list = $this->db->query("select * from divisi");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id_div = $row['id_div'];
                                                                                             $div =$row['nama_div'];
                                                                                             echo "<option value=\"$id_div\">$div</option>";
                                                                                           }
	 					                                        ?></select> </td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="useradd" value="Add User"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_user" value="Add User">
		</p>
	</div>
	<h3><a href="#">Division Editor</a></h3>
	<div>
		<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Item</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select * from divisi");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['id_div'];
                   $div =$row['nama_div'];
                   echo "<tr><td>$div</td><td>";
                   echo "<a title=\"Edit $div Division\" class=\"edit_div\" href=\"$site/niriksha/edit_div/$id\">Edit</a> |";
                   echo "<a title=\"Delete $div Division\" class=\"delete_div\" href=\"$site/niriksha/delete_div/$id\">Delete</a> </td></tr>";
                   }                                                                        
		?></tbody></table>
		    <div id="division" style="display: none;" title="Add Division">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/add_divisi" method="POST" id="form_divisi">
                                                    <table cellpadding="5">
						    <tr><td>Name Of Divisions</td><td>:</td><td><input type="text" name="divisi"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="divisi" value="Add Division"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_div" value="Add Division">
		</p>
	</div>
	<h3><a href="#">Positions Editor</a></h3>
	<div>
				<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Item</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select * from jabatan");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['id_jab'];
                   $jab =$row['nama_jab'];
                   echo "<tr><td>$jab</td><td>";
                   echo "<a title=\"Edit Position $jab\" class=\"edit_pos\" href=\"$site/niriksha/edit_pos/$id\">Edit</a> |";
                   echo "<a title=\"Delete Position $jab\" class=\"delete_pos\" href=\"$site/niriksha/delete_pos/$id\">Delete</a> </td></tr>";
                   }                                                                        
		?></table>
		    <div id="position" style="display: none;" title="Add Potision">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/add_position" method="POST" id="form_jabatan">
                                                    <table cellpadding="5">
						    <tr><td>New Position</td><td>:</td><td><input type="text" name="jabatan"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="jabatan" value="Add"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_pos" value="Add Position">
		</p>
	</div>
	
	<h3><a href="#">Camera Configuration</a></h3>
	<div>
		<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Camera name</th><th>Camera type</th><th>Location</th><th>IP address</th><th>Port Number</th><th>Share point</th><th>Action</th><th>Record</th></tr>
		<?php
                   $this->db->reconnect();
                   $list = $this->db->query("select * from camconfig c,lokasi l where c.id_lok=l.id_lok");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['c.id_conf'];
                   $confname = $row['c.nama_conf'];
                   $camtype = $row['c.cam_type'];
                   $lok = $row['l.nama_lok'];
                   $ip = $row['c.ip'];
                   $port = $row['c.port'];
                   $sp = $row['c.share_point'];
                   echo "<tr><td>$confname</td><td>$camtype</td><td>$lok</td><td>$ip</td><td>$port</td><td>$sp</td><td>";  
                   echo "<a title=\"Start Streaming $confname\" class=\"start_cam\" href=\"$site/niriksha/start_cam/$id\">Start Stream || </a>";
                   echo "<a title=\"Delete Camera $confname\" class=\"delete_cam\" href=\"$site/niriksha/delete_cam/$id\">Delete</a></td><td>";
                   echo "<a title=\"Start Recording $confname\" class=\"start_rec\" href=\"$site/niriksha/start_rec/$id\">Start || </a>";
                   echo "<a title=\"Stop Recording $confname\" class=\"stop_rec\" href=\"$site/niriksha/stop_rec/$id\">Stop</a></td></tr>";                                                                      
		}?>
		</table>
		    <div id="camera" style="display: none;" title="Add Camera">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/add_camera" method="POST" id="form-cam">
                                                    <table cellpadding="5">
						                            <tr><td>Camera Name</td><td>:</td><td><input type="text" name="nama"></td></tr>
						                            <tr><td>Camera Type</td><td>:</td><td><input type="text" name="type"></td></tr>
						                            <tr><td>Camera Location</td><td>:</td><td><select name="lokasi"><?php
						                                           $list = $this->db->query("select * from lokasi");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id_lok = $row['id_lok'];
                                                                                             $lok =$row['nama_lok'];
                                                                                             echo "<option value=\"$id_lok\">$lok</option>";
                                                                                           }
	 					                                        ?></select></td></tr>
	 					                            <tr><td>Camera IP</td><td>:</td><td><input type="text" name="ip"></td></tr>
	 					                            <tr><td>Port Number</td><td>:</td><td><input type="text" name="port"></td></tr>
	 					                            <tr><td>Share Point</td><td>:</td><td><input type="text" name="sp"></td></tr>
						                            <tr><td></td><td></td><td><input type="submit" id="camadd" value="Add"></td></tr>
						                            </table>
						                            </form>
                                          </div>
		 <input type="button" id="add_cam" value="Add Camera">
		</p>
	</div>
		<h3><a href="#">Location Editor</a></h3>
	<div>
		<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Item</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select * from lokasi");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['id_lok'];
                   $lok =$row['nama_lok'];
                   echo "<tr><td>$lok</td><td>";
                   echo "<a title=\"Edit Location $lok\" class=\"edit_lok\" href=\"$site/niriksha/edit_lok/$id\">Edit</a> |";
                   echo "<a title=\"Delete Location $lok\" class=\"delete_lok\" href=\"$site/niriksha/delete_lok/$id\">Delete</a> </td></tr>";
                   }                                                                        
		?></table>
		    <div id="location" style="display: none;" title="Add Location">
                                                    <form action="<?php echo site_url();?>/lib_niriksha/add_location" method="POST" id="form-lok">
                                                    <table cellpadding="5">
						                            <tr><td>New Location</td><td>:</td><td><input type="text" name="lokasi"></td></tr>
						                            <tr><td></td><td></td><td><input type="submit" id="lokadd" value="Add"></td></tr>
						                            </table>
						                            </form>
                                          </div>
		 <input type="button" id="add_lok" value="Add Location">
		</p>
	</div>
</div>
</p>
