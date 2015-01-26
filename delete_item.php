<?php

session_start();
include('sql_config/database/cio_db.php'); 

$item_id=$_GET['itemID'];
$userID=$_SESSION['vID'];

$result=mysql_query("DELETE FROM shopping_cart WHERE itemID='$item_id' and userID='$userID'")or die(mysql_error());
if($result)
{
	$res['response']="OK";
}
echo $_GET['callback'] . '(' .json_encode($res) . ')';




?>
