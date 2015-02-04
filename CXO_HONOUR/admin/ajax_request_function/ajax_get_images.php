<?php
include('cio_db.php');

$res = mysql_query("select * from advisory_panel") or die(mysql_error());
$row = mysql_fetch_assoc($res);
return $row;

?>