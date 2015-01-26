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
															<br/> <br/>
															
                                                            <h2>Welcome to the CIO CHOICE entry page</h2>
                                                            
                                                      <p style="text-align:left;">If you are an ICT Vendor we would like to invite you to register your Product, Service or Solution into any of our ICT categories. The categories are divided by segments across key technolgy and communications sectors. </p>

<h2>The CIO CHOICE Process</h2>
															
<p style="text-align:left;">Your Products, Service and Solutions will be presented in an online survery to more than 700 CIOs. The survey is conducted across Singapore and then further validated by the CIO CHOICE independent Advisory Panel.</p>
 
<p style="text-align:left;">The result of the process conducted with CIOs and ICT Decision makers is to recognise the leaders in each cateogry and crown them the CIO’s preferred choice.</p>

<p style="text-align:left; font-size:18px; font-weight:bold;">Are you interested in the only unbiased recognition from industry leaders in Singapore?</p>

<div class="enter">
<a href="#" class="pdf">ICT Vendor Application Forms</a>
<a href="#" class="pdf">Download the ICT Vendor Application form</a>
</div>

<h2>Join our Community of Leading CIOs</h2>

<p style="text-align:left">The CIO CHOICE community aims to connect people to share ideas and establish a strong network of CIOs and ICT vendors within the Singapore area.</p>

<h2><a href="#">Find out more</a></h2>

<h2>Become a Partner</h2>

<p style="text-align:left;">We are always looking to partner with like-minded companies and professionals wishing to focus on enterprise and innovation within ICT. If you believe there is opportunity to extend the CIO CHOICE family, drop us a call or an email to <a href="mailto:partners@cio-choice.sg">partners@cio-choice.sg</a></p>
                                                         
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
