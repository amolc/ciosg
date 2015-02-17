<?php
session_start();
include('sql_config/database/cio_db.php'); 
$tag_values=array();
$new_company=array();
$tag_values=$_POST['company'];
$cnt=sizeof($tag_values);
$rs='';
for($i=0;$i<=$cnt;$i++)
{	
	$cname=$tag_values[$i];
	$company_name = trim($cname,",");
	$query=mysql_query("select name from parent_company where name='$company_name'")or die(mysql_error());
	$n=mysql_num_rows($query);
	if(!$n)
	{
		array_push($new_company,$company_name);
		$rs=mysql_query("INSERT INTO parent_company(name) values('$company_name')")or die(mysql_error());
	}
	
}
 echo"OK";
?>