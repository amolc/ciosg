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
                                                    	<h1>About</h1>
                                                        <a href="cio_choice_overview.php">CIO CHOICE Overview</a>
                                                        <a href="cio_choice_community.php">The Community</a>
                                                        <a href="testimonials.php">Testimonials</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                               	    <div class="choice_overview fl">
                                                        	<h1>cio choice overview</h1>
															<p>CIO CHOICE is a B2B platform that enables the industry leading CIOs to share and  exchange their success with their ICT vendors within their peer networks and the community at large. The platform truly promotes the "Voice of the CIO" to select and honour Products, Services and Solutions; recognising the ICT vendors for their outstanding commitment to service quality and professionalism in the 'local' context to repeatedly deliver successful outcomes.</p>
                                                            <!--<p>CIO CHOICE is a <strong>B2B platform</strong> that recognizes unites the leading <strong>CIOs</strong> and <strong>ICT Vendors</strong> in Singapore. The community promotes innovation and enterprise, bringing together experts from across key technology and communication sectors.<br>
<br>
Distinguished CIOs & ICT decision makers select and honor Products, Services and Solutions, with the winner declared the <strong>CIOs' preferred choice. </strong></p>-->
                                                        </div>
                                                    <div class="network fl">
                                                        	<div class="learn fl">
                                                       	  		<img src="images/learn.jpg" width="136" height="136"> 
                                                                <span>LEARN</span>
                                                            </div>
                                                            <div class="learn fl">
                                                       	  		<img src="images/network.jpg" width="136" height="136"> 
                                                                <span>Network</span>
                                                            </div>
                                                        <div class="learn fl mrgn">
                                                       	  		<img src="images/achieve.jpg" width="136" height="136"> 
                                                                <span>Achieve</span>
                                                      </div>

                                                    </div>
                                                    <div class="fl"><img src="images/CIOCHOICE-columntemplate_17.jpg" width="672" height="145"></div>
                                                    <div class="fl" style=" width:672px; text-align:center; margin:40px 0px"><img src="images/star_pic.jpg" width="342" height="11"></div>
                                                    <div class="step_by_step_mian fl">
                                                    	<div class="step_by_step fl">
                                                        	<h1>
                                                            <img src="images/top_icon.jpg" width="104" height="108"><br>
                                                            CIO CHOICE step-by-step
                                                            </h1>
                                                        </div>
                                                        <div class="step_1 fl">
                                                        	<h2>Step 1</h2>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                        </div>
                                                        <div class="step_1 fl">
                                                        	<h2>Step 2</h2>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                        </div>
                                                        <div class="step_1 fl">
                                                        	<h2>Step 3</h2>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                        </div>
                                                        <div class="step_1 fl">
                                                        	<h2>Step 4</h2>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                        </div>
                                                        <div class="step_1 fl">
                                                        	<h2>Step 5</h2>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                                        </div>
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
