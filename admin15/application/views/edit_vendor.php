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
	<base href="<?=base_url()?>" />
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

	
	<script>
	function add_cio()
	{
		var fname=document.getElementById('firstname').value;
		var lname=document.getElementById('lastname').value;
		var email=document.getElementById('email').value;
		var comp=document.getElementById('company').value;
		var pwd=document.getElementById('password').value;
		var vpwd=document.getElementById('verify').value;
		var mobile=document.getElementById('mobile').value;
		var caddress=document.getElementById('caddress').value;
		var secname=document.getElementById('secname').value;
		var secemail=document.getElementById('secemail').value;
		var secphone=document.getElementById('secphone').value;
		$.getJSON('http://www.globalprompt.org/sg/cio/ceo/add_ceo/?callback=?',"firstname="+fname+"&lastname="+lname+"&emailID="+email+"&company="+comp+"&mobile_number="+mobile+"&company_address="+caddress+"&secretary_name="+secname+"&secretary_email="+secemail+"&secretary_phone="+secphone+"&password="+pwd+"",function(res){
	document.getElementById('success').innerHTML = res.Result;   
    alert(res.Result);
	
	});
  
}
</script>
<script>

function list_cio()
{
$.getJSON('http://www.globalprompt.org/sg/cio/ceo/list_ceo/?callback=?' , function(array) {
    var tbl_body = "<tr><th>CIO ID</th><th>First Name</th><th>Last Name</th><th>Company</th><th>Email</th><th>Mobile</th><th>Password</th><th>Company Address</th><th>Secretary Name</th><th>Secretary Email</th><th>Secretary Phone</th><th>Action</th><th>Delete</th></tr>";
 var txt="Edit";
 var del="Delete";
    var odd_even = false;
    $.each(array, function() {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        })
		 tbl_row += "<td>"+txt.link()+"</td>";
		  tbl_row += "<td>"+txt.link()+"</td>";
        tbl_body += "<tr class=\""+( odd_even ? "active" : "active")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#vlist tbody").html(tbl_body);
});


}


</script>

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
	
$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/list_vendor/?callback=?' , function(array) {
    var tbl_body = "";
	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].vID;
		i++;
		tbl_row += "<td><button onClick='set_vendor_data("+id+")'>Edit</button></td>";
		  tbl_row += "<td><button onClick='delete_cio()'>DELETE</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#vendorlist tbody").html(tbl_body);
});

}
	
 function set_vendor_data(vid)
 {
 	$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/get_vendor/?callback=?' ,"vid="+vid+"", function(array) {
		
		jQuery('#edit_vID').val(array.vendor_data.vID);
		jQuery('#edit_fname').val(array.vendor_data.firstname);
		jQuery('#edit_lname').val(array.vendor_data.lastname);
		jQuery('#edit_cmp').val(array.vendor_data.company);
		jQuery('#edit_emailID').val(array.vendor_data.emailID);
		jQuery('#edit_bt').val(array.vendor_data.business_title);
		jQuery('edit_#mnumber').val(array.vendor_data.mobile_number);
		
	
		 document.getElementById("list_vendor").style.display="none";
		$("#edit_vendor").show();
	});
 }
 function edit_vendor()
 {
 		var vid=document.getElementById('edit_vid').value;
 		var fname=document.getElementById('edit_fname').value;
		var lname=document.getElementById('edit_lname').value;
		var email=document.getElementById('edit_emailID').value;
		var comp=document.getElementById('edit_cmp').value;
		var mn=document.getElementById('edit_mnumber').value;
		var bt=document.getElementById('edit_bt').value;
		
		
	$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/edit_vendor/vid?callback=?',"edit_vid="+vid+"edit_firstname="+fname+"&edit_lastname="+lname+"&edit_emailID="+email+"&edit_company="+comp+"&edit_mobile_number="+mn+"&edit_business_title="+bt+"",function(res){
	document.getElementById('success').innerHTML = res.Result;   
    alert(res.Result);
});
 }

</script>


<script>
function cio(x)
{
	if(x == 1)
	{
		 document.getElementById("add_cio").style.display="block";
		 document.getElementById("list_cio").style.display="none";
		 document.getElementById("add_vendor").style.display="none";
		 document.getElementById("list_vendor").style.display="none";
		 document.getElementById("edit_vendor").style.display="none";
	}
	if(x == 2)
	{
		 document.getElementById("add_cio").style.display="none";
		 document.getElementById("list_cio").style.display="block";
		 document.getElementById("add_vendor").style.display="none";
		 document.getElementById("list_vendor").style.display="none";
		  document.getElementById("edit_vendor").style.display="none";
		 list_cio();
	}
	if(x == 3)
	{
		 document.getElementById("add_cio").style.display="none";
		 document.getElementById("list_cio").style.display="none";
		 document.getElementById("add_vendor").style.display="block";
		 document.getElementById("list_vendor").style.display="none";
		 document.getElementById("edit_vendor").style.display="none";
		 
	}
	if(x == 4)
	{
		 document.getElementById("add_cio").style.display="none";
		 document.getElementById("list_cio").style.display="none";
		 document.getElementById("add_vendor").style.display="none";
		 document.getElementById("list_vendor").style.display="block";
		  document.getElementById("edit_vendor").style.display="none";
		 list_vendor();
	}
	
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
							<a class="list-group-item" href="javascript:void(0);" onClick="cio(1)">Add CIO</a> 
						  <a class="list-group-item" href="javascript:void(0);" onClick="cio(2)">List CIO</a>
						 
						</div>
						
						<a data-parent="#MainMenu" data-toggle="collapse" class="edit_List1 list-group-item list-group-item-primary collapsed" href="#catg2">Manage Vendor</a>
						<div id="catg2" class="collapse">
						 
						  <a class="list-group-item" href="javascript:void(0);" onClick="cio(3)">Add Vendor</a> 
						  <a class="list-group-item"  href="javascript:void(0);" onClick="cio(4)">List Vendor</a>
						 </div>
						
						
					  </div>
					</div>
			</div>
			<!-- /#sidebar-wrapper -->
			<!-- Page Content -->
			
			
			<!-- Page Content -->
			
		
		<!-- Page Content -->
			
		<!-- /#wrapper -->
		
		
		<!-- /#page-content-wrapper -->
			
		<!-- /#wrapper -->
		<!-- /#page-content-wrapper -->
			
		<!-- /#wrapper -->
		
		<!--<div class="clsCopyright navbar-fixed-bottom">
			<p>All Rights Reserved Copyrights 2014.</p>
		</div>
	</div>-->
	
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
