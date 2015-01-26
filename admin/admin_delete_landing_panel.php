<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
$id = $_REQUEST['id'];
mysql_query("delete from landing_panel where landing_panel_id = '$id'")or die(mysql_error());
header('Location: admin_view_landing_panel.php?delete=ok'); 
	}
	else 
	{
		header('Location: index.php');
	}
 ?>
