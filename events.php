<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

	<script type="text/javascript">
    $(document).ready( function() {
	//alert('developer');
      $('#tab-container').easytabs();
    });
    </script>
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
                                            <div class="our_advisory_panel mrgn_top" style="height:auto;">
                                              <div class="overview_left fl">
                                                <div class="about fl">
                                                  <h1>Events</h1><?php 
                                              $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
											  $current_date = date("Y/m/d", $today_date);
											  $query = "SELECT * FROM `events`";
	                                            $q1 = mysql_query($query); 
	                                            while($res = mysql_fetch_array($q1)) { ?>
	                                              <a href="/eventdetails.php?event=<?php echo $res['event_id']; ?>" class="event"><?php echo $res['event_name']; ?></a></li>
	                                            <?php } ?>
                                                
                                                </div>
                                              </div>
                                               <?php
																$faq_result = mysql_query("SELECT
																						*
																						FROM
																						event_landing_page where page_title='THE CIO HONOUR COMMUNITY'
																						");

																//fetch tha data from the database
																while ($faq_row = mysql_fetch_array($faq_result))
																{      ?>
                                              <div class="overview_right fr">
                                                   <?php echo $faq_row['page_desc']; ?>
                                              </div>
                                              <?php } ?>
                                              <div style="clear:both"></div>
                                            </div>

                                        </div>
										   <?php

												//include('events_panel.php');
												include('quick_contact.php');
												include('footer.php');
											?>









    <!-- Google CDN jQuery with fallback to local -->
	<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
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
                                $("#content_8").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
			advanced:{
     		   updateOnContentResize:true
    			},


					theme:"dark-thick"
				});
			});
		})(jQuery);
	</script>

</body>
</html>
