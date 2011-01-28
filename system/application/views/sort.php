	<?php 
		$user_id=$this->session->userdata('id');
		$data = $this->db->query("select * from kategori where id_kat = $id");
		$hasil = $data->row_array();
	?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">Videos in <? echo $hasil['nama_kat'];?> Category</h2>
						
         <div class="entry">
<?php

if ($user_id != ''){
	 if ( $user_id == 1 ){
		$hah = "select * from upload where id_kat = $id";
	}else if ( $user_id != 1){
		$hah = "select count(u.id_upload) as total from upload u, user s ,kategori k where u.id_kat = $id and u.id_kat = k.id_kat and u.id_user = s.id_user or( u.id_kat = $id and u.id_kat = k.id_kat and u.id_user = s.id_user and u.id_user in (select id_user from user where id_div = (select id_div from user where id_user=6)))  order by judul";
	}
	}else $hah = "select * from upload where seting = 0 and id_kat = $id";

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
<table cellpadding="10"><tr>
<?php
$kolom = 5;
$video = 10;
$i = 0;
$j = 1;
$k = 2;
$anon = "select * from upload u,user s,kategori k where k.id_kat = u.id_kat and  u.id_user = s.id_user and u.seting = 0 and u.id_kat = $id";

if ($user_id == 1){
	$select = "select * from upload u,user s, kategori k where k.id_kat = u.id_kat and u.id_user = s.id_user and u.id_kat = $id";
	}else if ($user_id != 0 ){$select = "select  s.name,k.nama_kat,u.count,u.id_upload,u.judul,u.deskripsi,u.dir from upload u, user s, kategori k where  u.id_kat = $id and u.id_kat = k.id_kat and u.id_user = s.id_user or( u.id_kat = $id and u.id_kat = k.id_kat and u.id_user = s.id_user and u.id_user in (select id_user from user where id_div = (select id_div from user where id_user=6)))  order by judul";}
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
	$kat = $row['k.nama_kat'];
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
	 echo "<td align=\"center\"><h4>$title</h4>  
	       <a href=\"$web/niriksha/tampil_video/$id\"><img src=\"$site/snapshot/$dir.jpg\" width=\"150px\" ></a><br>
	       <br>
	       Viewed $view times<br>
	       Uploaded By $user <br>
 	      <br><br></td>\n";
     } 

?>
</table></tr></table>
</div>
</div>
</div><div id="demo4"></div>
					</div>
                
					<div style="clear: both;">&nbsp;</div>
				</div>
