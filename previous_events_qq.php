<?php

$id = $_REQUEST['id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

</head>

<body>
                            
                                        
                                        
                                   
                                        
                                   	<?php													
										include('sql_config/database/cio_db.php'); 
										include('top_header.php');
										include('header.php');
									?>
									
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="previous_events_main mrgn_top" style="height:auto;">
                                                  <div class="overview_left fl">
                                                  	<div class="about fl">
                                                    	<h1>Events</h1>
                                                        <a href="previous_events.html">Previous Events</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                               	    <div class="events fl">
													<h1>Previous Events</h1>
													<?php 
													include('sql_config/database/cio_db.php'); 
													$query = mysql_query("select * from events where event_id='".$id."'");
															while($res = mysql_fetch_array($query))
															{
															?>
                                                        	
                                                            <div class="event_title fl mrgn_top">
                                                           	  <h1>
															<?php 
															  
															  $name = $res['event_name'];
															if (strlen($name) > 21)
															{
															$stringCut = substr($name, 0, 20);
															$name = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
															}
															  
															  echo $name ?><br>
                                                                <?php echo $res['event_held_date']; ?><br>
                                                                 Location</h1>
                                                                <span style="width: 350px!important" class="fr map"><?php 
																if ($res['event_map'] != "")
																{
																echo $res['event_map'];
																}
																else
																{
																echo '<img src="" alt="No Map Available" width="390" height="125">';
																}
																 ?></span>
                                                                <p><?php echo $res['event_location']; ?></p>
                                                                
                                                            </div>
                                                   	  		<div class="event_overview fl">
                                                       	<h2>Event Overview</h2>
                                                        <p><?php echo $res['event_description']; ?></p>
                                                            <h2>On Social...</h2>
                                                        <p><strong>
                                                            Photographs from Facebook</strong></p>
                                                          <p>
                                                          	<img src="images/<?php echo $res['event_facebook']; ?>" width="131" height="131">
                                                            
                                                          </p>
                                                          
                                                          <p><strong><!-- Twitter Hash Tag:<br>
                                                              <php echo $res['event_twitter_hashtag']; ?><br>
                                                              <br>-->
                                                        YouTube Videos</strong></p>
                                                            <p style="border-bottom:#999 solid 1px;">
                                                          	<span><img style="margin-right:0px; float:left;" src="images/<?php echo $res['event_youtube_video']; ?>" width="285" height="161"></span>
                                                            
                                                          </p>
                                                        </div>
                                                        	<?php } ?> 
                                                      
                                                      </div>
                                               	  </div>
                                                  <div style="clear:both"></div>
                                                </div>
                                                
                                            </div>
                                            
                                             
                                            <?php 
												include('quick_contact.php');
											   
												include('footer.php');
											?>     
                                           
                                          


    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
