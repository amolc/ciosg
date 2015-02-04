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
						  <a class="list-group-item" href="vendor.php">Add Vendor</a>
						  <a type="button" href="javascript:void(0);" class="list-group-item" onClick="list_vendor();">List Vendor</a>
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
									<h1>Add Vendor</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
						
						<div class="row">
							<div class="col-md-12">
							<div id="vlist" class="alert success" style="display:none;"></div>
								<table></table>
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
