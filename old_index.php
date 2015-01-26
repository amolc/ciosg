<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ciochoice.sg</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<!-- Required CSS -->
	<link href="css/movingboxes.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
	<![endif]-->
	
	<!-- Required script -->
	<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
	<script src="js/jquery.movingboxes.js"></script>

<script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>

	<style>
		/* Dimensions set via css in MovingBoxes version 2.2.2+ */
		#slider { width: 750px;
				  height: 500px;
				}
		#slider li { width: 290px; }
	</style>

	<script>
	$(function(){

		$('#slider').movingBoxes({
			/* width and panelWidth options deprecated, but still work to keep the plugin backwards compatible
			width: 500,
			panelWidth: 0.5,
			*/
			startPanel   : 1,      // start with this panel
			wrap         : false,  // if true, the panel will infinitely loop
			buildNav     : true,   // if true, navigation links will be added
			navFormatter : function(){ return "&#9679;"; } // function which returns the navigation text for each panel
		});

	});
	</script>
</head>

<body>
                                    
                                        		<?php
														include('top_header.php');
														include('sql_config/database/cio_db.php'); 
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
											<div id="advisory_wrapper">
												<div style="" id="wrapper">
													<!-- MovingBoxes Slider -->
													<ul id="slider">

														<li>
															<img src="images/1.jpg" alt="picture">
															<h2>News Heading </h2>
															<p>Add a short exerpt here... <a href="http://flickr.com/photos/justbcuz/112479862/">more</a></p>
														</li>

														<li>
															<img src="images/2.jpg" alt="picture">
															<h2>News Heading</h2>
															<p>Add a short exerpt here... <a href="http://flickr.com/photos/joshuacraig/2698975899/">more</a> and a whole lot more text goes here, so we can see the height adjust.</p>
														</li>

														<li>
															<img src="images/3.jpg" alt="picture">
															<h2>News Heading</h2>
															<p>Add a short exerpt here... <a href="http://flickr.com/photos/ruudvanleeuwen/468309897/">more</a></p>
														</li>


													</ul><!-- end Slider #1 -->
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
