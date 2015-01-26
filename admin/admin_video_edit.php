<?php
include('../sql_config/database/cio_db.php'); 
 $id = $_REQUEST['id'];
 $res = mysql_query("select * from videos  where video_id = '$id'")or die (mysql_error());
 $row = mysql_fetch_array($res);

 if(empty($row)){
 	header('Location: admin_all_video.php?empty=ok');
 }
 $sql_videos_type = mysql_query("SELECT * FROM videos_type WHERE video_id = '$id' ");

 

/**
*smagic39@gmail.com
**/
function checkVideoType($fileName,$path){
 $allowedExts = array("mp4", 'webm', 'ogv');
$extension = pathinfo($fileName['name'], PATHINFO_EXTENSION);
$message = '';

$valid_formats = array("jpg", "png", "gif", "bmp");
list($txt, $ext) = explode(".", $fileName['name']);

if ((($fileName["type"] == "video/mp4") || ($fileName["type"] == "video/webm") || ($fileName["type"] == "video/ogg")  && in_array($extension, $allowedExts)))
{

    if ($fileName["error"] > 0)
    {
        $message .= "Return Code: " . $fileName["error"] . "<br />";
    } else
    {
        $message .= "Upload: " . $fileName["name"] . "<br />";
        $message .= "Type: " . $fileName["type"] . "<br />";
        $message .= "Size: " . ($fileName["size"] / 1024) . " Kb<br />";
        $message .= "Temp file: " . $fileName["tmp_name"] . "<br />";

        if (file_exists($path . $fileName["name"]))
        {
        	
            $fileData = pathinfo(basename($fileName["name"]));
            $fileExName = uniqid() . '.' . $fileData['extension'];
            $target_path = $path . $fileExName;
            move_uploaded_file($fileName["tmp_name"], $target_path);
            $message .= "Stored in: " . $target_path;
        } else
        {

            $fileData = pathinfo(basename($fileName["name"]));
            $fileExName = uniqid() . '.' . $fileData['extension'];
            $target_path = $path . $fileExName;
            move_uploaded_file($fileName["tmp_name"], $target_path);
            $message .="Stored in: " . $path . $fileName["name"];
        }
    }

} elseif(in_array($ext,$valid_formats)){
      
            $fileData = pathinfo(basename($fileName["name"]));
            $fileExName = uniqid() . '.' . $fileData['extension'];
            $target_path = $path . $fileExName; 
            move_uploaded_file($fileName["tmp_name"], $target_path);
            $message .= "Stored in: " . $target_path;
}else
{
    $message .="Invalid file";
}

$data = array(
    'path' => $target_path,
    'message' => $message
);

return $data;

}

