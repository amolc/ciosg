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
		<div class="clsHeader">
				<?php include('header.php');?>
			<div class="clsLogo_ban">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="row">
							<div class="col-md-12">
								<div class="clsLogo"><img src="images/logo.png"/></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="clsData_cont">
									<div class="clsTlt"><h1>Contact Us</h1></div>
									<div class="row">
										<div class="col-md-8">
											<div class="clsForm">
												<div class="row">
													<div class="col-xs-6" style="margin-bottom:15px;">
														<input type="text" class="form-control " placeholder="First Name">
													</div>
																 
													<div class="col-xs-6" style="margin-bottom:15px;">
														<input type="text" class="form-control " placeholder="Last Name">
													</div>
																  
													<div class="col-xs-12" style="margin-bottom:15px;">
														<input type="text" class="form-control " placeholder="Email Address">
													</div>
																  
													<div class="col-xs-12" style="margin-bottom:15px;">
														<textarea type="text" class="form-control " placeholder="Message"></textarea>
													</div>
													<div class="col-xs-12" style="margin-bottom:5px;">
														<button class="btn_edit_dr btn btn-danger btn-lg col-xs-12" type="submit">Submit</button>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="well" style="background:white">
												<div class="clsCont_data" style="padding:0px;">
													<div class="cls_img" style="text-align:center;"><img src="images/abt_ico4.png" width="90px;"/></div>
													<div class="clsLine"></div>
													<h1>Address</h1>
													<p>
														<b>CXO Honour Headquaters</b><br/>
														100 Cecil Street, #10-01<br/>
														The Globe, Singapore 069532<br/>
													</p>
													<div class="clsLine"></div>
													<p>
														<b>CIO Honour</b><br/>
														Graha BIP, 7th Floor<br/>
														Jl. Gatot Subroto Kav 23 Jakarta 12930,<br/> Indonesia
													</p>
												</div>	<!--clsCont_data-->
											</div>
										</div>
										
										
									</div>	<!--clsCxo_logo_cont-->
									
								</div>	<!--clsData_cont-->
							</div>
						</div>
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
			</div>	<!--clsLogo_ban-->
		</div>	<!--clsHeader-->
		
		
		<?php include("footer.php")?>
		
		
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