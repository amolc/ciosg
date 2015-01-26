<?php 

	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin'])){
		$admin = $_SESSION['admin'];
	  if(isset($_GET['action']) && $_GET['action']=='remove'){
		$result = mysql_query("DELETE FROM  gallery_stuff WHERE id=".$_GET['id']);
		echo 'true';
	   }
		
	}
	else {
		header('Location: index.php');
	}
 ?>