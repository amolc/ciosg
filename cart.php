<?php

session_start();
include('sql_config/database/cio_db.php'); 
$items=array();
$items=$_POST['item_array'];
$catID=$_POST['catID'];
$userID=$_SESSION['vID'];
$cnt=sizeof($items);
$rs='';
for($i=0;$i<$cnt;$i++)
{	
	$iid=$items[$i];
	$rs=mysql_query("INSERT INTO shopping_cart(itemID,catID,userID) values('$iid','$catID','$userID')")or die(mysql_error());
}

if($rs)
   echo"OK";
?>