<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../CEO/images/favicon.png">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="../CEO/css/bootstrap.min.css" rel="stylesheet">
	<link href="../CEO/css/style.css" rel="stylesheet">
	<link href="../CEO/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="gl_font/opensans.css?family=Open+Sans:400,700&amp;subset=latin-ext,latin">
	<link rel="stylesheet" href="gl_font/opensans2.css?family=Open+Sans:400,300,700|Roboto:300,400&amp;subset=latin-ext,latin">
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="css/style_ie.css"/>
  <![endif]-->
   <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../CEO/js/ie-emulation-modes-warning.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js">
	</script>
	<? //include'ceo.php' ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="clsWrapper">
		<? include "header.php"?>	<!--clsHeader-->
		
		
		<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<div id="MainMenu">
					  <div class="list-group panel">
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg1">Manage CIO</a>
						<div id="catg1" class="collapse" style="height: 0px;">
							<a class="list-group-item" href="javascript:;">Manage CIO</a> 
						  <a class="list-group-item" href="javascript:;">List CIO</a>
						 
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg2">Manage Vendor</a>
						<div id="catg2" class="collapse">
						  <a class="list-group-item" href="#/vendor.html">Add Vendor</a>
						  <a class="list-group-item" href="">List Vendor</a>
						 </div>
						
						<!--<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg3">Manage Category</a>
						<div id="catg3" class="collapse">
						  <a class="list-group-item" href="">Subitem 1</a>
						  <a class="list-group-item" href="">Subitem 2</a>
						  <a class="list-group-item" href="">Subitem 3</a>
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg4">Manage Company</a>
						<div id="catg4" class="collapse">
						  <a class="list-group-item" href="">Subitem 1</a>
						  <a class="list-group-item" href="">Subitem 2</a>
						  <a class="list-group-item" href="">Subitem 3</a>
						</div>-->
					  </div>
					</div>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Manage CIO / Add CIO</h1>
									<h2>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</h2>
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
						
						<div class="row">
							<div class="col-md-12">
							<form name="add_ceo" ng-controller="addvendorController">
											<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter first name</label>
														<input type="text" ng-model="firstname" style="height:50px;" placeholder="Enter first name " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter last name</label>
														<input type="text" ng-model="lastname" style="height:50px;" placeholder="Enter last name " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter company</label>
														<input type="text" ng-model="company" style="height:50px;" placeholder="Enter corporate email address " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter business title</label>
														<input type="text" ng-model="btitle" style="height:50px;" placeholder="Enter company " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter emailID </label>
														<input type="password" ng-model="email" style="height:50px;" placeholder="Enter password " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter mobile number</label>
														<input type="text" ng-model="mobile" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>	
														<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter password</label>
														<input type="text" ng-model="password" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>	
														<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter verify password</label>
														<input type="text" ng-model="verifypass" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
														<button type="submit" class="btn_edit_sc btn btn-success btn-lg col-xs-12" ng-click="add_vendor()" >ADD CIO</button>
													</div>
												</div>
											</div>
										</form>
										<script type="text/javascript">
                							function addvendorController($scope, $http,$location) {
											$scope.errors = [];
											$scope.msgs = [];
							 
											$scope.add_vendor = function() {
							 
												$scope.errors.splice(0, $scope.errors.length); // remove all error messages
												$scope.msgs.splice(0, $scope.msgs.length);
							 
												$http.post('http://localhost/dropbox/cio_choice/vendor2/add_vendor/', {'firstname': $scope.firstname, 'lastname': $scope.lastname,,'company': $scope.company,'business_title': $scope.btitle,'emailID': $scope.email,'mobile_number': $scope.mobile,'password': $scope.password,'vpass': $scope.verifypass}
												).success(function(data, status, headers, config) {
													if (data.msg != '')
													{
														$scope.msgs.push(data.msg);
													}
													else
													{
														$scope.errors.push(data.error);
													}
												}).error(function(data, status) { // called asynchronously if an error occurs
							// or server returns response with an error status.
													$scope.errors.push(status);
												});
											}
										}
									</script>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->

		</div>
		<!-- /#wrapper -->
		
		<div class="clsCopyright navbar-fixed-bottom">
			<p>All Rights Reserved Copyrights 2014.</p>
		</div>
	</div>
	
	<!-- Menu Toggle Script -->
    
	
   <!-- jQuery Version 1.11.0 -->
    <script src="../CEO/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../CEO/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../CEO/js/ie10-viewport-bug-workaround.js"></script>
	<script src="../CEO/js/carousel.js"></script>
	
	<!-- latest jQuery, Boostrap JS and hover dropdown plugin -->
	<script src="../CEO/js/twitter-bootstrap-hover-dropdown.js"></script>
	<script>
		// very simple to use!
		$(document).ready(function() {
		  $('.js-activated').dropdownHover().dropdown();
		});
	</script>
	
	
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>
