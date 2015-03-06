<?php 
session_start();
$cid=$_GET['cid'];
include('sql_config/database/cio_db.php'); 
$array=array();
while($row=mysql_fetch_array($query))
{
	$catID=$row['catID'];
	$result=mysql_query("select item.item_name,survey_count.count from survey_count,item where categoryID='$catID' and item.item_ID=survey_count.itemID order by count desc limit 3 ") or die			(mysql_error());
	while($row = mysql_fetch_assoc($result)) {
    array_push($array, $row);
    }
}
echo $_GET['callback'] . '(' .json_encode($array) . ')';

?>