?>
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
	<link rel="stylesheet" href="../video-js.css" >
	<script src="../video.js"></script>

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
					<strong> Carousel Slides</strong>
				</li>
			</ol>

			<h2>Carousel Slides</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					Carousel Slides Edit
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
                            
                           
                                        $path1 ='';
                                        $path2 ='';
                                        $path3 ='';
                                        $path4 ='';
                                        if(!empty($_FILES['video_webm']['name'])){
                                                     $path1 = checkVideoType($_FILES['video_webm'],'tmp/');                                     
                                        }
                                        if(!empty($_FILES['video_mp4']['name'])){
                                        $path2 = checkVideoType($_FILES['video_mp4'],'tmp/');}
                                        if(!empty($_FILES['video_ogv']['name'])){
                                        $path3 = checkVideoType($_FILES['video_ogv'],'tmp/');                                        
                                        }
                                        if(!empty($_FILES['img_video']['name'])){
					$path4 = checkVideoType($_FILES['img_video'],'tmp/');

                                        }	$video_name = mysql_real_escape_string($_POST['video_name']);
                                                $eventOrder = mysql_real_escape_string($_POST['eventOrder']);
						$today_current_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
						$video_insert_date = date("m/d/Y", $today_current_date);
						$page_name = mysql_real_escape_string($_POST['path_name']);
						$sql   = "UPDATE videos SET video_name='".$video_name."',video_insert_date='".$video_insert_date."',path='".$page_name."',ordernum='".$eventOrder."' WHERE video_id = '$id'";
						$query = mysql_query($sql);
						$video_tmp = mysql_query("select * from videos_type  where video_id = '$id'")or die (mysql_error());
						$image_tmp = mysql_query("select * from image_type  where video_id = '$id'")or die (mysql_error());
						$image_row = mysql_fetch_array($image_tmp);
						$video_type_array = array();
 						while($video_row = mysql_fetch_array($video_tmp)){
 							$ext = explode('.', $video_row['path']);
 							if($ext[1] =='ogv'){$video_type_array['id3'] = $video_row['id']; }
 							if($ext[1] =='mp4'){$video_type_array['id2'] = $video_row['id']; }
 							if($ext[1] =='webm'){$video_type_array['id1'] = $video_row['id']; }

 						}
						if($query)
						{
							if(!empty($path1)){
							$sql_type1   = "UPDATE videos_type SET path='".$path1['path']."' WHERE video_id = '$id' and id='".$video_type_array['id1']."'";
						    $query_type[] = mysql_query($sql_type1);
                                                        }if(!empty($path2)){
						    $sql_type2   = "UPDATE videos_type SET path='".$path2['path']."' WHERE video_id = '$id' and id='".$video_type_array['id2']."'";
						    $query_type[] = mysql_query($sql_type2);
                                                    }if(!empty($path3)){
						    $sql_type3  = "UPDATE videos_type SET path='".$path3['path']."' WHERE video_id = '$id' and id='".$video_type_array['id3']."'";
						    $query_type[] = mysql_query($sql_type3);
                                                    }if(!empty($path4)){
						      $sql_type3  = "UPDATE image_type SET path='".$path4['path']."' WHERE video_id = '$id' and id='".$image_row['id']."'";
						      $query_type[] = mysql_query($sql_type3);
                                                    }
							$status_query = true; 
							
						}
						header('Location: admin_all_video.php?edit=ok');
								
				}

				?>


                            <form role="form" action="<?php $_SERVER["PHP_SELF"];?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-groups-bordered" onsubmit="return callvalidate();">

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Video Name</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="video_name" placeholder="Logo Name" value="<?php echo $row['video_name']; ?>">
						</div>
					</div>
				    <div class="form-group">
						<label class="col-sm-3 control-label">Video Upload</label>
						<div class="col-sm-5">
							<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="300" height="200"
							data-setup="{}">
								<?php 
								while( $row_tmp =  mysql_fetch_array($sql_videos_type)):

								$video = $row_tmp['path'];
								$ext = explode('.', $row_tmp['path']);
								if($ext[1] =='ogv'){$type  = "video/ogg"; }
								if($ext[1] =='mp4'){$type  = "video/mp4"; }
								if($ext[1] =='webm'){$type  = "video/webm"; }
								?>
							<source src="<?php echo $video; ?>" type='<?php echo $type; ?>' />
								<?php   endwhile;    ?>
							</video>
							<br/>
                                                       
						    <label for="video_webm">Webm</label>
						    <input type="file" id="video_webm" name="video_webm"  accept="video/webm">
						    <label for="video_mp4">Mp4</label>
						    <input type="file" id="video_mp4" name="video_mp4" accept="video/mp4">
						    <label for="video_mp4">Ogv</label>
						    <input type="file" id="video_ogv" name="video_ogv" accept="video/ogg">
						    <label for="img_video">Image Upload</label>
						    <input type="file" id="img_video" name="img_video">
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">Link Redirect of Image</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-path" name="path_name" value="<?php echo $row['path'];?>" placeholder="Link Redirect of Image" required>
					   </div>
					</div>
                                        
                                    	<div class="form-group">
					<label class="col-sm-3 control-label">Order</label>
						<div class="col-sm-5">
                                                    <select name="eventOrder" class="form-control" id="eventOrder" required>
                                                        <option value="0">Select the Order</option>
                                                        <?php
                                                       
                                                        $tvideo = mysql_query("select * from videos")or die (mysql_error());
                                                         $tvideo = mysql_num_rows($tvideo);
                                                         for($i=1;$i<= $tvideo; $i++ )
                                                         {
                                                             $select ='';
                                                            if($row['ordernum'] == $i)
                                                            {
                                                               $select='selected="selected"';  
                                                            }
                                                        ?>
                                                        <option value="<?php echo $i; ?>"  <?php echo $select;  ?>><?php echo $i; ?></option>
                                                         <?php } ?>
                                                    </select>
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
                    
                    
                    function callvalidate()
                    {
                        var ordernum = $('#eventOrder').val();
                    if(ordernum == 0 ){
                     $('#eventOrder').css({"border":"2px solid #FF5555"});   
                     return false ; }
                    }
	</script>

</body>
</html>