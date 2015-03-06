<?php
 include('../sql_config/database/cio_db.php'); 
$array=array();

$cid=$_GET['cid'];
$userID=$_GET['userID'];

/*$res2=mysql_query("select item_ID,item_name from item where catID='$cid'")or die(mysql_error());
while($row2=mysql_fetch_assoc($res2))
{
	array_push($array,$row2);
				
}*/
$table="survey_".$cid;

$res=mysql_query("select itemID,company_name from ".$table." where userID='$userID'")or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
	array_push($array,$row);
				
}
echo $_GET['callback'] . '(' .json_encode($array2) . ')';
?>