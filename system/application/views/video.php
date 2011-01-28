	<?php 
		$user_id=$this->session->userdata('id');
	?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href="#">Video Sharing</a></h2>
						<div  style="<? if ($user_id == '') { echo "display: none;";}?>">
						<?php echo form_open_multipart('lib_niriksha/upload_video');?>

<table>
	<tr>
		<td>title</td>
		<td>: <input type="text" name="title" size="30"/></td>
		<input type="hidden" name="id_user" value="<?php echo $user_id;?>">
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
		<td>category</td>
		<td>: <select name="category">
			<?php 
				$data = $this->db->query("select * from kategori");
				foreach($data->result_array() as $row){
					$id = $row['id_kat'];
					$nama = $row['nama_kat'];
					echo "<option value=\"$id\">$nama</option>";
					}
			?>
		</select>
			
		</td>
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
</div>
<div class="entry">
<?php

if ($user_id != ''){
	 if ( $user_id == 1 ){
		$hah = "select * from upload u, kategori k where u.id_kat = k.id_kat ";
	}else if ( $user_id != 1){
		$hah = "select u.id_upload as total from upload u, user s,kategori k where u.seting = 0 and u.id_kat = k.id_kat and u.id_user = s.id_user or( u.id_kat = k.id_kat and u.id_user = s.id_user and u.id_user in (select id_user from user where id_div = (select id_div from user where id_user=6)))  order by judul";
	}
	}else $hah = "select * from upload u,user s,kategori k where u.id_kat = k.id_kat and u.id_user = s.id_user and u.seting = 0 order by judul";

$query=$this->db->query($hah);
$row = $query->num_rows();
$page = $row/10;
?>
<script type="text/javascript">
		$(function() {
           $("#demo4").paginate({
				count 		: <?php echo ceil($page);?>,
				start 		: 1,
				display     : 10,
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
<table cellpadding="15"><tr>
<?php
$kolom = 5;
$video = 10;
$i = 0;
$j = 1;
$k = 2;
$anon = "select * from upload u,user s,kategori k where u.id_kat = k.id_kat and u.id_user = s.id_user and u.seting = 0 order by judul";

if ($user_id == 1){
	$select = "select * from upload u,user s, kategori k where k.id_kat = u.id_kat and u.id_user = s.id_user order by judul";
	}else if ($user_id != 0 ){$select = "select k.nama_kat,u.count,u.id_kat,s.name,u.id_upload,u.judul,u.deskripsi,u.dir  from upload u, user s,kategori k where u.seting = 0 and u.id_kat = k.id_kat and u.id_user = s.id_user or( u.id_kat = k.id_kat and u.id_user = s.id_user and u.id_user in (select id_user from user where id_div = (select id_div from user where id_user=6)))  order by judul";}
	else $select = $anon;
$site = $this->config->item('upload_url');
$web = site_url();
$this->db->reconnect();
$query = $this->db->query($select);
foreach($query->result_array() as $row){
	$id = $row['u.id_upload'];
	$title = $row['u.judul'];
	$deskripsi = $row['u.deskripsi'];
	$dir = $row['u.dir'];
	$view = $row['u.count'];
	$user = $row['s.name'];
	$kategori = $row['k.nama_kat'];
	$id_kat = $row['u.id_kat'];
	if($i >= $kolom){
 		
		 echo "</tr><tr>\n";
		 $i = 0;
		 if ($j >= 2){
			 echo "</table></div><div id=\"p$k\" class=\"pagedemo _current\" style=\"display:none;\">\n";
			 echo "<table cellpadding=\"15\"><tr>\n";
			 $j = 0;
			 $k++;
			 }
		 $j++;
		}
	 
	 $i++;
	 echo "<td align=\"center\">
			<h4>$title</h4> 	      
	       <a href=\"$web/niriksha/tampil_video/$id\"><img src=\"$site/snapshot/$dir.jpg\" width=\"150px\" ></a><br>
	       <br>
	       Viewed $view times<br>
	       Uploaded By $user <br>
	       Category <a href=\"$web/niriksha/sort_video/$id_kat\">$kategori</a>
	      <br><br></td>\n";
     } 

?>
</table></tr></table>
</div>
</div>
</div><div id="demo4"></div>


					</div>
<?php 
$data = $this->db->query("select * from kategori ");
echo"<p>categories:</p><p>";
foreach($data->result_array() as $row){
	$kategori = $row['nama_kat'];
	$idk = $row['id_kat'];
	
	echo "<a href='$web/niriksha/sort_video/$idk'>$kategori      </a>";
	}
echo"</p>";
?>
					<div style="clear: both;">&nbsp;</div>
				</div>
