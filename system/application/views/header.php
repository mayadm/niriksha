<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $this->config->item('softname');?></title>
<link rel="shortcut icon" href="<?php echo base_url()?>favicon.png">
<link href="<?php echo base_url()?>style/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo base_url()?>style/redmond/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
<script src="<?php echo base_url()?>style/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>style/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>style/select-jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>style/ajaxnav.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>style/jquery.paginate.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>style/player/flowplayer.js" type="text/javascript"></script>


</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="<?php echo site_url()?>/niriksha"><?php echo $this->config->item('softname');?></a></h1>
				<p><?php echo $this->config->item('slogan');?></p>
				
				<p> 
				  <?php
				    $name = $this->session->userdata('name');
				    $site = site_url();
				    $id = $this->session->userdata('id');
				    if ($name != "" ){
				    echo "Welcome back, <a href=\"$site/niriksha/profile/$id\" style=\"color:red;\">$name</a>";
				    }
				  ?>
				</p>
				
			</div>
			<div id="menu">
			<?php $now = $this->uri->segment(2);?>
				<ul>
					<li <?php if ($now == ""){ echo "class=\"current_page_item\"";} ?> ><a href="<?php echo site_url()?>/niriksha">Home</a></li>
					<li <?php if ($now == "stream"){ echo "class=\"current_page_item\"";} ?> ><a href="<?php echo site_url()?>/niriksha/stream">Stream</a></li>
					<li <?php if ($now == "video"){ echo "class=\"current_page_item\"";} ?> ><a href="<?php echo site_url()?>/niriksha/video">Video</a></li>
					<li <?php if ($now == "conference"){ echo "class=\"current_page_item\"";} ?> ><a href="<?php echo site_url()?>/niriksha/conference">Conference</a></li>
					<li <?php if ($now == "about"){ echo "class=\"current_page_item\"";} ?> ><a href="<?php echo site_url()?>/niriksha/about">About</a></li>
					<?php
					   $user = $this->session->userdata('username');
					   $url = site_url();
					   if ($user != ""){
					   echo "<li ><a href=\"$url/niriksha/logout\">Logout</a></li>";
					   }else echo "";
					?>
				</ul>
			</div>
		</div>
	</div>
