<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{

	}
	else 
	{
		header('Location: index.php');
	}
	$sql4 = mysql_query('SELECT * FROM landing_page_content WHERE tab="tab4"');
	$row4 = mysql_num_rows($sql4);
	$data4 =  mysql_fetch_array($sql4);
	$content_4 = ($row4 >0 ) ? $data4['content'] : '';
	if(isset($_POST['submit-tab4'])){
		$content = $_POST['content'];
		
		if($row4 > 0){
			mysql_query("UPDATE landing_page_content SET content='$content' WHERE tab='tab4' ");
		}else{
			echo $row;
			mysql_query("INSERT INTO  landing_page_content(tab,content) VALUES('tab4','$content') ");
			
		}
		header('Location:'.$PHP_SELF);
	}
	// tab3
	$sql3 = mysql_query('SELECT * FROM landing_page_content WHERE tab="tab3"');
	$row3 = mysql_num_rows($sql3);
	$data3 =  mysql_fetch_array($sql3);
	$content_3 = ($row3 >0 ) ? $data3['content'] : '';
	if(isset($_POST['submit-tab3'])){
		$content = $_POST['content'];
		
		if($row3 > 0){
			mysql_query("UPDATE landing_page_content SET content='$content' WHERE tab='tab3' ");
		}else{
			echo $row;
			mysql_query("INSERT INTO  landing_page_content(tab,content) VALUES('tab3','$content') ");
			
		}
		header('Location:'.$PHP_SELF);
		
	}

 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    </head>
    <body>
        <!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="vendor/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    toolbar: "undo redo | styleselect | bold italic | link image | hr" 
 });
</script>

<!-- Place this in the body of the page content -->
<h1>T & Cs</h1>
<form method="post" name="tab4" action="<?php echo $PHP_SELF;?>">
    <textarea name="content"><?php echo $content_4  ?></textarea>
    <input type="submit" name="submit-tab4" value="Submit">
</form>
<hr>
<br>
<br>
<!-- Place this in the body of the page content -->
<h1>PARTICIPATION FEES  </h1>
<form method="post" name="tab3" action="<?php echo $PHP_SELF;?>">
    <textarea name="content"><?php echo $content_3  ?></textarea>
    <input type="submit" name="submit-tab3" value="Submit">
</form>
    </body>
</html>