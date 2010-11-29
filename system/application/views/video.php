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
<table><tr>
<?php
$kolom = 5;
$i = 0;
$site = $this->config->item('upload_url');
$web = site_url();
$this->db->reconnect();
$query = $this->db->query("select * from upload u, user s where u.id_user = s.id_user and u.seting like '0'");
foreach($query->result_array() as $row){
	$id = $row['u.id_upload'];
	$title = $row['u.judul'];
	$deskripsi = $row['u.deskripsi'];
	$dir = $row['u.dir'];
	$uploader = $row['s.name'];
	if($i >= $kolom){
		 echo "</tr><tr>";
		 $i = 0;
		}
	 $i++;
	 echo "<td align=\"center\"><br>	      
	       <a href=\"$web/niriksha/tampil_video/$id\"><img src=\"$site/snapshot/$dir.jpg\" width=\"150px\" title=\"$deskripsi\"></a>$title
	      <br><br></td>";
}
?>
</tr></table> 
						</div>
					</div>
					<div style="clear: both;">&nbsp;</div>
				</div>
