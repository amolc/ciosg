<?php 
	$str=$_GET["id"];
	// echo $str;
	$status="accepted";
	//$str="".$str."";
	$con = mysql_connect('localhost','ciochoice', '10gXWOqeaf');
	
	 $db	 = mysql_select_db('cio_choice_db');
	 
	$sql = "UPDATE user_vendor SET registration_status='accepted' WHERE confirm_id='$str'";
	
	   
	$query = mysql_query($sql,$con);
	
	
	if($query)
	{
		//echo "executed";
	}
	else{
	//echo "Not executed";
	}
		

?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>cio-choice.sg</title>
		<link rel="icon" type="image/png" href="http://www.cxohonour.com/cxo_fav_ico.png">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
		<script>
		function redirect(){
		  window.location = "http://www.cxohonour.com/vendor_login.php";
		}
		</script>
		
    </head>

    <body onLoad="redirect()">
	
	</body>
</html>
