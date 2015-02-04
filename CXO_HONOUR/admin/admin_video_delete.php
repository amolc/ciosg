<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
$id = $_REQUEST['id'];
mysql_query("delete from videos where video_id = '$id'")or die(mysql_error());
mysql_query("delete from videos_type where video_id = '$id'")or die(mysql_error());
mysql_query("delete from image_type where video_id = '$id'")or die(mysql_error());
header('Location: admin_all_video.php?del=ok');
	}
	else 
	{
		header('Location: index.php');
	}
 ?>
