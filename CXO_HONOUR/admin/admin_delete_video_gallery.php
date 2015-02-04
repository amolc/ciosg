<?php

	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{
		$admin = $_SESSION['admin'];
		$id = $_REQUEST['id'];
	  mysql_query("DELETE FROM gallery WHERE gallery_id=$id") or die(mysql_error());
	  mysql_query("DELETE FROM gallery_stuff WHERE gallery_id=$id") or die(mysql_error());
		header('Location: admin_video_gallery.php?del');
		
	}
	else {
		header('Location: index.php');
	}
