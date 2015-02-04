<?php

	session_start();
	include('../sql_config/database/cio_db.php');
	if(isset($_SESSION['admin'])){
		$admin = $_SESSION['admin'];
		
		$result = mysql_query("SELECT * FROM enter_page where enter_type='category' ");
		$row = mysql_fetch_array($result);

	}
	else {
		header('Location: index.php');
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tourbooking.co" />
	<meta name="author" content="Laborator.co" />

	<title>ciochoice.sg</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">
	<script src="include/resource/js/jquery-1.10.2.min.js"></script>
   

<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	ashish.scripter@gmail.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/

});
</script>

</head>



<body class="page-body">

<div class="page-container">

<?php include('include/admin_side_menu/admin_side_menu.php'); ?>
	<div class="main-content">
<?php include('include/admin_header/admin_header.php'); ?>

			<ol class="breadcrumb bc-3">
				<li>
					<a href="dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				<li class="">
					<strong><a href="admin_cio_choice_category.php">Category</a></strong>
				</li>

				
			</ol>

			<h2>Edit Category</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Update Cio-Choice Category
				</div>

				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>


			<div class="panel-body">

				<?php
					if($_POST['submit'] == 'submit')
					{

						 $enter_description = addslashes ($_POST['enter_description']);
						 $heading = mysql_real_escape_string($_POST['heading']);

                        $sql   = "Update enter_page SET
						   enter_description = '$enter_description', enter_heading = '$heading'
							where enter_type = 'category'
							";
							$query = mysql_query($sql) or die (mysql_error());
							if($query)
							{
								echo'<script>window.location.replace("admin_cio_choice_category.php?edit=ok");</script>';

							}
							else
							{
								echo "error";
							}


					}
					else
					{

				?>

				<form   method="post" role="form" id="form1"   class="form-horizontal validate"  action='<?php echo $_SERVER['PHP_SELF'] ;?>'>

                         <div class="form-group" style="margin-left: -135px;margin-right: 35px;float: left;margin-top: -10px;">
							<label for="field-ta" class="col-sm-3 control-label" style="margin-left: 50px;">Heading</label>

							<div class="form-group" style="width: 572px;margin-left: 272px;">

                           <input style="margin-left: 20px;" type="text" data-validate="required" data-message-required="This is  required field." class="form-control" name="heading" id="heading" value="<?php echo $row['enter_heading']; ?>">

                            </div>

						</div>

                 <div class="form-group" style="margin-left: -135px;margin-right: 35px;float: left;margin-top: -10px;">
							<label for="field-ta" class="col-sm-3 control-label" style="margin-left: 50px;">Page Description</label>

							<div class="form-group" style="width: 572px;margin-left: 272px;">
<!--								<textarea style="width:600px;height:140px;" class="form-control overview" name="enter_description" id="enter_description" required><?php //echo $row['enter_description']; ?></textarea>-->
                                                           <?php
                                                                include("plugin/fckeditor/fckeditor.php") ;

                                                                            $oFCKeditor = new FCKeditor('enter_description') ;
                                                                            $oFCKeditor->BasePath	= 'plugin/fckeditor/' ;
                                                                            $oFCKeditor->Config["CustomConfigurationsPath"] = "plugin/fckeditor/fckconfig.js";
                                                                            $oFCKeditor->ToolbarSet = 'Custom';    
                                                                            $oFCKeditor->Width  = '800' ;
                                                                           

                                                                            $oFCKeditor->Height = '500' ;
                                                                            $oFCKeditor->Value		= $row['enter_description'];
                                                                            $oFCKeditor->Create() ;
                                                                            ?>
                                                                  
                            </div>

						</div>



						<input type="hidden" name="id" value="<?php echo $id; ?>"/>
						<span style="padding-left: 450px;font-size: 14px;" class="success_mesg"></span>
						<input style="margin-left: 750px;margin-top: 10px;" type="submit" name="submit" value="submit" class="btn btn-info ok" />


				</form>
<?php
}


?>
			</div>

		</div>

	</div>
</div>

<?php include('include/admin_footer/admin_footer.php'); ?>


</div>


</div>

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>	
	<script src="include/resource/js/neon-chat.js" id="script-resource-11"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-12"></script>
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-13"></script>

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>

					
</body>
</html>