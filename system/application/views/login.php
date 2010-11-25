	<?php $now=$this->uri->segment(3);?>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">please login first to use <?php echo $this->config->item('softname');?></h2>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry" style="height:200px">
				                <p>
				                 <form action="<?php echo site_url();?>/lib_niriksha/login/" method="POST">
	                                          <table>
	                                           <input type="hidden" name="before" value="<?php echo $now;?>">
	                                           <tr><td>username</td><td>:</td><td><input type="text" name="user"></td></tr>
	                                           <tr><td>password</td><td>:</td><td><input type="password" name="password"></td></tr>
	                                           <tr><td></td><td></td><td><input type="submit" value="login"></td></tr>
	                                          </table>
	                                         </form>
                                                </p>  
						</div>
					</div>

					
					<div style="clear: both;">&nbsp;</div>
				</div>
