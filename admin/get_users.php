<?php
 include('../sql_config/database/cio_db.php'); 
$array=array();

$cid=$_GET['cid'];
/*$res2=mysql_query("select item_ID,item_name from item where catID='$cid'")or die(mysql_error());
while($row2=mysql_fetch_assoc($res2))
{
	array_push($array,$row2);
				
}*/
$table="survey_".$cid;
$res=mysql_query("select userID,item.item_name,company_name from item,".$table." where ".$table.".itemID=item.item_ID")or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
	array_push($array,$row);
				
}
echo $_GET['callback'] . '(' .json_encode($array) . ')';
?>