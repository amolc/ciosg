<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
$id = $_POST['image_id'];
mysql_query("delete from event_fb_images where event_fb_id = '$id'")or die(mysql_error());
echo "OK";
//header('Location: admin_edit_event.php?id='.$id.'');
	}
	else 
	{
		echo "NOTOK";
		//header('Location: index.php');
	}
 ?>
