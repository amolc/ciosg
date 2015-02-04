<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
$id = $_REQUEST['id'];
mysql_query("delete from advisory_panel where advisory_id = '$id'")or die(mysql_error());
header('Location: admin_all_advisory_panel.php?del=ok');
	}
	else 
	{ 
		header('Location: index.php');
	}
 ?>
