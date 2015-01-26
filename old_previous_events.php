<?php

// $id = $_REQUEST['id'];
// $id = "1";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
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
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="overview_right fr">
                                                    <div class="events fl">
                                                      <h1>Previous Events</h1>
                                                        <?php 

                                                          $query = mysql_query("SELECT
                                                          `events`.event_id,
                                                          `events`.event_name,
                                                          `events`.event_image,
                                                          event_fb_images.event_fb_pic,
                                                          event_videos.event_video_code,
                                                          `events`.event_held_date,
                                                          `events`.event_description,
                                                          `events`.event_location,
                                                          `events`.event_map
                                                          FROM
                                                          `events`
                                                          INNER JOIN event_fb_images ON `events`.event_id = event_fb_images.event_id
                                                          INNER JOIN event_videos ON `events`.event_id = event_videos.event_id
                                                          GROUP BY `events`.event_id
                                                          ");

                                                          while($res = mysql_fetch_array($query))
                                                          {
                                                            $id = $res['event_id'];
                                                            $event_name = $res['event_name'];
                                                            $event_held_date = $res['event_held_date'];
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
                                                          <div class="event_list fl">
                                                            <div class="event_title fl">
                                                              <h1><?php echo $event_name; ?><br>
                                                                <?php echo $event_held_date; ?><br>
                                                              </h1>
                                                              <span class="fr map_span"><!--<img src="images/map.jpg" alt="" >--><?php echo $event_map; ?></span>
                                                              <p><?php echo $event_location; ?></p>

                                                            </div>
                                                            <div class="event_overview fl">
                                                              <h2>Event Overview</h2>
                                                              <p><?php echo $event_description; ?></p>
                                                              <h2>On Social...</h2>
                                                              <p><strong>Photographs from Facebook</strong></p>
                                                              <p>
                                                              <?php
                                                                $query1 = mysql_query("select * from event_fb_images where event_id='".$id."' LIMIT 4");
                                                                while($res1 = mysql_fetch_array($query1))
                                                                {

                                                                  $fb_image = $res1['event_fb_pic'];
                                                                  if (!empty($fb_image)) {

                                                                    echo ' <img src="admin/user_data/'.$fb_image.'" width="131" height="auto">';
                                                                  }
                                                                }
                                                              ?>
                                                              <?php
                                                                // echo $fb_image;
                                                                // foreach ($fb_image as $b) 
                                                                // {
                                                                // echo ' <img src="admin/user_data/'.$b.'" width="131" height="131">';
                                                                // }
                                                              ?>
                                                                <!--	<img src="admin/user_data/<?php //echo $fb_image ; ?>" width="131" height="131">-->
                                                              </p>

                                                              <p><strong>Twitter Hash Tag:<br>
                                                              #EventTitle<br>
                                                              <br>
                                                              YouTube Videos</strong></p>
<!--                                                              <p style="border-bottom:#999 solid 1px;">-->
                                                              <p>
                                                              <?php
                                                                $query2 = mysql_query("select * from event_videos where event_id='".$id."' LIMIT 2");
                                                                while($res2 = mysql_fetch_array($query2))
                                                                {

                                                                  $event_video_code = $res2['event_video_code'];
                                                                  if (!empty($event_video_code)) {
                                                                    echo '<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;">'.$event_video_code.'</span>';
                                                                  }

                                                                }
                                                              ?>
                                                              <!--	<span class="video_span" style="margin-right:4px; width:285px;height:161px; float:left;"><?php //echo $event_video_code; ?></span>-->
                                                              <!--	<span style="margin-right:0px; width:285px;height:161px; float:left;"><img style="margin-right:0px; float:left;" src="images/small_video.jpg" width="285" height="161"></span>-->
                                                              </p>
                                                        </div>
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
