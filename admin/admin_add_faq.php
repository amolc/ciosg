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
	<!--<script type="text/javascript" src="timepicker/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="timepicker/jquery.timepicker.css" />-->
	<!--<link rel="stylesheet" href="include/resource/css/easyWizardSteps.css"  id="style-resource-6">-->
	<style type="text/css">

		.submit { 
		display:none!important;
		}

		div.upload {
		margin-top: -10px;
		width: 157px;
		height: 57px;
		background: url(https://lh6.googleusercontent.com/-dqTIJRTqEAQ/UJaofTQm3hI/AAAAAAAABHo/w7ruR1SOIsA/s157/upload.png);
		overflow: hidden;
	}

	div.upload input {
		display: block !important;
		width: 157px !important;
		height: 57px !important;
		opacity: 0 !important;
		overflow: hidden !important;
	}
	.preview
	{
	width:200px;
	border:solid 1px #dedede;
	padding:10px;
	}
	#preview
	{
	color:#cc0000;
	font-size:12px
	}

	</style>


<script type="text/javascript">
$(document).ready(function(){
	/**
			* tour
			*@author:	developerdevday7@outlook.com
			*@date:	1 january 2014 2:22 PM GM+5
			*/

});
</script>
	<script>
	  // $(function() {
		// $('#defaultValueExample').timepicker({ 'scrollDefaultNow': true });
	  // });
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
					<strong><a href="admin_show_faq.php">FAQ</a></strong>
				</li>
				
				<li class="active">
					<strong>Create FAQ</strong>
				</li>
			</ol>

			<h2>Create FAQ</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Over View
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
						$faq_title = mysql_real_escape_string($_POST['faq_title']);
						$faq_description = addslashes($_POST['faq_description']);
							
						
					 
							//current date
							$today_current_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$insert_date = date("m/d/Y", $today_current_date);

							$sql   = "insert into faq(faq_heading,faq_description,insert_date) values ('$faq_title','$faq_description','$insert_date')";
							$query = mysql_query($sql);
							if($query)
							{ 
								
								echo'<script>window.location.replace("admin_show_faq.php?add=ok");</script>';	
								
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
							<label for="field-1" class="col-sm-3 control-label">Faq Title</label>
 
							<div class="col-sm-5">
								<input style="margin-left: 20px;" type="text" data-validate="required" data-message-required="This is  required field."  class="form-control" name="faq_title" id="title" placeholder="Page Title" required>
							</div>
						</div>

		

						
						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">Faq Description</label>
					
							<div class="form-group" style="width: 572px;margin-left: 272px;">
								
							 <?php
                                                        include("plugin/fckeditor/fckeditor.php") ;

                                                          $oFCKeditor = new FCKeditor('faq_description') ;
                                                          $oFCKeditor->BasePath	= 'plugin/fckeditor/' ;
                                                          $oFCKeditor->Config["CustomConfigurationsPath"] = "plugin/fckeditor/fckconfig.js";
                                                          $oFCKeditor->ToolbarSet = 'Custom';

                                                          $oFCKeditor->Width  = '600' ;

                                                          $oFCKeditor->Height = '500' ;
                                                          $oFCKeditor->Value		=  '<div></div>';
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


<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

	<div class="chat-inner">


		<h2 class="chat-header">
			<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
		</h2>


		<div class="chat-group" id="group-1">
			<strong>Favorites</strong>

			<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
			<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
		</div>


		<div class="chat-group" id="group-2">
			<strong>Work</strong>

			<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
			<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
		</div>


		<div class="chat-group" id="group-3">
			<strong>Social</strong>

			<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
		</div>

	</div>

	<!-- conversation template -->



	<div class="chat-conversation">

		<div class="conversation-header">
			<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

			<span class="user-status"></span>
			<span class="display-name"></span>
			<small></small>
		</div>

		<ul class="conversation-body">
		</ul>

		<div class="chat-textarea">
			<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
		</div>

	</div>

</div>


<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Art Ramadani</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>

	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>

	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul></div>



	
		<link rel="stylesheet" href="include/resource/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="include/resource/js/ckeditor/ckeditor.js" id="script-resource-9"></script>
	<script src="include/resource/js/ckeditor/adapters/jquery.js" id="script-resource-10"></script>
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