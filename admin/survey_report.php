<?php
 include('../sql_config/database/cio_db.php'); 
$array=array();

$itemID=$_GET['item_id'];
/*$res2=mysql_query("select item_ID,item_name from item where catID='$cid'")or die(mysql_error());
while($row2=mysql_fetch_assoc($res2))
{
	array_push($array,$row2);
				
}*/
$res=mysql_query("select company_name,count from survey_count where itemID='$itemID'")or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
	array_push($array,$row);
				
}
echo $_GET['callback'] . '(' .json_encode($array) . ')';
?>