<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ciochoice.sg</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<!-- Required CSS -->

	<!--[if lt IE 9]>
	<link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
	<![endif]-->
	
	<!-- Required script -->
	<!-- <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="slider_style.css">
	
	<script type="text/javascript" src="js/jcarousellite.js"></script>-->
	<script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>


<link href="css/content_slider_style.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.content_slider.min.js" type="text/javascript"></script>
<?php
include('sql_config/database/cio_db.php'); 
													$advisory_query = mysql_query("select * from advisory_panel");
													// $pic_name[]="";
													// while($advisory_res = mysql_fetch_array($advisory_query))
													// {
														// $advisory_image = $advisory_res['advisory_image'];
														// $advisory_name = $advisory_res['advisory_name'];
														// $advisory_description = $advisory_res['advisory_description'];
													
											
													// }	
													$data1 = "";
													$data = array();
													while ($row = mysql_fetch_assoc($advisory_query)) {
														// Generate the output in desired format
														// $data = array(
															// 'image' => $row['advisory_image']
														// );
														$data1 = $row['advisory_image'];
														// echo '<img src="admin/upload/'.$data1.'" alt="" />';
													}

													// $json_data = json_encode($data);
													// print_r($data1);
													// echo $data;
													// echo $json_data;
													// file_put_contents('your_json_file.json', $json_data);
													
												?>
<script type="text/javascript">
	(function($){
		$(document).ready(function() {


			var image_array = new Array();
			// var d =""+'<?php echo $json_data; ?>'+"";
			// var d ='<?php echo $json_data; ?>';
			// image_array = '<?php echo json_encode($data);?>';
			// $.ajax({
        // url: "ajax_request_function/ajax_get_images.php",
        // type: "POST",
        // dataType: 'json',
        // data: JSON.stringify(arr),
        // success: function(response){}
			// alert(response);
       // });
			image_array = [
				{image: 'admin/upload/<?php echo $data1 ;?>'},
				{image: 'admin/upload/<?php echo $data1 ;?>'},
				{image: 'admin/upload/<?php echo $data1 ;?>'}
				
			];
		
		
			// image_array = [{image:'admin/upload/<?php echo $data1 ;?>'}];
			// alert(image_array);
			/*image_array = [
				{image: 'content/our_team/1.jpg', link_url: 'content/our_team/1big.jpg', link_rel: 'prettyPhoto'},
					// image for the first layer, goes with the text from id="sw0"
				{image: 'content/our_team/2.jpg', link_url: 'content/our_team/2big.jpg', link_rel: 'prettyPhoto'},
					// image for the second layer, goes with the text from id="sw1"
				{image: 'content/our_team/3.jpg', link_url: 'content/our_team/3big.jpg', link_rel: 'prettyPhoto'},
					// image for the third layer, goes with the text from id="sw2"
				{image: 'content/our_team/4.jpg', link_url: 'content/our_team/4big.jpg', link_rel: 'prettyPhoto'},
					// ...
				{image: 'content/our_team/5.jpg', link_url: 'content/our_team/5big.jpg', link_rel: 'prettyPhoto'},
				{image: 'content/our_team/6.jpg', link_url: 'content/our_team/6big.jpg', link_rel: 'prettyPhoto'},
				{image: 'content/our_team/7.jpg', link_url: 'content/our_team/7big.jpg', link_rel: 'prettyPhoto'}
			];*/
			$('#slider1').content_slider({		// bind plugin to div id="slider1"
				map : image_array,				// pointer to the image map
				max_shown_items: 7,				// number of visible circles
				hv_switch: 0,					// 0 = horizontal slider, 1 = vertical
				active_item: 0,					// layer that will be shown at start, 0=first, 1=second... circular: false,
				wrapper_text_max_height: 450,	// height of widget, displayed in pixels
				middle_click: 1,				// when main circle is clicked: 1 = slider will go to the previous layer/circle, 2 = to the next
				under_600_max_height: 1200,		// if resolution is below 600 px, set max height of content
				border_radius:	-1,				// -1 = circle, 0 and other = radius
				automatic_height_resize: 1,
				border_on_off: 0,
				allow_shadow: 0
			});
		});
	})(jQuery);
