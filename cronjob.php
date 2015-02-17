<?php
include('sql_config/database/cio_db.php'); 
$date=date("Y-m-d"); 
$today=date("Y-m-d H:i:s"); 
$tag=array();
$result=mysql_query("select catID from category ");
$count=mysql_num_rows($result);
for($j=1;$j<=$count;$j++)
{

	$query=mysql_query("select * from survey_".$j." where date_modified='$date'");
	$n=mysql_num_rows($query);
	if($n)
	{
		
		while($row=mysql_fetch_array($query))
		{
			$catID=$row['categoryID'];
			$itemID=$row['itemID'];
			$company=unserialize($row['company_name']);
			$tag = explode(",",$company);
			
			$cnt=sizeof($tag);
			for($i=0;$i<$cnt-1;$i++)
			{
				$cname=$tag[$i];
				
				$query1=mysql_query("select counterID from survey_count where categoryID='$catID' and itemID='$itemID' and company_name='$cname'") or die(mysql_error());
				$n2=mysql_num_rows($query1);
				if($n2)
				{
					$res1=mysql_query("update survey_count set count=count+1,date_modified='$today' where categoryID='$catID' and itemID='$itemID' and company_name='$cname' ")or die(mysql_error());
				}
				else
				{
					$res2=mysql_query("insert into survey_count (categoryID,itemID,company_name,count,date_modified) values('$catID','$itemID','$cname','1','$today')") or die(mysql_error());
				}	
			}
		}
		
	}
}
	
