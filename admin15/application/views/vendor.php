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

	
	<script>
	function add_vendor()
	{
		var fname=document.getElementById('firstname').value;
		var lname=document.getElementById('lastname').value;
		var email=document.getElementById('email').value;
		var comp=document.getElementById('company').value;
		var mn=document.getElementById('mobile').value;
		var bt=document.getElementById('btitle').value;
		var pwd=document.getElementById('password').value;
		
	$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/add_vendor/?callback=?',"firstname="+fname+"&lastname="+lname+"&emailID="+email+"&company="+comp+"&mobile_number="+mn+"&business_title="+bt+"&password="+pwd+"",function(res){
	document.getElementById('success').innerHTML = res.Result;   
    alert(res.Result);
});
}
function list_vendor()
{
	/*$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/list_vendor/?callback=?')
	  .done(function( vendor_data ) {
 var items = [];
$.each( this, function(  ) {
$.each(this, function(k, v) {
console.log( "<li id='" + k + "'>" + v + "</li>" );
           });
});

});*/




$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/list_vendor/?callback=?' , function(array) {
    var tbl_body = "";
	var txt="Edit";
	var det="Delete";
    var odd_even = false;
    $.each(array, function() {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        })
		 tbl_row += "<td>"+txt.link()+" &nbsp;&nbsp;&nbsp;"+ det.link()+"</td>";
		 
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#vendorlist tbody").html(tbl_body);
});

}
	
  

</script>


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
			<div id="page-content-wrapper1" >
				<div class="container-fluid">
					<div class="clsIn_cont">
						<div class="row">
							<div class="col-md-8">
								<div class="clsTlt">
									<h1>List Vendor</h1>
									
								</div>
							</div>
							
						</div>
						<div class="clsLine"></div>
						<div class="row">
							<div class="col-md-12">
								<div id="vlist"></div>
								<table id="vendorlist" class="table table-bordered">
								<thead>
									<tr>
									  <th width="50">#</th>
									  
									  <th>First Name</th>
									  <th>Last Name</th>
									 
										<th>Company</th>
									  <th>Business Title</th>
									  <th>EmailID</th>
									  <th>Mobile Number</th>
									    <th>Action</th>
									
									
									</tr>
								  </thead>
								<tbody>
								</tbody>
								</table>
								</div>
							</div>
						</div>
						
						
				</div>
			</div>
			<!-- /#page-content-wrapper -->
			<div id="page-content-wrapper2" style="display:none">
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
							
							<div id="success" class="alert success" style="display:none;"></div>
								<form name="add_ven"  method="post" >
											<div class="clsForm">
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter first name</label>
														<input type="text" name="firstname" id="firstname" style="height:50px;" placeholder="Enter first name " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter last name</label>
														<input type="text" name="lastname" id="lastname" style="height:50px;" placeholder="Enter last name " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Work EmailId</label>
														<input type="text" name="email" id="email" style="height:50px;" placeholder="Enter corporate email address " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Company</label>
														<input type="text" name="company" id="company" style="height:50px;" placeholder="Enter company " class="form-control ">
													</div>													
												</div>
												
												<div class="row">
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Business Title</label>
														<input type="text" name="btitle" id="btitle" style="height:50px;" placeholder="Enter password " class="form-control ">
													</div>
																 
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Password</label>
														<input type="password" name="password" id="password" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>	
													<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Verify Password</label>
														<input type="password" name="vpassword" id="vpassword" style="height:50px;" placeholder="*Enter mobile number  " class="form-control ">
													</div>	
													
														<div style="margin-bottom:15px;" class="col-md-6">
														<label for="exampleInputEmail1">Enter Mobile Number</label>
														<input type="text" name="mobile" id="mobile" style="height:50px;" placeholder="Enter mobile number  " class="form-control ">
												</div>
												
												<div class="row">
													<div style="margin-bottom:5px;" class="col-md-12">
														<a type="button" class="btn_edit_sc btn btn-success btn-lg col-xs-12" onClick="add_vendor();">ADD CIO</a>
													</div>
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
