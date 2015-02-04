<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Login</title>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="gl_font/opensans.css?family=Open+Sans:400,700&amp;subset=latin-ext,latin">
	<link rel="stylesheet" href="gl_font/opensans2.css?family=Open+Sans:400,300,700|Roboto:300,400&amp;subset=latin-ext,latin">
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="css/style_ie.css"/>
  <![endif]-->
   <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	 <script src="js/validation.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  <script>
	function check_login()
	{
		var username=document.getElementById('username').value;
		var password=document.getElementById('password').value;
			
		
		$.getJSON('http://www.globalprompt.org/sg/cio/ceo/login/?callback=?',"username="+username+"&password="+password+"",function(res){
	
	
	
	if(res.Error)
	{
		document.getElementById('loginmsg').innerHTML = res.Error ;  
		$('#loginmsg').show().delay(3000).hide(0);
	}
	if(res.Success == 'Success')
	{
		window.location = "cio_copy.php";
	}
});
  
}
</script>
  
  
  
  </head>
  <body>
    <div class="clsWrapper">
		<div class="clsHeader navbar-fixed-top">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="col-md-12">
						<div class="clsLogo" style="text-align:center;"><img src="images/logo_cio.png" /></div>
					</div>
				</div>
			</div>
		</div>	<!--clsHeader-->
		
		

				<div class="container-fluid">
					<div class="clsIn_cont" style="padding-top:150px;">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="clsData_cont">
											<div class="clsTlt">
												<h1>Login</h1>
												
											</div>
											<div class="clsLine"></div>
											<div id="loginmsg" class="alert-success" style="display:none;"></div>
											<div class="clsForm">
												<div class="row">
												<form method="get">
													<div style="margin-bottom:15px;" class="col-md-12">
														<label for="exampleInputEmail1">Username</label>
														<input type="text" name="username" id="username" style="height:50px;" placeholder="Enter Username " class="form-control ">
													</div>
														 
													<div style="margin-bottom:15px;" class="col-md-12">
														<label for="exampleInputEmail1">Password</label>
														<input type="password" name="password" id="password" style="height:50px;" placeholder="Enter Password" class="form-control ">
													</div>	
													
												</div>
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
														
														<a type="button" class="btn_edit_sc btn btn-success btn-lg col-xs-12" onClick="check_login();">LOGIN</a>
													</div>
													<!--<div style="margin-bottom:5px;" class="col-md-12">
														
														<a href="manage/signup" class="btn btn-danger btn-lg col-xs-12">REGISTER</a>
													</div>-->
													
												</div>
											</div>
											</form>
								</div>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
				
		
		
	</div>
	
	<!-- Menu Toggle Script -->
    
	 <script src="js/angular.min.js"></script>
  <script src="js/angular-route.min.js"></script>
  <script src="js/angular-animate.min.js" ></script>
  <script src="js/toaster.js"></script>
 
  
	
  </body>
</html>