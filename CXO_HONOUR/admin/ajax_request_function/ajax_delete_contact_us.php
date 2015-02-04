
<?php
include('../../sql_config/database/cio_db.php'); 

$contact_us_id = mysql_real_escape_string($_POST['contact_us_id']);
 //echo $registration_id;exit;
	$sql = mysql_query("DELETE from contact_us WHERE  contact_us_id = $contact_us_id"
	);

	if($sql)
	{
		echo "DELETE";
	}
	else {
		echo "error";
	}

?>