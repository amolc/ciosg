<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>CXO HONOUR</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="css/style_ie.css"/>
  <![endif]-->
   <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="clsWrapper">
	<? include "header.php"?>
		
		<div class="clsSlider" id="news">
			<div class="clsSlide_bar">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="clsTlt"><h1>News </h1></div>
						<div class="row">
							<div class="col-md-12">
								<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators edt_crs_ind2">
										<li data-target="#carousel-example-generic3" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic3" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic3" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active">
											<div class="row">
												<div class="col-md-3">
													<div class="clsImg"><img class="img-circle" alt="" src="images/1.jpg" class="img-responsive" width="250px;"/></div>
												</div>
												<div class="col-md-9">
													<div class="clsCont_data">
														<h1>Glen Francis </h1>
														<p>
															Glen Francis is the Vice President, Head of Group IT (CIO) for Global Logistic  Properties (GLP). He is responsible for Technology across the group’s global  operations. GLP is listed on the Singapore Exchange, Oct 2010. Glen has helped GLP establish necessary technology
														</p>
														<p><b>Read More!</b></p>
													</div>	<!--clsCont_data-->
												</div>	
											</div>		
										</div>

										<div class="item">
											<div class="row">
												<div class="col-md-3">
													<div class="clsImg"><img class="img-circle" alt="" src="images/2.jpg" class="img-responsive" width="250px;"/></div>
												</div>
												<div class="col-md-9">
													<div class="clsCont_data">
														<h1>Alvin Ong </h1>
														<p>
															Chief Information Officer for Alexandra Health System & Khoo Teck Puat  Hospital Integrated Health Information Systems (IHiS) Mr Alvin Ong is  Integrated Health Information Systems’ (IHiS) Chief Information Officer for the  Alexandra Health System cluster. IHiS, a
														</p>
														<p><b>Read More!</b></p>
													</div>	<!--clsCont_data-->
												</div>	
											</div>		
										</div>
										
										<div class="item">
											<div class="row">
												<div class="col-md-3">
													<div class="clsImg"><img class="img-circle" alt="" src="images/1.jpg" class="img-responsive" width="250px;"/></div>
												</div>
												<div class="col-md-9">
													<div class="clsCont_data">
														<h1>Alice Abigail Tan </h1>
														<p>
															Ms Alice Abigail, an Information Technology Head of Department with over 20  years of regional experience in leading and managing a team of IT managers  and executives in IT goal setting, initiatives and support for the organization.  Business focused, dynamic, authentic and
														</p>
														<p><b>Read More!</b></p>
													</div>	<!--clsCont_data-->
												</div>	
											</div>		
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
			</div>	<!--clsTop_bar-->
		</div>	<!--clsSlider-->
		
		<div class="clsFooter">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<div class="clsFut_menu">
								<ul>
									  <h1><span><img src="images/tab.png"/></span> Site Map</h1>	
									  <li>
									<?php
									include('sql_config/cio_db.php'); 

													//quick contact
													$quick_contact_query = mysql_query("select * from quick_contact");
													while($quick_contact_res = mysql_fetch_array($quick_contact_query))
													{
														$quick_contact_map = $quick_contact_res['quick_contact_map'];
													}
												?> 
                                                    	
														<?php echo $quick_contact_map; ?>
										</li>
									</ul>
								</div>	
							</div>
							
							
							
							<div class="col-xs-3 col-sm-3">
								<div class="clsFut_menu">
									<ul>
									  <h1><span><img src="images/tab.png"/></span> Links</h1>	
									  <li><a href="">Home</a></li>
									  <li><a href="">Privacy Policy</a></li>
									  <li><a href="">Terms and Conditions</a></li>
									  <li></li>
									  <li><button class="btn_edit_wr btn btn-warning btn-lg" type="submit">GET IN TOUCH</button></li>
									</ul>
								</div>				
							</div>
							
							<div class="col-xs-3 col-sm-3">
								<div class="clsFut_menu">
									<ul>	
									  <li><img src="images/logo2.png" width="250px;"/></li>
									</ul>
								</div>				
							</div>
						</div>
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
		</div>
		
		<div class="clsCopyright">
			<p>Copyright © 2014 CXO HONOUR Singapore. All Rights Reserved.</p>
		</div>
	</div>	<!--clsWrapper-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/carousel.js"></script>
	
	<!-- latest jQuery, Boostrap JS and hover dropdown plugin -->
	<script src="js/twitter-bootstrap-hover-dropdown.js"></script>
	<script>
		// very simple to use!
		$(document).ready(function() {
		  $('.js-activated').dropdownHover().dropdown();
		});
	</script>
  </body>
</html>