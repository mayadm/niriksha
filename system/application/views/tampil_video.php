<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						
						<?php 
						$user_id = $this->session->userdata('id');
						$id = $this->uri->segment(3);
						$web = $this->config->item('upload_url');
						$this->db->reconnect();
						$query = $this->db->query("select * from upload u, user s where u.id_user = s.id_user and u.id_upload = $id ");
						$row = $query->row_array();
						$title = $row['u.judul'];
						$dir = $row['u.dir'];
						$desc = $row['u.deskripsi'];
						$user = $row['s.name'];
						$seting = $row['u.seting'];
						$id_user = $row['u.id_user'];
						echo "<h2 class=\"title\">$title</h2><br><br>";
						echo "<a href=\"$web/$dir.flv\" style=\"display:block;width:520px;height:330px\" class=\"player\"></a>\n";
						echo "<br><h3><strong>Description:</strong><br>$desc</h3><br>\n";
						echo "<br><h3><strong>Uploaded By:</strong> $user</h3><br>\n";
						if ($user_id == $id_user || $user_id == 1){
						$site = site_url();
						echo "<form action=\"$site/lib_niriksha/edit_video/$id\" method=\"POST\"><table>";
						echo "<tr><td>Title</td><td>:</td><td><input type=\"text\" name=\"title\" value=\"$title\"></td></tr>";
						echo "<tr><td>Description</td><td>:</td><td><textarea name=\"desc\" rows=\"6\" cols=\"75\">$desc</textarea></td></tr>";
						echo "<tr><td>Privacy option</td><td>:</td><td><select name=\"perm\"><option selected=\"yes\" value=\"$seting\">--select Privacy Option---</option><option value=\"0\">Public</option><option value=\"1\"> Same Division Only</option></select></td></tr>";
						echo "<tr><td><input type=\"submit\" value=\"Edit Video\"></td><td></td><td><a href=\"$site/niriksha/delete_video/$id\" class=\"delete_video\" title=\"Delete Video $title\"><button>Delete Video</button></a></td></tr><br><br>\n";
						echo "</form></table>";
					    }
						?>
						<script type="text/javascript">flowplayer("a.player", "<?php echo base_url();?>/style/player/player.swf");</script>
						</div>
						
						
					</div>
					
					
					
					
					<div style="clear: both;">&nbsp;</div>
</div>
