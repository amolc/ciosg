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
	<base href="<?=base_url()?>">

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
	  <script src="js/form_validation.js"></script>
	    <script src="js/form_validation2.js"></script>
		  <script src="js/validation.js"></script>

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
											<li class="active"><a href="#">Dashboard</a></li>
											<li><a href="#">Emails</a></li>
											<li><a href="#">Private Settings</a></li>
											<li><a href="#">Latest Review</a></li>
											<li><a href="#">Affiliates</a></li>
											<li><a href="#">Logout</a></li>
											<li><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-2x"></i></a></li>
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
		
		
		<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<div id="MainMenu">
					  <div class="list-group panel">
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg1">Manage CIO</a>
						<div id="catg1" class="collapse" style="height: 0px;">
						  <a data-parent="#SubMenu1" data-toggle="collapse" class="list-group-item collapsed" href="#SubMenu1">Add CIO <i class="fa fa-caret-down"></i></a>
						  <div id="SubMenu1" class="list-group-submenu collapse" style="height: 0px;">
							<a data-parent="#SubMenu1" class="list-group-item" href="#">Subitem 1 a</a>
							<a data-parent="#SubMenu1" class="list-group-item" href="#">Subitem 2 b</a>
							<a data-parent="#SubSubMenu1" data-toggle="collapse" class="list-group-item" href="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
							<div id="SubSubMenu1" class="list-group-submenu list-group-submenu-1 collapse in" style="height: auto;">
							  <a data-parent="#SubSubMenu1" class="list-group-item" href="#">Sub sub item 1</a>
							  <a data-parent="#SubSubMenu1" class="list-group-item" href="#">Sub sub item 2</a>
							</div>
							<a data-parent="#SubMenu1" class="list-group-item" href="#">Subitem 4 d</a>
						  </div>
						  <a class="list-group-item" href="javascript:;">Subitem 2</a>
						  <a class="list-group-item" href="javascript:;">Subitem 3</a>
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="manage/manage_vendor">Manage Vendor</a>
						<div id="catg2" class="collapse">
						  <a class="list-group-item" href="">Subitem 1</a>
						  <a class="list-group-item" href="">Subitem 2</a>
						  <a class="list-group-item" href="">Subitem 3</a>
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="manage/manage_category">Manage Category</a>
						<div id="catg3" class="collapse">
						  <a class="list-group-item" href="">Subitem 1</a>
						  <a class="list-group-item" href="">Subitem 2</a>
						  <a class="list-group-item" href="">Subitem 3</a>
						</div>
						
						<a  href="manage/manage_company" data-parent="#MainMenu" class="edit_List1 list-group-item list-group-item-primary collapsed" href="manage/manage_company">Manage Company</a>
						<div id="catg4" class="collapse">
						  <a class="list-group-item" href="">Subitem 1</a>
						  <a class="list-group-item" href="">Subitem 2</a>
						  <a class="list-group-item" href="">Subitem 3</a>
						</div>
					  </div>
					</div>
			</div>
			<!-- /#sidebar-wrapper -->
			<? if($pr=='add_company') {?>
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add New Company</h1>
								</div>
							</div>
						</div>
						<div class="clsLine"></div>
						<br>
						<form  action="manage/add_company" method="post" onSubmit="validate('add_company')" id="add_company">
						<div class="row">
							<div class="col-md-12">
							<?=$msg?>
							<br>
											<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Name" id="company_name"class="form-control" name="company_name">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Address" id="company_address"class="form-control " name="company_address">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Contact" id="company_contact"class="form-control" name="company_contact">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="City" id="city" class="form-control" name="city">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="State" id="state"class="form-control" name="state">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Country" id="country"class="form-control" name="country">
													</div>													
												</div>
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Zipcode" class="form-control" name="zipcode">
													</div>
																 
																					
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
														<button type="submit" class="btn_edit_sc btn btn-success btn-lg col-xs-12">Add Company</button>
													</div>
												</div>
											</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- /#page-content-wrapper -->
			<? } else if($pr=='edit_company') {?>
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Company Information</h1>
								</div>
							</div>
						</div>
						<div class="clsLine"></div>
						<br>
						<form  action="" method="post">
						<div class="row">
							<div class="col-md-12">
							<?=$msg?>
							<br>
							<? $res=mysql_query("select * from sg_company where cID='$cID'");
							while($row=mysql_fetch_array($res)) {?>
								<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Name" class="form-control " name="company_name" value="<?=$row['cname']?>">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Address" class="form-control " name="company_address" value="<?=$row['caddress']?>">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Enter Company Contact" class="form-control" name="company_contact" value="<?=$row['contact_no']?>">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="City" class="form-control" name="city" value="<?=$row['city']?>">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="State" class="form-control" name="state" value="<?=$row['state']?>">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Country " class="form-control" name="country" value="<?=$row['country']?>">
													</div>													
												</div>
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<input type="text" style="height:50px;" placeholder="Zipcode" class="form-control" name="zipcode" value="<?=$row['zipcode']?>">
													</div>
																 
																					
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
														<button type="submit" class="btn_edit_sc btn btn-success btn-lg col-xs-12">Update</button>
													</div>
												</div>
											</div>
							</div>
						</div>
						</form>
					<? }?>
					</div>
				</div>
			</div>
		<? } else if($pr=='manage_company') {?>
		<div id="page-content-wrapper">
			<div class="container-fluid">
			
				<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Manage Company</h1>
								</div>
							</div>
							<div class="col-md-4">
								<form class="form-inline pull-right" role="form" action="manage/manage_company" method="post">
							</div>
						</div>
						<div class="clsLine"></div>
						<br>
						<a href="manage/add_company" class="btn btn-primary">Add New Company</a><br><br>
			<table class="table table-bordered responsive-table">
			  <thead>
				<tr>
				  <th width="50">#</th>
				  
				  <th>Company Name</th>
				  <th>Company Address</th>
				 
				    <th>Company Conatct </th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<? $res=mysql_query("select cID,cname,caddress,contact_no from sg_company");
				while($row=mysql_fetch_array($res)) {?>
				<tr>
					<td><?=$row['cID']?></td>
					
					
					<td><?=$row['cname']?></td>
					<td><?=$row['caddress']?></td>
				
					<td><?=$row['contact_no']?></td>
					<td>
					<a href="manage/edit_company/<?=$row['cID']?>"   class="btn btn-info btn-xs"><i class="fa fa-edit" title="edit"></i></a>
					<a href="javascript:void(0);" onClick="answer = confirm('Are you sure you want to delete?');if(answer){location.href='<?=base_url()?>manage/delete_company/<?=$row['cID']?>';};"class="btn btn-danger btn-xs"><i class="fa fa-times" title="delete"></i></a>
					</td>
				</tr>
				<? } ?>
			  </tbody>
		  	</table>
			</div>
		</div>
		<? }?>
		</div>
		<!-- /#wrapper -->
		
		<div class="clsCopyright">
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