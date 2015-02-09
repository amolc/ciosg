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
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
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
		<div class="clsHeader">
			<?php include "header.php";
			include('sql_config/database/cio_db.php'); 
			?>	<!--clsTop_bar-->
			<div class="clsLogo_ban">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="row">
							<div class="col-md-12">
								<div class="clsLogo"><img src="images/logo.png"/></div>
							</div>
						</div>
						
						
									<?php
																$faq_result = mysql_query("SELECT
																						*
																						FROM
																						about where abt_type='overview'
																						");

																//fetch tha data from the database
																while ($faq_row = mysql_fetch_array($faq_result))
																{      ?>
                                               	 
                                                       <?php echo $faq_row['abt_description']; ?>
                                                   
                                                    <?php
                                                     } ?>
							
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
			</div>	<!--clsLogo_ban-->
		</div>	<!--clsHeader-->
		
		<div class="clsSlider">
			<div class="clsSlide_bar">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="clsTlt"><h1>CXO HONOUR step-by-step</h1></div>
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="clsCont_data">
									<div class="list-group">
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 1 – Forming the Advisory Council</h1>
									  </a>
									  <a class="list-group-item"><p>We invite Industry Leading CXOs to join our independent advisory council.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 2 – Vendors register for ICM categories</h1>
									  </a>
									  <a class="list-group-item"><p>Vendors are invited to register their Products, Services and Solutions for ICM categories. The categories cover a wide range of segments within the infocomm and media industry.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 3 – Online Poll</h1>
									  </a>
									  <a class="list-group-item"><p>CXOs across the various industry verticals are invited to participate in an Online Poll. The Online Poll requires the participants to endorse their preferred and most valued vendors for the specific ICM categories.</p></a>
									  
									 <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 4 – Validation & Endorsement by the Advisory Council</h1>
									  </a>
									  <a class="list-group-item"><p>The independent Advisory Council reviews and validates the results of the Online Poll to determine the winning vendors for the more popular ICM categories.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 5 – Recognition and Awards</h1>
									  </a>
									  <a class="list-group-item"><p>The CXO HONOUR AWARDS RECEPTION brings together the leaders of from across the ICM community to honour and celebrate the success with leading Vendors who have been given their Vote of Trust & Confidence by the CXO community.</p></a>
									</div>
									
									
								</div>
								
							</div>
							
							<div class="col-md-1"></div>
						</div>
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
			</div>	<!--clsTop_bar-->
		</div>	<!--clsSlider-->
		<?php include "footer.php"?>
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