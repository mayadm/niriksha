<form action="<?php echo site_url();?>/lib_niriksha/edit_profile/<?php echo $id;?>" method="POST" id="edit_user">
                                                    <table cellpadding="5">
                                                    <input type="hidden" name="username" value="<?php echo $user;?>"/>
						    <tr><td>Your Sure Name</td><td>:</td><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
						    <tr><td>Your Position</td><td>:</td><td><select name="jabatan" id="jab" class="ui-select-menu">
						                                             <option value="<?php echo $id_jab;?>">----</option>
						                                           <?php
						                                           $list = $this->db->query("select * from jabatan");
                                                                                           foreach ($list->result_array() as $row)
                                                                                           { 
                                                                                             $id_jab = $row['id_jab'];
                                                                                             $jab =$row['nama_jab'];
                                                                                             echo "<option value=\"$id_jab\">$jab</option>";
                                                                                           }
	 					                                        ?></select></td></tr>
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
	 					                                        ?></select></td></tr>
						  </table>
						  </form>