<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Dashboard</title>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="css/style_ie.css"/>
  <![endif]-->
   <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	 <script src="js/admin.js"></script>
	<script>
	function show_dashboard()
	{
		window.location = "cio_copy.php";
	}
	function logout()
	{
		setCookie("","",-1);
		window.location = "index.php";
	}
	

	
	</script>
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="clsWrapper">
		<div class="clsHeader navbar-fixed-top">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="col-md-4">
						<div class="clsLogo"><img src="images/logo.jpg"/></div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 pull-right">
								<div class="clsMenu_box">
									<nav class="navbar navbar-default clsMenu pull-right" role="navigation">
									  <div class="container-fluid">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
											  <span class="sr-only">Toggle navigation</span>
											  <span class="icon-bar"></span>
											  <span class="icon-bar"></span>
											  <span class="icon-bar"></span>
											</button>
										  </div>
										  <div id="navbar" class="navbar-collapse collapse">
										  <ul class="nav navbar-nav">
										 
											<li class="active"><a href="cio_copy.php">Dashboard</a></li>
											
											<!--<li><a href="#">Latest Review</a></li>
											<li><a href="#">Affiliates</a></li>-->
											<li><a href="javascript:void(0);" onClick="logout();">Logout</a></li>
											<!--<li><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-2x"></i></a></li>-->
										  </ul>
										</div><!-- /.navbar-collapse -->
									  </div><!-- /.container-fluid -->
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	<!--clsHeader-->
		
		