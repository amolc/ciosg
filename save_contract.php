<?php
include('sql_config/database/cio_db.php'); 
$cname=$_POST['cname'];
$add1=$_POST['add1'];
$add2=$_POST['add2'];
$city=$_POST['city'];
$country=$_POST['country'];
$website=$_POST['website'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$contact_name=$_POST['contact_name'];
$phone_number=$_POST['phone_number'];


$query=mysql_query("insert into contract (company_name,city,country,emailID,website,designation,address1,address2,contact_name,phone_number) values('$cname','$add1','$add2','$city','$country','$website','$email','$designation','$contact_name','$phone_number')")or die(mysql_error());
if($query)
	echo "OK";
	
?>
