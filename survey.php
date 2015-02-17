<?php
session_start();
include('sql_config/database/cio_db.php'); 
$survey=array();
$itemID=array();
$tag=array();
$new_company=array();

$itemID=$_POST['item_id'];
$catID=$_POST['catID'];

$survey=$_POST['survey_array'];
//$catID=$_POST['catID'];
$userID=$_SESSION['cID'];
$cnt=sizeof($survey);
$rs='';
$date=date("Y-m-d H:i:s"); 
$modified_date=date("Y-m-d"); 
for($i=0;$i<$cnt;$i++)
{	
	$company_name=serialize($survey[$i]);
	$iid=$itemID[$i];
	$tag = explode(",",$survey[$i]);
	$cnt2=sizeof($tag);
	for($j=0;$j<$cnt2;$j++)
	{
		$cname=$tag[$j];
		$query2=mysql_query("select name from parent_company where name='$cname'")or die(mysql_error());
		$query3=mysql_query("select name from regional_company where name='$cname'")or die(mysql_error());
		$n1=mysql_num_rows($query2);
		$n2=mysql_num_rows($query3);
		if(!$n1)
		{
			if(!$n2)
			{
				array_push($new_company,$cname);
				$rs=mysql_query("INSERT INTO parent_company(name) values('$cname')")or die(mysql_error());
			}
		}
	}
	$query=mysql_query("select surveyID from survey where itemID='$iid' and userID='$userID'");
	if(mysql_num_rows($query))
	{
		$rs=mysql_query("UPDATE survey_".$catID." SET company_name='$company_name',date_modified='$modified_date' WHERE itemID='$iid' and userID='$userID'")or die(mysql_error());
	
	}
	else
	{
		$rs=mysql_query("INSERT INTO survey_".$catID ."(userID,itemID,categoryID,company_name,date_created,date_modified) values('$userID','$iid','$catID','$company_name','$date','$modified_date')")or die(mysql_error());
	}
}

if($rs)
   echo"OK";
?>