<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href="#">uploaded video</a></h2>
						<?php 
						$id = $this->uri->segment(3);
						$web = $this->config->item('upload_url');
						$this->db->reconnect();
						$query = $this->db->query("select * from upload u, user s where u.id_user = s.id_user and u.seting like '0' and u.id_upload = $id ");
						$row = $query->row_array();
						$title = $row['u.judul'];
						$dir = $row['u.dir'];
						echo "<a href=\"$web/$dir.flv\" style=\"display:block;width:520px;height:330px\" class=\"player\"></a>\n";
						?>
						<script type="text/javascript">flowplayer("a.player", "<?php echo base_url();?>/style/player/player.swf");</script>
						</div>
					</div>
					
					
					<div style="clear: both;">&nbsp;</div>
</div>
