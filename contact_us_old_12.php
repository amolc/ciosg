<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cio Choice</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">	
		<link href="css/sevs.css" rel="stylesheet" type="text/css">		
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
			<?php													
				include('sql_config/database/cio_db.php'); 
				include('top_header.php');
				include('header.php');
			?>
			
			
		<div id="gray_wrapper"></div>
			<div id="black_wrapper">
				<div class="inner_nav">
					 <?php include('navigation.php'); ?>
				</div>
			</div>						
			<div id="gray_wrapper"><h1 class="contact_heading">Get in Touch!</h1></div>
			<div id="contact_form">				
				<div class="contact_box_container">
					<div class="tab_menu col-lg-12 col-md-12 col-sm-12">
						<div class="nav_item">
							<a href="contact_us.html"><img src="images/contact_active.png" alt=""/></a>
						</div>
						<div class="nav_item inactive">
							<a href="faq.html"><img src="images/faq_inactive.png" width="80%" alt=""/></a>
						</div>
					</div>
					<div class="clear"></div>
					<div id="contact_box" class="col-lg-12 col-md-12 col-sm-12">
						<section class="col-lg-3 col-md-3 col-sm-3 box_sidebar">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
							<br/>
							<p><b>Telephone:</b></p> 
							<br/>
							<p>+65 9668 2895</p> 
							<br/>		  
							<b>Address:</b>
							<br/> 
							<p>100 Cecil Street,<br/> #10-01 The Globe,<br/> Singapore 069532</p> 
						</section>
						<section class="col-lg-8 col-md-8 col-sm-8 box_content">
							<div class="col-lg-12 col-md-12 col-sm-12 input">
								<div class="col-lg-4 col-md-4 col-sm-4">First Name:</div>
								<div class="col-lg-8 col-md-8 col-sm-8"><input type="text" class="text_field"/></div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 input">
								<div class="col-lg-4 col-md-4 col-sm-4">Last Name:</div>
								<div class="col-lg-8 col-md-8 col-sm-8"><input type="text" class="text_field"/></div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 input">
								<div class="col-lg-4 col-md-4 col-sm-4">Email Address:</div>
								<div class=".col-lg-8 col-md-8 col-sm-8"><input type="text" class="text_field"/></div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 input">
								<div class="col-lg-4 col-md-4 col-sm-4">I'm a</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<select class="dropdown_field">
										<option>ICT Vendor</option>
										<option>CIO</option>
										<option>Partner</option>
										<option>Other</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								Your Message:
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 input">
								<textarea class="textarea_field"></textarea>
							</div>
							<a href="#" class="fr submit_btn">
								<img src="../images/submit.png"/>
							</a>
						</section>
					</div>
					<div class="clear"></div>
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
