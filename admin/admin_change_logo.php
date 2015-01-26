<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

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

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- TS1387507274: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body">

<div class="page-container">

<?php include('include/admin_side_menu/admin_side_menu.php'); ?>
	<div class="main-content">
<?php include('include/admin_header/admin_header.php'); ?>

			<ol class="breadcrumb bc-3">
				<li>
					<a href="admin_dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				
				<li class="active">
					<strong>Logo</strong>
				</li>
			</ol>

			<h2>Logo</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Country Information
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

				 include('../sql_config/database/cio_db.php'); 

			if($_POST['upload_button'] == "Submit"){
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))
				&& ($_FILES["file"]["size"] < 120000)
				&& in_array($extension, $allowedExts))
				  {
				  if ($_FILES["file"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					}
				  else
					{
					echo "Upload: " . $_FILES["file"]["name"] . "<br>";
					echo "Type: " . $_FILES["file"]["type"] . "<br>";
					echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

					if (file_exists("upload/" . $_FILES["file"]["name"]))
					  {
					  echo $_FILES["file"]["name"] . " already exists. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file"]["tmp_name"],
					  "upload/" . $_FILES["file"]["name"]);
					  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
					  }
					}
					///
					
					
				$logo_name = mysql_real_escape_string($_POST['logo_name']);
				// $image_url = mysql_real_escape_string($_POST['image_url']);
				$image_url = $_FILES["file"]["name"];

				$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
				$current_date = date("m/d/Y", $today_date);
				
				$result = mysql_query("SELECT logo_id FROM logo");
						$num_rows = mysql_num_rows($result);
						
						// print_r($num_rows);
						if ($num_rows > 0)
						{
							//echo "exist";
							$sql   = "UPDATE logo SET logo_name='".$logo_name."',logo_image='".$image_url."',logo_insert_date='".$current_date."'";
							
						}
						else
						{
							//echo "does not exist";
							$sql   = "insert into logo(logo_name,logo_image,logo_insert_date) values('".$logo_name."','".$image_url."','".$current_date."')";
							
						}
					// $sql   = "insert into logo(logo_name,logo_image,logo_insert_date) values('".$logo_name."','".$image_url."','".$current_date."')";
					
					// print_r($sql);
					$query = mysql_query($sql);
					 if($query){
						echo "Logo Change successful";
					}else {
						echo "error";
					}

					
					
					
				  }
				else
				  {
					echo "Invalid file";
				  }
			}
			
					$logo_query = mysql_query("select logo_name,logo_image from logo");
					while($logo_result = mysql_fetch_array($logo_query)) 
					{
						$display_logo_name = $logo_result['logo_name'];
						$display_logo = $logo_result['logo_image'];
						
					}
			

				?>


				<form role="form" action="<?php $_SERVER["PHP_SELF"];?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-groups-bordered">

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Logo Name</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="logo_name" value="<?php echo $display_logo_name;?>" placeholder="Logo Name" required>
						</div>
					</div>
							<div class="form-group">
						<label class="col-sm-3 control-label">Image Upload</label>
						
						<div class="col-sm-5">
							
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<img src="upload/<?php echo $display_logo;?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="file" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							
						</div>
					</div>
					
					<div style="display:none;" class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Logo Image</label>

						<div class="col-sm-5">
							<input type="file" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png" class="form-control" name="" id="field-1" placeholder="Logo Image" requireds>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<!--<button type="submit" class="btn btn-default">Submit</button>-->
							<input type="submit" name="upload_button" class="btn btn-default" value="Submit">
						</div>
					</div>
				</form>

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




	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/fileinput.js" id="script-resource-71"></script>
	<script src="include/resource/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>
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