<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
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
                                                    	<h1>Enter</h1>
                                                        <a href="enter.php">Enter Now</a>
                                                        <a href="cio_choice_process.php">CIO CHOICE Process</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                               	    <div class="choice_overview fl">
	
															<h1> Enter Now </h1>
                                                            <h1 style="color:#c5ac35; text-transform:lowercase;">Welcome to the CIO CHOICE entry page</h1>
                                                            
                                                      <p>If you are an ICT Vendor we would like to invite you to register your Product, Service ot solution in the relevant ICT category. The categories are part of the ICT segments - hardware, software & services across the various ICT domains - business apps, infra, security, mobility, big data, analytics, ectc.</p>
                                                      
                                                      <p style="font-size:18px; font-weight:bold;">Are you interested in the only unbiased recognition from industry leaders in Singapore? Enter now...</p>
                                                      
                                                      <div class="enter">
<h5>ICT Vendor Application Forms</h5>
<a href="#" class="pdf">Download the ICT Vendor Application form</a>
</div>
                                                    </div>
                                                    <div class="fl" style=" width:672px; text-align:center; margin:20px 0px"><img src="images/star_pic.jpg" width="342" height="11"></div>
                                                    <div class="choice_overview fl">
	
													  <h1>want to know more?</h1>
                                                      <h2>The CIO CHOICE Process</h2>
													  <p style="text-align:left;">If you are an ICT Vendor we would like to invite you to register your Product, Service ot solution in the relevant ICT category. The categories are part of the ICT segments - hardware, software & services across the various ICT domains - business apps, infra, security, mobility, big data, analytics, ectc.</p>
                                                      
                                                     <a href="previous_event_detail.php?id=23" class="event_ancher">read more</a>
                                                    </div>
                                               	  </div>
                                                  <div style="clear:both"></div>
                                                </div>
                                                
                                            </div>
                                        
                                           <?php 
										   
												include('events_panel.php');                                             
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
