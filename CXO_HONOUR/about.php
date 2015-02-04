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
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 1 – Forming the CIO HONOUR Advisory Panel</h1>
									  </a>
									  <a class="list-group-item"><p>We invite Industry Leading CIOs and ICT Decision makers to join our independent advisory panel.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 2 – ICT Vendors register in categories</h1>
									  </a>
									  <a class="list-group-item"><p>Vendors are invited to register their Products, Services and Solutions into ICT categories. The categories cover a wide range of segments with the technolgy and communications sectors.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 3 – Online survey begins</h1>
									  </a>
									  <a class="list-group-item"><p>Over 700 CIOs across Singapore are invited to take part in our unbiased online survey. Voting consists of CIOs naming their preferred Vendors in selected segments and categories over the full technology landscape.</p></a>
									  
									 <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 4 – Validation by our Advisory Panel</h1>
									  </a>
									  <a class="list-group-item"><p>The independent advisory panel study and endorse the results of the survey to establish the CIO's Preferred choice within each category.</p></a>
									  
									  <a class="list-group-item" style="background:#5d5d5d;">
										<h1 style="color:white; margin:0px;"><span><img src="images/tab.png"/></span> Step 5 – Recognition and Award</h1>
									  </a>
									  <a class="list-group-item"><p>CIO HONOUR EVENTS bring together the leaders of the ICT community. Vendors are honoured in each category and presented with the title of CIO HONOUR. The awards come directly from CIOs, making the recognition a truly invaluable sales and marketing tool.</p></a>
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