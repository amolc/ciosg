<?php
	include('sql_config/database/cio_db.php'); 

   $q=$_GET['term'];
    $sql="SELECT name FROM parent_company WHERE name LIKE '%$q%' union select name from regional_company WHERE name LIKE '%$q%'";
    $result = mysql_query($sql)or die(mysql_error());

    $json=array();

    while($row = mysql_fetch_array($result)) {
      array_push($json, $row['name']);
    }

    echo json_encode($json);
  //echo $_GET['callback'] . '(' .json_encode($json) . ')';

?>
