<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
$id = $_REQUEST['id'];
mysql_query("delete from ict_vendor_landing where id = '$id'")or die(mysql_error());
header('Location: admin_ict_vendor_landing.php?del=ok');
	}
	else 
	{
		header('Location: index.php');
	}
 ?>
