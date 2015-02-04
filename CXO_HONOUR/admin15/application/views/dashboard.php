<!DOCTYPE html>
<html ng-app="listpp" ng-app lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

	<script src="js/admin.js"></script>
	
	</head>
    <? include'header.php'; ?>
		
		
		
  <div id="wrapper" ng-controller="ceocontroller">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<div id="MainMenu">
					  <div class="list-group panel">
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg1">Manage CIO</a>
						<div id="catg1" class="collapse" style="height: 0px;">
							<a class="list-group-item" href="javascript:void(0);" onclick="show_div('1');">Add CIO</a> 
						  <a class="list-group-item" href="javascript:void(0);">List CIO</a>
						 
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg2">Manage Vendor</a>
						<div id="catg2" class="collapse">
						  <a class="list-group-item" href="vendor.php" >Add Vendor</a>
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
			<div id="page-content-wrapper_1">
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
							<form name="add_ceo" ng-controller="addceoController">
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
														<label for="exampleInputEmail1">Enter corporate email address</label>
														<input type="text" ng-model="email" style="height:50px;" placeholder="Enter corporate email address " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter company</label>
														<input type="text" ng-model="company" style="height:50px;" placeholder="Enter company " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter password </label>
														<input type="password" ng-model="password" style="height:50px;" placeholder="Enter password " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">*Enter mobile number</label>
														<input type="text" ng-model="mobile" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
				<button type="submit" class="btn_edit_sc btn btn-success btn-lg col-xs-12" ng-click="add_cio()" >ADD CIO</button>
													</div>
												</div>
											</div>
										</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		
		<!-- /#wrapper -->
		
		<div class="clsCopyright navbar-fixed-bottom">
			<p>All Rights Reserved Copyrights 2014.</p>
		</div>
	</div>
	
	<!-- Menu Toggle Script -->
    
	
   <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
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
	
	
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>