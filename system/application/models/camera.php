<?php
class Camera extends Model {


    function Camera()
    {
        parent::Model();
    }
    function get_camera(){
	$this->db->reconnect();
	$query = $this->db->query("select * from camconfig c,lokasi l where c.id_lok=l.id_lok");
	$ipserver = $this->config->item('ip');	
	foreach($query->result_array() as $row){
		$confname = $row['c.nama_conf'];
        $camtype = $row['c.cam_type'];
        $lok = $row['l.nama_lok'];
        $ip = $row['c.ip'];
        $port = $row['c.port'];
        $sp = $row['c.share_point'];
        echo "<div class=\"post\">\n";
        echo "<h2 class=\"title\">\n";
	    echo "$confname</h2>\n";	
		//echo "<div style=\"clear: both;\">&nbsp;</div>\n";
		echo "<div class=\"entry\"><p>\n";
		echo "<table style=\"font-size:15px;\"><tr><td>location</td><td>:</td><td>$lok</td></tr><br>\n";
		echo "<tr><td>source</td><td>:</td><td>$camtype</td></table><br><br><p align=\"center\">\n";
		echo "<a href=\"http://$ipserver:$port/$sp.flv\" style=\"display:block;width:520px;height:330px\" class=\"player\"></a>\n";
		echo "</p></div>";
	}
    }
}
?>
