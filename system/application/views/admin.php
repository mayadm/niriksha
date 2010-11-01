<p>
<div id="accordion">
        <h3><a href="#">User Editor</a></h3>
	<div>
		<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Username</th><th>Nip</th><th>email</th><th>Name</th><th>Phone</th><th>Division</th><th>Positions</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select user,nip,email,phone,name,nama_div,nama_jab from user u,jabatan j,divisi d where u.id_div=d.id_div and j.id_jab=u.id_jab");
                   foreach ($list->result_array() as $row)
                   { 
                   $username = $row['user'];
                   $nip = $row['nip'];
                   $email = $row['email'];
                   $name = $row['name'];
                   $phone = $row['phone'];
                   $div = $row['nama_div'];
                   $jabatan = $row['nama_jab'];
                   echo "<tr><td>$username</td><td>$nip</td><td>$email</td><td>$name</td><td>$phone</td><td>$div</td><td>$jabatan</td><td>Edit | Delete</td></tr>";
                   }                                                                        
		?></tbody></table>
		    <div id="division" style="display: none;">
                                                    <form action="#" method="POST" id="form_divisi">
                                                    <table cellpadding="5">
						    <tr><td>Name Of Divisions</td><td>:</td><td><input type="text" name="divisi"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="divisi" value="Add Divisions"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_div" value="Add Division">
		</p>
	</div>
	<h3><a href="#">Division Editor</a></h3>
	<div>
		<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Item</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select * from divisi");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['id_div'];
                   $div =$row['nama_div'];
                   echo "<tr><td>$div</td><td>Edit | Delete</td></tr>";
                   }                                                                        
		?></tbody></table>
		    <div id="division" style="display: none;">
                                                    <form action="#" method="POST" id="form_divisi">
                                                    <table cellpadding="5">
						    <tr><td>Name Of Divisions</td><td>:</td><td><input type="text" name="divisi"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="divisi" value="Add Divisions"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_div" value="Add Division">
		</p>
	</div>
	<h3><a href="#">Positions Editor</a></h3>
	<div>
				<p>
		<table cellpadding="4" class="perlu">
		<tr><th>Item</th><th>Action</th></tr>
		<?php
                   $list = $this->db->query("select * from jabatan");
                   foreach ($list->result_array() as $row)
                   { 
                   $id = $row['id_jab'];
                   $jab =$row['nama_jab'];
                   echo "<tr><td>$jab</td><td>Edit | Delete</td></tr>";
                   }                                                                        
		?></table>
		    <div id="position" style="display: none;">
                                                    <form action="#" method="POST" id="form_jabatan">
                                                    <table cellpadding="5">
						    <tr><td>Name Of Divisions</td><td>:</td><td><input type="text" name="jabatan"></td></tr>
						    <tr><td></td><td></td><td><input type="submit" id="jabatan" value="Add Positions"></td></tr>
						  </table>
						  </form>
                                          </div>
		 <input type="button" id="add_pos" value="Add Positions">
		</p>
	</div>
	
	<h3><a href="#">Section 4</a></h3>
	<div>
		<p>
		Cras dictum. Pellentesque habitant morbi tristique senectus et netus
		et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
		faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
		mauris vel est.
		</p>
		<p>
		Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
		Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
		inceptos himenaeos.
		</p>
	</div>
</div>
</p>