<?php $now=$this->uri->segment(3);?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">create an account</h2><br>
						
						<div style="clear: both;">&nbsp;</div>
						<div class="entry" style="height:200px">
				                <p>
				                 <form action="<?php echo site_url();?>/niriksha/registrasi/" method="POST">
	                                          <table cellpadding="5">
												<tr>
													<td>Name</td><td>:</td>
													<td><input type="text" name="name"/></td>
												</tr>
												<tr>
													<td>Position</td><td>:</td><td><select name="jabatan" id="jab" class="ui-select-menu">
						                                 <option>-select position-</option>
						                                 <?php
						                                   $list = $this->db->query("select * from jabatan");
                                                           foreach ($list->result_array() as $row)
                                                           { 
                                                              $id_jab = $row['id_jab'];
                                                              $jab =$row['nama_jab'];
                                                              echo "<option value=\"$id_jab\">$jab</option>";
                                                            }
	 					                                        ?></select></td>
	 					                        </tr>
												<tr>
													<td>NIP</td><td>:</td>
													<td><input type="text" name="nip" /></td>
												</tr>                                    
												<tr>
													<td>E-Mail</td><td>:</td>
													<td><input type="text" name="email" /></td>
												</tr> 
												<tr>
													<td>Division</td><td>:</td>
													<td><select name="divisi">
						                                <option>-select division-</option>
						                                <?php
						                                $list = $this->db->query("select * from divisi");
                                                        foreach ($list->result_array() as $row)
                                                        { 
                                                           $id_div = $row['id_div'];
                                                           $div =$row['nama_div'];
                                                           echo "<option value=\"$id_div\">$div</option>";
                                                        }
														?></select>
													</td>
												</tr>
											</table>
	                                         </form>
                                                </p>  
						</div>
					</div>

					
					<div style="clear: both;">&nbsp;</div>
				</div>
