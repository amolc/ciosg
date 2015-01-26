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
	
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/admin.js"></script>




</head>
  <body>
    <div class="clsWrapper">
		<?php include "header.php"?>	<!--clsHeader-->
		
		
		<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<div id="MainMenu">
					  <div class="list-group panel">
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg1">Manage CIO</a>
						<div id="catg1" class="collapse" style="height: 0px;">
							<a class="list-group-item" href="javascript:void(0);" onClick="cio(1)">Add CIO</a> 
						  <a class="list-group-item" href="javascript:void(0);" onClick="cio(2); list_cio();">List CIO</a>
						 
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg2">Manage Vendor</a>
						<div id="catg2" class="collapse">
						 
						  <a class="list-group-item" href="javascript:void(0);" onClick="cio(3)">Add Vendor</a> 
						  <a class="list-group-item"  href="javascript:void(0);" onClick="cio(4); list_vendor();">List Vendor</a>
						 </div>
					
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg4">Manage Companies</a>
						<div id="catg4" class="collapse" style="height: 0px;">
						  <a data-parent="#SubMenu1" data-toggle="collapse" class="list-group-item collapsed" href="#SubMenu1">Parent Companies <i class="fa fa-caret-down"></i></a>
						  <div id="SubMenu1" class="list-group-submenu collapse" style="height: 0px;">
							<a data-parent="#SubMenu1" class="list-group-item" href="javascript:void(0);" onClick="cio(5);">Add Company</a>
							<a data-parent="#SubMenu1" class="list-group-item" href="javascript:void(0);" onClick="list_parent_company();cio(6);">List Company</a>
						</div>
							<a data-parent="#SubMenu1" data-toggle="collapse" class="list-group-item collapsed" href="#SubMenu2">Regional Companies <i class="fa fa-caret-down"></i></a>
							<div id="SubMenu2" class="list-group-submenu collapse" style="height: auto;">
							  <a data-parent="#SubMenu2" class="list-group-item" href="javascript:void(0);" onClick="cio(10);show_parent(1);">Add Company</a>
							  <a data-parent="#SubMenu2" class="list-group-item" href="javascript:void(0);" onClick="list_regional_company();cio(11);">List Company</a>
							</div>
						
						 
						
					  </div>
					  <a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg5">Manage Category</a>

					  <div id="catg5" class="collapse" style="height: 0px;">
						  <a data-parent="#SubMenu3" data-toggle="collapse" class="list-group-item collapsed" href="#SubMenu3">Category<i class="fa fa-caret-down"></i></a>
						  <div id="SubMenu3" class="list-group-submenu collapse" style="height: 0px;">
							<a data-parent="#SubMenu3" class="list-group-item" href="javascript:void(0);" onClick="cio(13);">Add Category</a>
							<a data-parent="#SubMenu3" class="list-group-item" href="javascript:void(0);" onClick="list_category();cio(14);">List Category</a>
						</div>
							<a data-parent="#SubMenu4" data-toggle="collapse" class="list-group-item collapsed" href="#SubMenu4">Item <i class="fa fa-caret-down"></i></a>
							<div id="SubMenu4" class="list-group-submenu collapse" style="height: auto;">
							  <a data-parent="#SubMenu4" class="list-group-item" href="javascript:void(0);" onClick="cio(15);show_category(1);">Add Item</a>
							  <a data-parent="#SubMenu4" class="list-group-item" href="javascript:void(0);" onClick="list_item();cio(16);">List Item</a>
							</div>
							
						
						 
						
					  </div>
					  <a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg6">Manage Currency</a>
						<div id="catg6" class="collapse" style="height: 0px;">
							<a class="list-group-item" href="javascript:void(0);" onClick="cio(19)">Add Currency</a> 
						  <a class="list-group-item" href="javascript:void(0);" onClick="cio(20); list_currency();">List Currency</a>
						 
						</div>
					 <a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg7" >Manage Request</a>
					 <div id="catg7" class="collapse" style="height: 0px;">
						<a class="list-group-item" href="javascript:void(0);"onClick="list_pending_cio();cio(23);">List Pending CIO Requests</a> 
						<a class="list-group-item" href="javascript:void(0);"onClick="list_pending_vendor();cio(22);">List Pending Vendor Requests</a> 

					</div>
						
					</div>
			</div>
		</div>
			<!-- /#sidebar-wrapper -->
			<!-- Page Content -->
			<div  id="admin_div_2" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>CIO List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="vlistloading">
							<div class="col-md-12">
								<div id="deletecio_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="vlist" class="table table-bordered">
								<tbody>
						
								
								
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
			
			<!-- Page Content -->
			<div id="admin_div_1" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add CIO</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						

						
						<div class="row" id="addv">
							<div class="col-md-12" >
							<div id="addcio_result" class="alert-success form-control" style="display:none;"></div><br>
								<form id="addcio"  method="post" >
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter First Name</label>
														<input type="text" name="firstname" id="firstname" style="height:50px;" placeholder="Enter First Name " class="form-control form-font">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Last Name</label>
														<input type="text" name="lastname" id="lastname" style="height:50px;" placeholder="Enter Last Name " class="form-control form-font">
													</div>		
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Work Email-Id</label>
														<input type="text" name="email" id="email" style="height:50px;" placeholder="Enter Work Email-Id" class="form-control form-font">
													</div>											
												</div>
												
												<div class="row">
													
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text" name="company" id="company" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font">
													</div>		
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Password</label>
														<input type="password" name="password" id="password" style="height:50px;" placeholder="Enter Password " class="form-control form-font">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Confirm Password</label>
														<input type="password" name="verify" id="verify" style="height:50px;" placeholder="Confirm Password" class="form-control form-font">
													</div>												
												</div>
												
												<div class="row">
													
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Mobile No.</label>
														<input type="text" name="mobile" id="mobile" style="height:50px;" placeholder="Enter Mobile No." class="form-control form-font ">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Address</label>
														<input type="text" name="caddress" id="caddress" style="height:50px;" placeholder="Enter Company Address  " class="form-control form-font">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Name</label>
														<input type="text" name="secname" id="secname" style="height:50px;" placeholder="Enter Secretary Name  " class="form-control form-font">
													</div>
												</div>
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Email-Id</label>
														<input type="text" name="secemail" id="secemail" style="height:50px;" placeholder="Enter Secretary Email-Id " class="form-control form-font">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Mobile No.</label>
														<input type="text" name="secphone" id="secphone" style="height:50px;" placeholder="Enter Secretary Mobile No." class="form-control form-font">
													</div>
													
													
												
												
											</div>
											<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="add_cio();">Add CIO</a>
													</div>
													
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
			<div id="admin_div_7" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit CIO</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
						
						<div class="row" id="addv">
							<div class="col-md-12" >
								<div id="editcio_result" class="alert-success form-control" style="display:none;"></div><br>

								<form name="add_ven"  method="post" >
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter First Name</label>
														<input type="text"  id="edit_cfirstname" style="height:50px;" placeholder="Enter First Name " class="form-control form-font">
														<input type="hidden"  id="edit_cid" style="height:50px;" value="">
														
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Last Name</label>
														<input type="text"  id="edit_clastname" style="height:50px;" placeholder="Enter Last Name " class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Work Email-Id</label>
														<input type="text"  id="edit_cemail" style="height:50px;" placeholder="Enter Work Email-Id " class="form-control form-font">
													</div>												
												</div>
												
												<div class="row">
													
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text" id="edit_ccompany" style="height:50px;" placeholder="Enter Company Name " class="form-control form-font">
													</div>		
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Mobile No.</label>
														<input type="text"  id="edit_cmobile" style="height:50px;" placeholder="Enter Mobile No.  " class="form-control form-font ">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Address</label>
														<input type="text"  id="edit_caddress" style="height:50px;" placeholder="Enter Company Address  " class="form-control form-font">
													</div>											
												</div>
												
												<div class="row">
													
													
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Name:</label>
														<input type="text" id="edit_csecname" style="height:50px;" placeholder="Enter Secretary Name " class="form-control form-font ">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Email-Id</label>
														<input type="text"  id="edit_csecemail" style="height:50px;" placeholder="Enter Secretary email-Id " class="form-control form-font ">
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Secretary Mobile No.</label>
														<input type="text" id="edit_csecphone" style="height:50px;" placeholder="*Enter Secretary Mobile No.  " class="form-control form-font">
													</div>
													
													
												
												
											</div>
											<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="edit_cio();">Edit CIO</a>
													</div>
													
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		
		
		<!-- Page Content -->
			<div id="admin_div_4" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Vendor List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row">
							<div class="col-md-12">
							<div id="deletevendor_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="vendorlist" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#wrapper -->
	
		
		<!-- /#page-content-wrapper -->
			<div id="admin_div_3" style="display:none">
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
												
						<div class="row" id="addv">
							<div class="col-md-12">
							
							<div id="addvendor_result" class="alert-success form-control" style="display:none;"></div><br>
								<form name="add_ven"  method="post" >
											<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter First Name</label>
														<input type="text" name="firstname" id="vendor_firstname" style="height:50px;" placeholder="Enter First Name " class="form-control form-font">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Last Name</label>
														<input type="text" name="lastname" id="vendor_lastname" style="height:50px;" placeholder="Enter Last Name " class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Work Email-Id</label>
														<input type="text" name="email" id="vendor_email" style="height:50px;" placeholder="Enter Work email-Id " class="form-control form-font">
													</div>												
												</div>
												
												<div class="row">
													
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text" name="company" id="vendor_company" style="height:50px;" placeholder="Enter Company Name " class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Business Title</label>
														<input type="text" name="btitle" id="vendor_btitle" style="height:50px;" placeholder="Enter Business Title " class="form-control form-font">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Password</label>
														<input type="password" name="password" id="vendor_password" style="height:50px;" placeholder="Enter Password  " class="form-control form-font">
													</div>													
												</div>
												
												<div class="row">
													
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Confirm Password</label>
														<input type="password" name="vpassword" id="vendor_vpassword" style="height:50px;" placeholder="Confirm Password " class="form-control form-font">
													</div>	
													
														<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Mobile No.</label>
														<input type="text" name="mobile" id="vendor_mobile" style="height:50px;" placeholder="Enter Mobile No." class="form-control form-font">
												</div>
												
												
											</div>
											<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="add_vendor();">Add Vendor</a>
													</div>
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /#wrapper -->
		<!-- /#page-content-wrapper -->
			<div id="admin_div_8" style="display:none">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Vendor</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
												
						<div class="row" id="addv">
							<div class="col-md-12">
							
							<div id="editvendor_result" class="alert-success form-control" style="display:none;"></div><br>
								<form name="add_ven"  method="post" >
											<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter First Name</label>
														<input type="text" name="firstname" id="edit_fname" style="height:50px;" placeholder="Enter First Name " class="form-control form-font ">
														<input type="hidden" id="edit_vid" value="">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Last Name</label>
														<input type="text" name="lastname" id="edit_lname" style="height:50px;" placeholder="Enter Last Name " class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Work Email-Id</label>
														<input type="text" name="email" id="edit_emailID" style="height:50px;" placeholder="Enter Work Email-Id " class="form-control form-font">
													</div>												
												</div>
												
												<div class="row">
													
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text" name="company" id="edit_cmp" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Business Title</label>
														<input type="text" name="btitle" id="edit_bt" style="height:50px;" placeholder="Enter Business Title " class="form-control form-font">
													</div>
																 
														
													
														<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Mobile No.</label>
														<input type="text" name="mobile" id="edit_mnumber" style="height:50px;" placeholder="Enter Mobile No." class="form-control form-font">
												</div>												
												</div>
												
												
												
											<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="edit_vendor();">Edit Vendor</a>
													</div>
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--Add Parent Companies-->
			<div id="admin_div_5" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add Parent Company</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
						
						<div class="row">
							<div class="col-md-12" >
							<div id="add_parent_company_result" class="alert-success form-control" style="display:none;"></div><br>
								<form id="addcio"  method="post" >
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text"  id="parent_company_name" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Domain Name</label>
														<input type="text" id="parent_domain_name" style="height:50px;" placeholder="Enter Domain Name" class="form-control form-font ">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Country</label>
														<input type="text" id="parent_company_country" style="height:50px;" placeholder="Enter Country" class="form-control form-font">
													</div>												
												</div>
												
												
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="add_parent_company();">Add Company</a>
													</div>
													
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!--/#Add Parent Companies-->
		<!--Edit Parent Companies-->
		    <div id="admin_div_9" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Parent Company</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
						
						<div class="row">
							<div class="col-md-12" >
							<div id="editpc_result" class="alert-success form-control" style="display:none;"></div><br>
								<form id="addcio"  method="post" >
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text"  id="edit_parent_company_name" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font">
														<input type="hidden"  id="edit_parent_id" style="height:50px;" value="">

													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Domain Name</label>
														<input type="text" id="edit_parent_domain_name" style="height:50px;" placeholder="Enter Domain Name" class="form-control form-font">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Country Name</label>
														<input type="text" id="edit_parent_company_country" style="height:50px;" placeholder="Enter Country Name" class="form-control form-font">
													</div>												
												</div>
												
												
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12" onClick="edit_parent_company();">Edit Company</a>
													</div>
													
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!--/#Edit Parent Companies-->
		<!-- Parent Companies List -->
			<div  id="admin_div_6" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Parent Companies List </h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row">
							<div class="col-md-12">
								<div id="deletepcompany_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="plist" class="table table-bordered">
								<tbody>
						
								
								
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#Parent Companies List -->
		<!--Add Regional Companies-->
			<div id="admin_div_10" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add Regional Company</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="add_regional_company_result" class="alert-success form-control" style="display:none;"></div><br>
								<form id="addcio"  method="post" >
											<div class="clsForm"> 
												<div class="row">
												
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text"  id="regional_company_name" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font ">
														<input type="hidden"  id="parentID" style="height:50px;" value="">

													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Domain Name</label>
														<input type="text" id="regional_domain_name" style="height:50px;" placeholder="Enter Domain Name " class="form-control form-font ">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Country Name</label>
														<input type="text" id="regional_company_country" style="height:50px;" placeholder="Enter Country Name" class="form-control form-font">
													</div>												
												</div>
												
												<div class="row">
													
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Select Parent Company </label>
															<div id="parentc_1"></div>
													</div>
																 
																									
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="add_regional_company();">Add Company</a>
													</div>
													
												</div>
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		<!-- /#Add Regional Companies  -->
		<!--Edit Regional Companies-->
			<div id="admin_div_12" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Regional Company</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="editrc_result" class="alert-success form-control" style="display:none;"></div><br>
								<form id="addcio"  method="post" >
											<div class="clsForm"> 
												<div class="row">
												
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Company Name</label>
														<input type="text"  id="edit_regional_company_name" style="height:50px;" placeholder="Enter Company Name" class="form-control form-font">
														<input type="hidden"  id="edit_regional_id" style="height:50px;" value="">
														<input type="hidden"  id="editparentid" style="height:50px;" value="">

													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Domain Name</label>
														<input type="text" id="edit_regional_domain_name" style="height:50px;" placeholder="Enter Domain Name" class="form-control form-font">
													</div>		
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Country Name</label>
														<input type="text" id="edit_regional_company_country" style="height:50px;" placeholder="Enter Country Name" class="form-control form-font">
													</div>											
												</div>
												
												<div class="row">
													
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Select Parent Company </label>
															<div id="parentc_2" ></div>
													</div>
																 
																									
												</div>
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="edit_regional_company();">Edit Company</a>
													</div>
													
												</div>
												
										</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#page-content-wrapper -->
		</div>
		<!--/#Edit Regional Companies-->
		<!-- Regional Companies List -->
			<div id="admin_div_11" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Regional Companies List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="deletercompany_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="rlist" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!--/# Regional Companies List -->
		<!-- Add Category -->
			<div id="admin_div_13" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add Category</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="add_category_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
												<div class="row">
												
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Category Name</label>
														<input type="text"  id="cat_name" style="height:50px;" placeholder="Enter Category Name" class="form-control form-font">
														
													</div>
												</div>
												<div class="row">		 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Category Description</label>
														<textarea id="cat_desc" cols="46" rows="10" placeholder="Enter Category Description"></textarea>
													</div>		
																							
												</div>
												
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="add_category();">Add Category</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Add Category -->
		<!--Edit Category -->
			<div id="admin_div_17" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Category</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="edit_category_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
												<div class="row">
												
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Category Name</label>
														<input type="text"  id="edit_cat_name" style="height:50px;" placeholder="Enter Category Name" class="form-control form-font">
														<input type="hidden"  id="edit_cat_ID" value="">
														
													</div>
												</div>
												<div class="row">		 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Category Description</label>
														<textarea id="edit_cat_desc" cols="46" rows="10" placeholder="Enter Category Description"></textarea>
													</div>		
																							
												</div>
												
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="edit_category();">Edit Category</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Edit Category -->
		<!-- List Category -->
		<div id="admin_div_14" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Category List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="deletecategory_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="catlist" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#List Category -->
		<!-- Add Item -->
			<div id="admin_div_15" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add Item</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="add_item_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Select Category</label>
														<div id="cat_opt_1" ></div>
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Item Name</label>
														<input type="text"  id="item_name" style="height:50px;" placeholder="Enter Item Name" class="form-control form-font">
														<input type="hidden"  id="category" value="">
														
													</div>
												</div>
												<div class="row">		 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Item Description</label>
														<textarea id="item_desc" cols="46" rows="10" placeholder="Enter Item Description"></textarea>
													</div>		
																							
												</div>
												
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="add_item();">Add Item</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Add Item -->
		<!--Edit Item -->
			<div id="admin_div_18" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Item</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="edit_item_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
											
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Select Category</label>
														<div id="cat_opt_2" ></div>
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Item Name</label>
														<input type="text"  id="edit_item_name" style="height:50px;" placeholder="Enter Item Name" class="form-control form-font">
														<input type="hidden"  id="edit_category" value="">
														<input type="hidden"  id="edit_item_ID" value="">
														
													</div>
												</div>
												<div class="row">		 
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Item Description</label>
														<textarea id="edit_item_desc" cols="46" rows="10" placeholder="Enter Item Description"></textarea>
													</div>		
																							
												</div>

												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="edit_item();">Edit Item</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Edit Item -->
		<!-- List Item -->
		<div id="admin_div_16" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Item List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="delete_item_result" class="alert-success form-control" style="display:none;"></div><br>
								<table id="itemlist" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#List Item -->
		
		<!-- Add Currecny -->
			<div id="admin_div_19" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Add Currency</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="add_currency_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Country Code</label>
														<input type="text"  id="country_code" style="height:50px;" placeholder="Enter Country Code" class="form-control form-font">
														<input type="hidden"  id="edit_currency_id">
														
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Currency</label>
														<input type="text"  id="currency" style="height:50px;" placeholder="Enter Currency" class="form-control form-font">
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Conversion Rate</label>
															<input type="text"  id="conversion_rate" style="height:50px;" placeholder="Enter Conversion Rate" class="form-control form-font">
													</div>	
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="add_currency();">Add Currency</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Add Currency -->
		<!-- Edit Currecny -->
			<div id="admin_div_21" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Edit Currency</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						
					
						<div class="row">
							<div class="col-md-12" >
							<div id="edit_currency_result" class="alert-success form-control" style="display:none;"></div><br>
								
											<div class="clsForm"> 
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Country Code</label>
														<input type="text"  id="edit_country_code" style="height:50px;" placeholder="Enter Country Code" class="form-control form-font">
														
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4" >
														<label for="exampleInputEmail1">Enter Currency</label>
														<input type="text"  id="edit_currency" style="height:50px;" placeholder="Enter Currency" class="form-control form-font">
														
													</div>
													<div style="margin-bottom:15px;" class="col-md-4">
														<label for="exampleInputEmail1">Enter Conversion Rate</label>
															<input type="text"  id="edit_conversion_rate" style="height:50px;" placeholder="Enter Conversion Rate" class="form-control form-font">
													</div>	
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-2">
														<a type="button" class="btn_edit_sc btn btn-primary btn-lg col-xs-12 form-font" onClick="edit_currency();">Update Currency</a>
													</div>
													
												</div>
												
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#Edit Currency -->
		<!-- List Currency -->
		<div id="admin_div_20" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Currency List</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="delete_currency" class="alert-success form-control" style="display:none;"></div><br>
								<table id="currencylist" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#List Currency -->
		<!-- List Pending User -->
		<div id="admin_div_22" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Manage Request</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="delete_currency" class="alert-success form-control" style="display:none;"></div><br>
								<table id="pending_user" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#List Pending User -->
		<!-- List Pending User -->
		<div id="admin_div_23" style="display:none;">
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>Manage Request</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row" id="rlistloading">
							<div class="col-md-12">
							<div id="pclist" class="alert-success form-control" style="display:none;"></div><br>
								<table id="pending_cio" class="table table-bordered">
								
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
		<!-- /#List Pending User -->
		
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
