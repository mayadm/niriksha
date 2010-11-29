<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						
						<?php 
						$id = $this->uri->segment(3);
						$web = $this->config->item('upload_url');
						$this->db->reconnect();
						$query = $this->db->query("select * from upload u, user s where u.id_user = s.id_user and u.seting like '0' and u.id_upload = $id ");
						$row = $query->row_array();
						$title = $row['u.judul'];
						$dir = $row['u.dir'];
						$desc = $row['u.deskripsi'];
						$user = $row['s.name'];
						echo "<h2 class=\"title\">$title</h2><br><br>";
						echo "<a href=\"$web/$dir.flv\" style=\"display:block;width:520px;height:330px\" class=\"player\"></a>\n";
						echo "<br><h3><strong>Description:</strong><br>$desc</h3><br>\n";
						echo "<br><h3><strong>Uploaded By:</strong> $user</h3><br>\n";
						?>
						<script type="text/javascript">flowplayer("a.player", "<?php echo base_url();?>/style/player/player.swf");</script>
						
						<?php 
						//$this->load->library('pagination');

						//$config['base_url'] = 'http://localhost/niriksha/index.php/niriksha/tampil_video/';
						//$config['total_rows'] = '200';
						//$config['per_page'] = '10';

						//$this->pagination->initialize($config);

						//echo $this->pagination->create_links();
						
						
						?>
						
						</div>
						
						
					</div>
					
					
					
					
					<div style="clear: both;">&nbsp;</div>
</div>
