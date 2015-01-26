<?php

// $id = $_REQUEST['id'];
// $id = "1";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.css">
<style type="text/css">
  .active{
    background: none !important;
  }
</style>

<style type="text/css">
.video_span iframe{
	width:285px!important;
	height:161px!important;
}  
.map_span > div{
	width:390px!important;
	height:125px!important;
}
.map_span iframe{
	width:390px!important;
	height:125px!important;
}
</style>
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
                                                       <a href="previous_events.php">Previous Events</a>
                                                        <a href="upcoming_events.php">Upcoming Events</a>
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="overview_right fr">
                                                    <div class="events fl">
                                                      <h1>Previous Events</h1>
                                                      
                                                      <?php 
													  //echo "qasim";
													  $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
													  $current_date = date("Y/m/d", $today_date);

                                                        $query = "SELECT
                                                        *
                                                        FROM
                                                        `events` where event_held_date < '$current_date'
                                                        
                                                        ";
                                                       
                                                      	 //INNER JOIN event_videos ON `events`.event_id = event_videos.event_id
                                                       
                                                        $q1 = mysql_query($query); 
                                                        
                                                        while($res = mysql_fetch_array($q1))
                                                        {
                                                     
                                                          $id = $res['event_id'];
                                                          $event_name = $res['event_name'];
                                                          $event_held_date = $res['event_held_date'];
														  $event_held_time = $res['event_held_time'];
                                                          $event_image = $res['event_image'];
                                                          $event_location = $res['event_location'];
                                                          $event_description = $res['event_description'];
                                                          $event_map = $res['event_map'];
                                                          $event_facebook = $res['event_facebook'];
                                                          $event_twitter_hashtag = $res['event_twitter_hashtag'];
                                                          $event_youtube_video = $res['event_youtube_video'];
                                                          // $event_video_code .= $res['event_video_code'];
                                                          // $fb_image .= $res['event_fb_pic'];
                                                         
                                                        

                                                      ?>

                                                        	<div class="event_title fl">
                                                            <h1><?php echo $event_name; ?>
																								
															</h1>
                                                              
															  <br />
                                                            <span class="fr map_span"><!--<img src="images/map.jpg" alt="" >--><?php echo $event_map; ?></span>
                                                            <p>
															  <strong> <?php echo date('d F Y', strtotime($event_held_date)); ?>&nbsp;&nbsp;&nbsp; <?php echo $event_held_time?> </strong>
																<br /> <br />
															  <strong><?php echo $event_address1."<br />".$event_address2."<br />".$event_city."<br />".$event_country."<br />".$event_pincode; ?></strong></p>

                                                          </div>
                                                          <div class="event_overview fl">
                                                            <h2>Event Overview</h2>
                                                            <p><?php echo $event_description; ?></p>
                                                            <h2>On Social...</h2>
                                                            <p><strong>Photographs from Facebook</strong></p>
                                                            <p>
                                                            <div class="facebook_scroll owl-carousel" style="clear: both;" >
                                                           
                                                            <?php
                                                              $query1 = mysql_query("select * from event_fb_images where event_id='".$id."' LIMIT 1000");
                                                              while($res1 = mysql_fetch_array($query1))
                                                              {
                                                                  $fb_image = $res1['event_fb_pic'];
                                                                   if (!empty($fb_image)) {
                                                                ?>
                                                           
                                                                  
                                                                    <div><a href="admin/user_data/<?php echo $fb_image ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img src="admin/user_data/<?php echo $fb_image ; ?>" alt="" width="131" height="auto"/></a></div>
                                                                
                                                                
                                                             
                                                                


                                                             <?php   
                                                               
                                                                }
                                                              }
                                                            ?>
                                                     
                                                           
                                                              </div>
                                                            </p>

                                                            
                                                            <br>
                                                            
                                                            
                                                            <?php
															
                                                              $query2 = mysql_query("select * from event_videos where event_id='".$id."' LIMIT 1");
                                                              // while($res2 = mysql_fetch_array($query2))
                                                              // {

                                                                // $event_video_code = $res2['event_video_code'];
                                                                // if (!empty($event_video_code)) {
																// if($i==0){
																// echo '<p><strong>YouTube Videos</strong></p>';
                                                                 // }
																 // echo '<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;">'.$event_video_code.'</span>';
                                                                // }
                                                                // $i++;
                                                              // }
															  
																$res2 = mysql_fetch_array($query2);                                                            
                                                               $event_video_code1 = $res2['event_video_code1'];
                                                               $event_video_code2 = $res2['event_video_code2'];
                                                                if ($event_video_code1 !="" || $event_video_code2 !="") {																
																echo '<p><strong>YouTube Videos</strong></p>';                                                                 
																 echo '<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;">'.$event_video_code1.'</span>';
																 echo '<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;">'.$event_video_code2.'</span>';
                                                                }
 														  
                                                            ?>
                                                            <!--	<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;"><?php //echo $event_video_code; ?></span>-->
                                                            <!--	<span style="margin-right:0px; width:285px;height:161px; float:left;"><img style="margin-right:0px; float:left;" src="images/small_video.jpg" width="285" height="161"></span>-->
                                                            <br /> <p style="border-bottom:#999 solid 1px;margin-top: 10px;"></p>
                                                      </div>
                                                       <?php
                                                      }
                                                      ?>
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
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

	<script type="text/javascript">
		(function($){
        $(".facebook_scroll a[rel^='prettyPhoto']").prettyPhoto();
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
        $(".facebook_scroll a[rel^='prettyPhoto']").prettyPhoto({
          social_tools: ''
        });
$(".facebook_scroll").owlCarousel({autoPlay:true,items:4});

		})(jQuery);
	</script>

</body>
</html>
