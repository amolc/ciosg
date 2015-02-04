<?php

	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin'])){
		$admin = $_SESSION['admin'];
	}
	else {
		header('Location: index.php');
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>ciochoice.sg</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">

	<script src="include/resource/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
  
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
					<strong><a href="admin_all_pages.php">Pages</a></strong>
				</li>
				
				<li class="active">
					<strong>Create Page</strong>
				</li>
			</ol>

			<h2>Create Page</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Overview
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
						$page_title = mysql_real_escape_string($_POST['page_title']);
						  $Page_description = addslashes($_POST['Page_description']);
							
					
                                                $status = "pending";
					
							//current date
							$today_current_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$page_insert_date = date("m/d/Y", $today_current_date);

							$sql   = "insert into event_landing_page(page_title,page_desc,page_insert_date) values ('$page_title','$Page_description','$page_insert_date')";
							$query = mysql_query($sql);
							if($query)
							{
								
								echo'<script>window.location.replace("admin_event_pages.php?add=ok");</script>';	
								
							}
							else
							{
								echo "error";
							} 
				

					}
					else
					{
									
				?>
				
				<form   method="post" role="form" id="form1"   class="form-horizontal validate" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ;?>'>
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Page Title</label>

							<div class="col-sm-5">
								<input style="margin-left: 20px;" type="text" data-validate="required" data-message-required="This is  required field."  class="form-control" name="page_title" id="title" placeholder="Page Title" required>
							</div>
						</div>

		

						
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Page Description</label>
					
							<div class="col-sm-8" >
<!--                                                            <textarea   class="tour_overviews" name="Page_description" id="tour_overview" ></textarea>-->
							
                                                        <?php
                                                        include("plugin/fckeditor/fckeditor.php") ;

                                                          $oFCKeditor = new FCKeditor('Page_description') ;
                                                          $oFCKeditor->BasePath	= 'plugin/fckeditor/' ;
                                                          $oFCKeditor->Config["CustomConfigurationsPath"] = "plugin/fckeditor/fckconfig.js";
                                                          $oFCKeditor->ToolbarSet = 'Custom';

                                                          $oFCKeditor->Width  = '600' ;

                                                          $oFCKeditor->Height = '500' ;
                                                          $oFCKeditor->Value		= "<div></div>";
                                                          $oFCKeditor->Create() ;
                                                          ?>
                                                        </div>
		
						</div>
						

		
						
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