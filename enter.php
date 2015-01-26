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
                                                    	<h1>Enter</h1>
                                                        <a href="enter.php">Enter Now</a>
                                                        <a href="cio_choice_process.php">CIO CHOICE Process</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                                             <?php
																$enter_result = mysql_query("SELECT
																						*
																						FROM
																						enter_page where enter_type='enter'
																						");

																//fetch tha data from the database
															 $enter_row = mysql_fetch_array($enter_result)
															   ?>

                                                   <div class="choice_overview fl">
                                                  	<h1> <?php echo $enter_row['enter_heading']; ?> </h1>
                                                    </div>
                                                      <?php echo $enter_row['enter_description']; ?>
                                                      
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
