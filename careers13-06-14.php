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
                                                    	<h1></h1>
                                                        <a href="careers.php">Careers</a>
                                                        <a href="privacy_policy.php">Privacy Policy</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                               	    <div class="choice_overview fl" style="width:658px;">
                                                        	<!--<h1>Testimonials</h1>
                                                            <div class="testimonials fl">
                                                            	<span><img src="images/essar_logo.jpg" width="120" height="120"></span>
                                                                <h2>Mr. C.N.Ram </h2>
                                                                <h3>Group Chief Information Officer, Essar Group (INDIA)</h3>
                                                                <p>This initiative is a very interesting departure from regular CIO events and seeks to honor the partners who make CIOs very successful. This is a very strong endorsement from CIO community that helps them market their products.</p>
                                                            </div>
                                                            <div class="testimonials fl">
                                                            	<span><img src="images/cipla_logo.jpg" width="120" height="120"></span>
                                                                <h2>Mr. Arun Gupta</h2>
                                                                <h3>CIO, Cipla Ltd. (INDIA)</h3>
                                                                <p>I firmly believe vendors would benefit from participation in CIO Choice, because it gives them a platform to get endorsed from CIO community.</p>
                                                            </div>
                                                            <div class="testimonials fl">
                                                            	<span><img src="images/bcoc_logo.jpg" width="120" height="120"></span>
                                                                <h2>Mr. Vikas Gadre </h2>
                                                                <h3>Executive Director, Bombay Chamber Of Commerce and Industry (INDIA)
</h3>
                                                                <p>A one of a kind, great platform that the CIOs have experienced till date to vote for products, solutions and services and more importantly a place where vendors can be endorsed and recognized.</p>
                                                            </div>
                                                            <div class="testimonials fl">
                                                            	<span><img src="images/kpmg_logo.jpg" width="120" height="120"></span>
                                                                <h2>Mr. Kunal Pande </h2>
                                                                <h3>Partner, IT Advisory Management Consulting, KPMG (INDIA) </h3>
                                                                <p>It�s a pleasure to be associated with CIO CHOICE, a novel step ahead wherein the CIO community through a pan India survey to choose their preferred solution/vendor of �choice�. This platform enhances both vendor understanding of CIO requirements and CIOs knowing industry choices thereby changing relationship from customer Vendor to a partnership.</p>
                                                            </div>-->
															
															<h1 style="width:610px !important;"> Careers </h1>
															<p style="text-align:left;">We are a young & very vibrant organization that believes in employee empowerment & equal opportunity at work. We are always in lookout for enthusiastic professionals who are keen to take up end to end job responsibility and believe in the merit of performance. </p>
														
															<p style="text-align:left;">If you think you can positively contribute in the growth of the organization we will be looking forward to hear from you.</p>
															
                                                            <p style="text-align:left; margin-bottom:200px;">Kindly mail your resume and presentation on your contribution ideas to				
<a style="color:red;" href="mailto:contactus@cio-choice.sg">contactus@cio-choice.sg </a>.</p>
															
                                                           
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
			});
		})(jQuery);
	</script>

</body>
</html>
