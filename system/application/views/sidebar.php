		<?php $now=$this->uri->segment(2);?>
		<div id="sidebar">
					<ul>
						<li>
						   <?php 
						   if ($now == ""){
						   $this->load->view("sidebar/home");
						   }else if( $now == "about" || $now == "login" || $now == "error"){ 
                                                    echo "<p></p>";
                                                   } else $this->load->view("sidebar/$now");
						   ?>
						</li>
						
					</ul>
				</div>
