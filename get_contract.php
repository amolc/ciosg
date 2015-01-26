<?php
 session_start();
include('sql_config/database/cio_db.php'); 
$array=array();
$userID=$_SESSION['vID'];
$query=mysql_query("select * from contract where vID='$userID' order by contract_id DESC");
while($row=mysql_fetch_assoc($query))
{
	
	array_push($array,$row);
	
}

echo $_GET['callback'] . '(' .json_encode($array) . ')';




?>