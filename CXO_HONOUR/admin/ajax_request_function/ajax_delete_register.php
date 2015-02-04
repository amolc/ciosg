
<?php
include('../../sql_config/database/cio_db.php'); 

$registration_id = mysql_real_escape_string($_POST['registration_id']);
 //echo $registration_id;exit;
	$sql = mysql_query("DELETE from registration WHERE  registration_id = $registration_id"
	);
	// $sql2 = mysql_query("DELETE from tour_price WHERE  tour_id = $tour_id"
	// );
	// $sql3 = mysql_query("DELETE from tour_photo WHERE  tour_id = $tour_id"
	// );
	if($sql)
	{
		echo "DELETE";
	}
	else {
		echo "error";
	}

?>