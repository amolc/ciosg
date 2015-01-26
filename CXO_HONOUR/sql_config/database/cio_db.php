<?php 
//connect to db
$con = mysql_connect('cio.fountaintechies.com
','ciochoice
', '10gXWOqeaf');
	//$con = mysql_connect('cio-choice-201408141000.ctseggpibot4.ap-southeast-1.rds.amazonaws.com','admin', 'H3ll0$c1o7#');
	if (!$con) {
    die("Connection failed: ");
}
	//$db	 = mysql_select_db('cio-choice_27march');
	 $db	 = mysql_select_db('cio_choice_db');
	// $web_url ="http://staging.cio-choice.sg";
	$web_url ="http://cio-choice.sg";
?>
