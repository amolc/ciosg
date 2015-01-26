<?php

session_start();
include('sql_config/database/cio_db.php'); 
$array=array();
$userID=$_SESSION['vID'];
$res=mysql_query("SELECT item.item_name,item.item_ID,item.item_price,category.cat_name FROM item,shopping_cart,category WHERE item.item_ID=shopping_cart.itemID and category.catID=shopping_cart.catID and userID='$userID'")or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
	array_push($array,$row);
				
}
echo $_GET['callback'] . '(' .json_encode($array) . ')';
?>