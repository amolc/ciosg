<?php

	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin'])){
		$admin = $_SESSION['admin'];
		$id = $_REQUEST['id'];
	 mysql_query("DELETE FROM faq WHERE faq_id=$id") or die(mysql_error());
		header('Location: admin_show_faq.php?del');
		
	}
	else {
		header('Location: index.php');
	}