</script>


</head>

<body>
                                    
                                        		<?php
														include('top_header.php');
														
														include('header.php');
													?>
                                                                        
                                        <div id="black_wrapper">
                                            <div class="black_container">
											<?php include('navigation.php'); ?>
                                               
                                                    <div class="video fl">
														<?php
														
															$video_query = mysql_query("select * from videos");
															while($video_res = mysql_fetch_array($video_query))
															{
																$video = $video_res['video_embed_code'];
															}
															// echo $video;
														?>
														
														<div id="myElement">Loading the player...</div>

														<script type="text/javascript">
															jwplayer("myElement").setup({
																file: "admin/upload/<?php echo $video; ?>",
																  height: 415,
																width: 737,
																image: "/upload/myPoster.jpg"
															});
														</script>
                                                       <!-- <img src="images/video.jpg" width="737" height="415">-->
                                                    </div>
                                            </div>
                                        </div>
										<div style="padding-top:50px;height: 560px;" id="advisory_wrapper">
										
												<div class="content_slider_wrapper" id="slider1">
												<?php
													$advisory_query1 = mysql_query("select * from advisory_panel");
													$counter=0;
													while($advisory_res = mysql_fetch_array($advisory_query1))
													{
														$advisory_image = $advisory_res['advisory_image'];
														$advisory_name = $advisory_res['advisory_name'];
														$advisory_desination = $advisory_res['advisory_desination'];
														$advisory_description = $advisory_res['advisory_description'];
													
											$counter++;
													
												?>
													<div class="circle_slider_text_wrapper" id="sw<?php echo $counter;?>" style="display: none;">
													<!-- content for the first layer, id="sw0" -->
														<div class="content_slider_text_block_wrap">
														<!-- "content_slider_text_block_wrap" is a div class for custom content -->
															<h3><?php echo $advisory_name ; ?></h3><br /><br />
															
															<span><span class="bold">Position: </span><?php echo $advisory_description ; ?></span><br />
															<span style="display:none;"><span class="bold">E-mail: </span><a href="#"><?php echo $advisory_name ; ?></a></span><br /><br />
															<span><span class="bold">Description: </span><?php echo $advisory_description ; ?></span><br /><br /><br />
															<a href="#" class="button_socials button_hover_effect fb" data-hovercolor="#496dba" data-hoveroutcolor="#3b5a9a"></a><!-- button_socials button_hover_effect -->
															<a href="#" class="button_socials button_hover_effect tw" data-hovercolor="#4bb8e7" data-hoveroutcolor="#23aae1"></a><!-- button_socials button_hover_effect -->
															<a href="#" class="button_socials button_hover_effect pin" data-hovercolor="#de343d" data-hoveroutcolor="#cc2129"></a><!-- button_socials button_hover_effect -->
															<a href="#" class="button_socials button_hover_effect yt" data-hovercolor="#fd0013" data-hoveroutcolor="#bb000e"></a><!-- button_socials button_hover_effect -->
														</div>
														<div class="clear"></div>	
													</div>
													<?php
												
														}
													?>



												</div>
																							
												
											
															
														
												
												</div>
                                            </div>
                                            <div style="display:none;" id="advisory_wrapper">
                                                <div class="our_advisory_panel">
                                                  <h1>Our Advisory Panel</h1>
                                                    <span><img src="images/alice_abigail.jpg" alt="" width="863" height="298"></span>
                                                  <h2>Alice Abigail</h2>
                                                  <p>Ms Alice Abigail, an Information Technology Head of Department with over 20 years<br>
                                                  of regional experience in leading and managing a team of IT managers and executives in IT goal setting, initiatives and support for the organization Find out more</p>
                                                        
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                                <?php include('events_panel.php'); ?>
                                              
                                           
                                            <?php   include('quick_contact.php');
                                                    include('footer.php');
                                              ?>                                   
                                            

 

    <!-- Google CDN jQuery with fallback to local 
	<script type="text/javascript" src="js/jquery.min.js"></script>-->
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$("#content_6").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
				$("#content_7").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
			});
		})(jQuery);
	</script>

</body>
</html>
