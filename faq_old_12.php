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
                                        
                                        
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
										
                                    <div id="gray_wrapper"><h1 class="contact_heading">Get in Touch!</h1></div>    
               <div id="contact_form">				
				<div class="faq_box_container">
					<div class="tab_menu col-lg-12 col-md-12 col-sm-12">
						<div class="nav_item inactive">
							<a href="contact_us.html"><img src="images/contact_active.png" width="80%" alt=""/></a>
						</div>
						<div class="nav_item" style="margin-left:-50px;"> 
							<a href="faq.html"><img src="images/faq_inactive.png" alt=""/></a>
						</div>
					</div>
					<div class="clear"></div>
					<div id="faq_box" class="col-lg-12 col-md-12 col-sm-12">
						<div class="faq_box_container">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								<br/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								<br/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="question">1. Question?</div>
								<div class="answer">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								</div>
								<p></p><p></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="question">2. Question?</div>
								<div class="answer">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								</div>
								<p></p><p></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="question">3. Question?</div>
								<div class="answer">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								</div>
								<p></p><p></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="question">4. Question?</div>
								<div class="answer">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								</div>
								<p></p><p></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="question">5. Question?</div>
								<div class="answer">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
								</div>
								<p></p><p></p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
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
		$(document).ready(function(){
				$(".question").click(function(){
					$(this).next().toggle();
				});
			});
	</script>

</body>
</html>
