<?php
	
	function conexion()
	{
	    //$db_connection =  mysqli_connect("localhost", "famcnetc_admin", "A1030570356MC"); //cambiar usuario por osmed
	    $db_connection =  mysqli_connect("famc.net.co", "famcnetc_admin", "A1030570356MC"); //cambiar usuario por osmed
	
        	if (!$db_connection) {
			echo 'conexion';
		    die('No pudo conectarse: ' . mysqli_error($db_connection));
		}
		//--------------------------------------------------------------
		mysqli_select_db($db_connection,"famcnetc_intersoft") or die(mysqli_error($db_connection));
		//mysqli_select_db($db_connection,"famcnetc_intersoft") or die(mysqli_error($db_connection));
		return $db_connection;

	}
?>
