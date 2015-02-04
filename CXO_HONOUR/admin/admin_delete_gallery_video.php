<?php

	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
		$admin = $_SESSION['admin'];
		$id = $_REQUEST['id'];
		$pid = $_REQUEST['pid'];
	  mysql_query("DELETE FROM gallery_videos WHERE video_id=$id") or die(mysql_error());
	 
		header('Location: admin_gallery_videos.php?del=ok&id='.$pid);
		
	}
	else {
		header('Location: index.php');
	}
