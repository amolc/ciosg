<?php
 session_start();
  // include('../include/database/db.php'); 
if(isset($_SESSION['username']) && isset($_SESSION['ict'])){
	$name = $_SESSION['user_name'];
	$type = $_SESSION['cio'];
}
else {
	header('Location: login.php');
}
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>




</head>

<body>
                                   	<?php
													include('sql_config/database/cio_db.php'); 
														include('top_header.php');
														
													?>
                                        
                                        
                                        <div id="shadow_wrapper"></div>
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                               <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                               <div class="landing_head" style="margin-top:0px;">
													<p><img src="images/Landing_logo.jpg" width="240" height="238"></p>
                                                    <h1>Hi</h1>
                                                    <h2><?php echo $name; ?><strong style="color:#20201f;">,</strong> </h2>
                                                    <h3>Welcome to CIO CHOICE <span>SINGAPORE</span></h3>
                                                </div>
                                        	</div>
                                            <div id="cio_area">
                                            	<div class="landing_head" style="margin-top:0px;height:50px;">
                                                	<div class="cio_area_head fl">
                                                    	<div class="cio_area fl">
                                                        	<h6><img src="images/world_icon.jpg" width="43" height="38">   THE ICT VENDOR area</h6>
                                                        </div>
                                                        
                                                        <div class="logout fr">
                                                        	<a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <div class="contact_details_2 fl">
                                                  	<a href="ict_vendor_landing.php">NOTICES</a>
                                                    <a href="#" class="active">ENTER NOW</a>
                                                  </div>
                                                  <div class="online_voting_main fl">
                                                  	  <div class="overview_right fl">
                                               	    <div class="choice_overview fl">
	
															<h1> Enter Now </h1>
                                                            <h1 style="color:#c5ac35; text-transform:none;">Welcome to the CIO CHOICE entry page</h1>
                                                            
                                                      <p style="margin:0px 0px 20px 20px;">If you are an ICT Vendor we would like to invite you to register your Product, Service or solution in the relevant ICT category. The categories are part of the ICT segments - hardware, software &amp; services, across the various ICT domains - business apps, infra, security, mobility, big data, analytics, etc.</p>
                                                      
                                                      <p style="font-size:18px; font-weight:bold; margin:0px 0px 20px 20px;">Are you interested in the only unbiased recognition from industry leaders in Singapore? Enter now...</p>
                                                      
                                                      <div class="enter">
<h5>ICT Vendor Application Forms</h5>
<a href="CIO-CHOICE-RF-Full v1.1 (Writable).rar" class="pdf">Download the ICT Vendor Application form</a>
</div>
                                                    </div>
                                                    <div class="fl" style=" width:672px; text-align:center; margin:20px 0px"><img src="images/star_pic.jpg" width="342" height="11"></div>
                                                    <div class="choice_overview fl">
	
													  <h1>want to know more?</h1>
                                                      <h2>The CIO CHOICE Process</h2>
													  <p style="text-align:left;">Your Products, Service and Solutions will be presented in an online survery to more than 700 CIOs. The survey is conducted across Singapore and then further validated by the <a href="#"><strong>CIO CHOICE independent Advisory Panel.</strong></a><br>
<br>
The result of <a href="#"><strong>the process conducted</strong></a> with CIOs and ICT Decision makers is to recognise the leaders in each cateogry and crown them the CIO’s preferred choice.</p>
                                                      
                                                     <div class="readmore fl"><a href="/cio_choice_process.php" class="read_more">read more</a></div>
                                                     
                                                     <h2>our Community</h2>
													  <p style="text-align:left;">The CIO CHOICE community aims to connect people to share ideas and establish a strong network of CIOs and ICT vendors within the Singapore area.</p>
                                                      
                                                     <div class="readmore fl"><a href="/cio_choice_community.php" class="read_more">read more</a></div>
                                                     
                                                     <h2>CIO CHOICE Partners</h2>
													  <p style="text-align:left;">We are always looking to partner with like-minded companies and professionals wishing to focus on enterprise and innovation within ICT. If you believe there is opportunity to extend the CIO CHOICE family, drop us an email to <a href="mailto:partners@cio-choice.sg"><strong>partners@cio-choice.sg</strong></a></p>
                                                      
                                                     <div class="become_partner mrgn fl">
                                                	<a class="partner" href="/contact_us.php">BECOME A PARTNER</a>
                                                	</div>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                               	  </div>
                                                  </div>
                                                  <div style="clear:both;"></div>
                                              </div>
                                              <div style="clear:both;"></div>
                                        	</div>
                                            
                                            
                                          <?php   include('quick_contact.php');
                                                    include('footer.php');
                                              ?>    



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script>



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

<script>
$("#accordion > li").click(function(){
  $("#accordion li").removeClass("active");
        $(this).addClass("active");
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

$('#accordion > ul:eq(0)').show();

</script>

</body>
</html>
