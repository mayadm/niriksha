	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href="#">Video Sharing</a></h2>
					    <?php $id = $this->session->userdata('id');?>
						<div class="entry">
						<?php echo form_open_multipart('lib_niriksha/upload_video');?>

<table>
	<tr>
		<td>tittle</td>
		<td>: <input type="text" name="title" size="30"/></td>
		<input type="hidden" name="id_user" value="<?php echo $id;?>">
	</tr>
	<tr>
		<td>description</td>
		<td>: <textarea name="desc" rows="3" cols="35"></textarea></td>
	</tr>
	<tr>
		<td>file</td>
		<td>: <input type="file" name="userfile" size="20" /></td>
	</tr>
	<tr>
		<td>privacy option</td>
		<td>: <select name="seting">
			<option value=0>public</option>
			<option value=1>same division only</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan=2><input type="submit" value="upload" /></td>

	</tr>
</table>

</form>
<?php
$this->db->reconnect();
$query=$this->db->query("select count(id_upload) as total from upload where seting <> 1");
$row = $query->row_array();
$raw = $row['total'];
$page = $raw/10;
?>
<script type="text/javascript">
		$(function() {
           $("#demo4").paginate({
				count 		: <?php echo round($page)+1;?>,
				start 		: 1,
				display     : 2,
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
<div id="paginationdemo" class="demo">
<div id="p1" class="pagedemo _current" style="">
<table><tr>
<?php
$kolom = 5;
$video = 10;
$i = 0;
$j = 1;
$k = 1;
$user_id=$this->session->userdata('id');
$site = $this->config->item('upload_url');
$web = site_url();
$this->db->reconnect();
$query = $this->db->query("select distinct u.id_upload,u.judul,u.deskripsi,u.dir from upload u, user s where u.id_user = s.id_user and u.seting=0 or u.id_user in (select id_user from user where id_div in (select id_div from user where id_user=$user_id))");
foreach($query->result_array() as $row){
	$id = $row['u.id_upload'];
	$title = $row['u.judul'];
	$deskripsi = $row['u.deskripsi'];
	$dir = $row['u.dir'];
	if($i >= $kolom){
		 echo "</tr><tr>\n";
		 $i = 0;
		 if ($j >= 2){
			 echo "</table></div><div id=\"p$k\" class=\"pagedemo _current\" style=\"display:none;\">";
			 echo "<table>";
			 $j = 0;
			 }
	     $k++;
		 $j++;
		}
	 $i++;
	 echo "<td align=\"center\"><br>	      
	       <a href=\"$web/niriksha/tampil_video/$id\"><img src=\"$site/snapshot/$dir.jpg\" width=\"150px\" ></a>$title
	      <br><br></td>";
     } 
echo "</tr></table>"; 
?>
</div>
</div>
</div><div id="demo4"></div>
					</div>
                
					<div style="clear: both;">&nbsp;</div>
				</div>
