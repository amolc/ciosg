var parent_id='';
function cio(x)
{
		/*var ret=getCookie(x);
		alert(ret);
		if(ret)
		{*/
			for(i=1;i<=23;i++)
			{
				$('#admin_div_'+i).hide();
			}
			$('#admin_div_'+x).show();
		/*}
		else
		{
			window.location = "index.php";
		} */
}
function validate_email($email) 
{
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  if( !emailReg.test( $email ) ) 
	  {
		return false;
	  } 
	  else 
	  {
		return true;
	  }
}
function setCookie(cname, cvalue, exdays) {
     var expires = "expires="+exdays;
	 document.cookie = cname + "=" + cvalue + "; " + expires;
	
   	// document.cookie = "userID="+ID + ";session_no="+cvalue+"";
	
} 
function getCookie() 
{
	 var id='';
     var ca = document.cookie.split(';');
	 da=ca[0].split('=');
	 id=da[0];
	 var flag='';
	 var session_no='';
	
	 $.getJSON('http://www.globalprompt.org/sg/cio/ceo/get_session_data/?callback=?',"userID="+id+"",function(res){
		session_no=res.s_data.sessionNo;
		if(session_no==da[1])
		{
		  flag=1;
		}
		alert(session_no);
		
	});		
	/*document.getElementById('admin_div_'+x).innerHTML = "Loading..." ;  
	$('#admin_div_'+x).show().delay(5000).hide(0);
	
     */
	 alert(session_no);
	 if(flag==1)
	 {
		return true; 
	 }
     else
	 {
		return false;
	  }
	
	 
} 
function add_cio()
	{
			
				var error='';
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
				if(fname==''||lname==''||email==''||comp==''||pwd==''||mobile==''||caddress=='')
				{
					error+='All fields are required';
				}
				else if(pwd!=vpwd)
				{
					error+='Password and Confirm Password must be same';
				}
				else if(!validate_email($('#email').val()))
				{
					error += 'Please enter valid Email-Id';
				}
				else
				{
					document.getElementById('addcio_result').innerHTML = "Saving..." ;  
					$('#addcio_result').show().delay(5000).hide(0);
					$.getJSON('http://www.globalprompt.org/sg/cio/ceo/add_ceo/?callback=?',"firstname="+fname+"&lastname="+lname+"&emailID="+email+"&company="+comp+"&mobile_number="+mobile+"&company_address="+caddress+"&secretary_name="+secname+"&secretary_email="+secemail+"&secretary_phone="+secphone+"&password="+pwd+"",function(res){
					document.getElementById('addcio_result').innerHTML=res.Result;
					$('#addcio_result').show();
					resetform();
					
					
					});																																																																																	        		}
				if(error)
				{
					document.getElementById('addcio_result').innerHTML = error ;  
					$('#addcio_result').show().delay(4000).hide(0);
					
		
				}
		
		
  
}


function list_cio()
{
	cio(2);
	$("#vlist tbody").html("<img src=images/animated.gif width='50px' align=center>");		
$.getJSON('http://www.globalprompt.org/sg/cio/ceo/list_ceo/?callback=?' , function(array) {
    var tbl_body = "<tr><th>CIO ID</th><th>First Name</th><th>Last Name</th><th>Company</th><th>Email</th><th>Mobile</th><th>Password</th><th>Company Address</th><th>Secretary Name</th><th>Secretary Email</th><th>Secretary Phone</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].cID;
		i++;
		tbl_row += "<td><button class='btn btn-info'  onClick='set_cio_data("+id+")'>Edit</button></td>";
		  tbl_row += "<td><button class='btn btn-danger' onClick='delete_cio("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#vlist tbody").html(tbl_body);
});

}


function delete_cio(cid)
{
	var ciod=cid;
	document.getElementById('deletecio_result').innerHTML = "Deleting...";
	$('#deletecio_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/ceo/delete_ceo/'+ciod+'?callback=?',function(res){
   	list_cio();
   	document.getElementById('deletecio_result').innerHTML = res.Result;
	$('#deletecio_result').show();
	
	});
	
}	
/*function setCookie(cname, cvalue, exdays) {
    
    var expires = "expires="+exdays;
    document.cookie = cname + "=" + cvalue + "; " + expires;
} 
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
} */
function set_cio_data(cid)
 {
 	$.getJSON('http://www.globalprompt.org/sg/cio/ceo/get_ceo/?callback=?' ,"cid="+cid+"", function(array) {
		
		jQuery('#edit_cid').val(array.ceo_data.cID);
		jQuery('#edit_cfirstname').val(array.ceo_data.firstname);
		jQuery('#edit_clastname').val(array.ceo_data.lastname);
		jQuery('#edit_ccompany').val(array.ceo_data.company);
		jQuery('#edit_cemail').val(array.ceo_data.emailID);
		jQuery('#edit_cmobile').val(array.ceo_data.mobile_number);
		jQuery('#edit_caddress').val(array.ceo_data.company_address);
		jQuery('#edit_csecname').val(array.ceo_data.secretary_name);
		jQuery('#edit_csecemail').val(array.ceo_data.secretary_email);
		jQuery('#edit_csecphone').val(array.ceo_data.secretary_phone);
		cio(7);
	});
 }
 
 function edit_cio()
 {     
 		var error='';
 		var cid=document.getElementById('edit_cid').value;
 		var editfname=document.getElementById('edit_cfirstname').value;
		var editlname=document.getElementById('edit_clastname').value;
		var editcomp=document.getElementById('edit_ccompany').value;
		var editemail=document.getElementById('edit_cemail').value;
		var editmn=document.getElementById('edit_cmobile').value;
		var editcaddress=document.getElementById('edit_caddress').value;
		var editcsecname=document.getElementById('edit_csecname').value;
		var editcsecemail=document.getElementById('edit_csecemail').value;
		var editcsecphone=document.getElementById('edit_csecphone').value;
		if(editfname==''||editlname==''||editcomp==''||editemail==''||editmn==''||editcaddress==''||editcsecname==''||editcsecemail==''||editcsecphone=='')
		{
			error+='All fields are required';
		}
		
		else 
		{
		//alert(""+vid+"id Here");
			document.getElementById('editcio_result').innerHTML = "Updating...";  
			$('#editcio_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/ceo/edit_ceo/?callback=?',"edit_cid="+cid+"&edit_firstname="+editfname+"&edit_lastname="+editlname+"&edit_emailID="+editemail+"&edit_company="+editcomp+"&edit_mobile_number="+editmn+"&edit_company_address="+editcaddress+"&edit_secretary_name="+editcsecname+"&edit_secretary_email="+editcsecemail+"&edit_secretary_phone="+editcsecphone+"",function(res){
			document.getElementById('editcio_result').innerHTML=res.Result;
			$('#editcio_result').show();
		});
		}
		if(error)
		{
			document.getElementById('editcio_result').innerHTML = error;   
			$('#editcio_result').show().delay(4000).hide(0);
		}
		
		
 }


function add_vendor()
	{
		var error='';
		var fname=document.getElementById('vendor_firstname').value;
		var lname=document.getElementById('vendor_lastname').value;
		var email=document.getElementById('vendor_email').value;
		var comp=document.getElementById('vendor_company').value;
		var mn=document.getElementById('vendor_mobile').value;
		var bt=document.getElementById('vendor_btitle').value;
		var pwd=document.getElementById('vendor_password').value;
		var vpwd=document.getElementById('vendor_vpassword').value;
		if(fname==''||lname==''||email==''||comp==''||mn==''||bt==''||pwd=='')
		{
			error+='All fields are required';
		}
		else if(pwd!=vpwd)
		{
			error+='Password and Confirm Password must be same';
		}
		else if(!validate_email($('#email').val()))
		{
			error += 'Please enter valid Email-Id';
		}
		else
		{
			document.getElementById('addvendor_result').innerHTML = "Saving...";  
			$('#addvendor_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/add_vendor/?callback=?',"firstname="+fname+"&lastname="+lname+"&emailID="+email+"&company="+comp+"&mobile_number="+mn+"&business_title="+bt+"&password="+pwd+"",function(res){
			document.getElementById('addvendor_result').innerHTML=res.Result;
			$('#addvendor_result').show();
			resetform();
		});
		}
		if(error)
		{
			document.getElementById('addvendor_result').innerHTML =  error;  
			$('#addvendor_result').show().delay(2000).hide(0);

		}
}
function list_vendor()
{
	cio(4);
	$("#vendorlist tbody").html("<img src=images/animated.gif width='50px' align='center'>");	
$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/list_vendor/?callback=?' , function(array) {
	var tbl_body = "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Company</th><th>Business Title</th><th>Email ID</th><th>Mobile Number</th><th>Action</th><th>Delete</th></tr>";
   
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
		tbl_row += "<td><button  class='btn btn-info' onClick='set_vendor_data("+id+")'>Edit</button></td>";
		  tbl_row += "<td><button class='btn btn-danger' onClick='delete_vendor("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#vendorlist tbody").html(tbl_body);
});

}



function set_vendor_data(vid)
 {
 	$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/get_vendor/?callback=?' ,"vid="+vid+"", function(array) {
		
		jQuery('#edit_vid').val(array.vendor_data.vID);
		jQuery('#edit_fname').val(array.vendor_data.firstname);
		jQuery('#edit_lname').val(array.vendor_data.lastname);
		jQuery('#edit_cmp').val(array.vendor_data.company);
		jQuery('#edit_emailID').val(array.vendor_data.emailID);
		jQuery('#edit_bt').val(array.vendor_data.business_title);
		jQuery('#edit_mnumber').val(array.vendor_data.mobile_number);
		cio(8);	
	});
 }
 function edit_vendor()
 {     
 		var error='';
 		var vid=document.getElementById('edit_vid').value;
 		var editfname=document.getElementById('edit_fname').value;
		var editlname=document.getElementById('edit_lname').value;
		var editemail=document.getElementById('edit_emailID').value;
		var editcomp=document.getElementById('edit_cmp').value;
		var editmn=document.getElementById('edit_mnumber').value;
		var editbt=document.getElementById('edit_bt').value;
		
		//alert(""+vid+"id Here");
		if(editfname==''||editlname==''||editemail==''||editcomp==''||editmn==''||editbt=='')
		{
			error+='All fields are required';
		}
		
		else
		{
				document.getElementById('editvendor_result').innerHTML="Updating..."; 
				$('#editvendor_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/edit_vendor/?callback=?',"edit_vid="+vid+"&edit_firstname="+editfname+"&edit_lastname="+editlname+"&edit_emailID="+editemail+"&edit_company="+editcomp+"&edit_mobile_number="+editmn+"&edit_business_title="+editbt+"",function(res){
				document.getElementById('editvendor_result').innerHTML=res.Result; 
				$('#editvendor_result').show();
				
			});
		}
		if(error)
		{
			document.getElementById('editvendor_result').innerHTML = error;   
			$('#editvendor_result').show().delay(4000).hide(0);
		}
		
 }

function delete_vendor(vid)
{
	var viod=vid;
	document.getElementById('deletevendor_result').innerHTML = "Deleting...";
	$('#deletevendor_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/vendor2/delete_vendor/'+viod+'?callback=?',function(res){
	
    list_vendor();
    document.getElementById('deletevendor_result').innerHTML = res.Result;
	$('#deletevendor_result').show();
	});
	
}	

function add_parent_company()
	{
		var error='';
		var parent_company_name=document.getElementById('parent_company_name').value;
		var parent_domain_name=document.getElementById('parent_domain_name').value;
		var parent_company_country=document.getElementById('parent_company_country').value;
		if(parent_company_name==''||parent_domain_name==''||parent_company_country=='')
		{
			error+='All fields are required';
		}
		else
		{
				document.getElementById('add_parent_company_result').innerHTML =  "Saving...";  
				$('#add_parent_company_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/add_parent_company/?callback=?',"parent_company_name="+parent_company_name+"&parent_domain_name="+parent_domain_name+"&parent_company_country="+parent_company_country+"",function(res){
				document.getElementById('add_parent_company_result').innerHTML=res.Result;
				$('#add_parent_company_result').show();
				resetform();
				
			});
		}
		if(error)
		{
			document.getElementById('add_parent_company_result').innerHTML =  error;  
			$('#add_parent_company_result').show().delay(2000).hide(0);
		}
		
}

function list_parent_company()
{
		cio(6);
	$("#plist tbody").html("<img src=images/animated.gif width='50px' align='center'>");
$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/list_parent_company/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>Company Name</th><th>Company Domain</th><th>Country</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].pID;
		i++;
		tbl_row += "<td><button class='btn btn-info'  onClick='set_pcompany_data("+id+")'>Edit</button></td>";
		  tbl_row += "<td><button class='btn btn-danger' onClick='delete_pcompany("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#plist tbody").html(tbl_body);
});

}
function delete_pcompany(pcid)
{
    var piod=pcid;
	document.getElementById('deletepcompany_result').innerHTML = "Deleting...";
	$('#deletepcompany_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/delete_parent_company/'+piod+'?callback=?',function(res){
    list_parent_company();
    document.getElementById('deletepcompany_result').innerHTML = res.Result;
	$('#deletepcompany_result').show();
	});
	
}	

function set_pcompany_data(pid)
 {
	
 	$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/get_parent_company/?callback=?' ,"pid="+pid+"", function(array) {
		
		jQuery('#edit_parent_id').val(array.pc_data.pID);
		jQuery('#edit_parent_company_name').val(array.pc_data.name);
		jQuery('#edit_parent_domain_name').val(array.pc_data.domain_name);
		jQuery('#edit_parent_company_country').val(array.pc_data.country);
		/* document.getElementById("list_parent_company").style.display="none";
		$("#edit_parent_company").show();*/
		cio(9);
	});
 }
 function edit_parent_company()
 {     
 		var error='';
 		var edit_parent_id=document.getElementById('edit_parent_id').value;
 		var edit_parent_company_name=document.getElementById('edit_parent_company_name').value;
		var edit_parent_domain_name=document.getElementById('edit_parent_domain_name').value;
		var edit_parent_company_country=document.getElementById('edit_parent_company_country').value;
		if(edit_parent_company_name==''||edit_parent_domain_name==''||edit_parent_company_country=='')
		{
			error+='All fields are required';
		}
		else
		{	
				document.getElementById('editpc_result').innerHTML ="Updating...";
				$('#editpc_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/edit_parent_company/?callback=?',"edit_pid="+edit_parent_id+"&edit_parent_company_name="+		   edit_parent_company_name+"&edit_parent_domain_name="+edit_parent_domain_name+"&edit_parent_company_country="+edit_parent_company_country+"",function(res){
				document.getElementById('editpc_result').innerHTML=res.Result;   
				$('#editpc_result').show();
				
			});
		}
		if(error)
		{
			document.getElementById('editpc_result').innerHTML = error;
			$('#editpc_result').show().delay(4000).hide(0);
		}
		
 }
function show_parent(h)
{
		$("#parentc_"+h).html("Loading...");	
	$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/list_parent_company/?callback=?' , function(array) {
		 var sel_body = "";
		  var optn = "";
		 var name='';
		var i=0;	
		var pID='';
		optn += "<option>Select</option></td>";
		 $.each(array, function(key,val) {
     
        $.each(this, function(k , v) {
          
      
        })
		 name=array[i].name;
		 pID=array[i].pID;
		i++;
		
		optn += "<option value="+pID+">"+name+"</option></td>"; 
      
              
    })
	sel_body += "<select onChange='get_parent_id(this.value);' style='height:40px;width:360px;'>"+optn+"</select>";
	
	//document.getElementById('parentc').html(sel_body);
   	$("#parentc_"+h).html(sel_body);
		
	});
}
function add_regional_company()
{
	var error='';
	var regional_company_name=document.getElementById('regional_company_name').value;
	var regional_domain_name=document.getElementById('regional_domain_name').value;
	var regional_company_country=document.getElementById('regional_company_country').value;
	var regional_parent_company_ID=document.getElementById('parentID').value;
	if(regional_company_name==''||regional_domain_name==''||regional_company_country=='')
	{
		error+='All fields are required';
	}
	else
	{	
			document.getElementById('add_regional_company_result').innerHTML ="Saving...";
			$('#add_regional_company_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/add_regional_company/?callback=?',"regional_company_name="+regional_company_name+"&regional_domain_name="+regional_domain_name+"&regional_company_country="+regional_company_country+"&regional_primary_company="+regional_parent_company_ID+"",function(res){
			document.getElementById('add_regional_company_result').innerHTML= res.Result;   
			$('#add_regional_company_result').show();
			resetform();
			
		});
	}
	if(error)
	{
		document.getElementById('add_regional_company_result').innerHTML =error;
		$('#add_regional_company_result').show().delay(4000).hide(0);

	}
}
function get_parent_id(pid)
{
	//alert(pid);
	jQuery('#parentID').val(pid);
	jQuery('#editparentid').val(pid);
	
}


function list_regional_company()
{
		cio(11);
		
		$("#rlist tbody").html("<img src=images/animated.gif width='50px' align='center'>");
$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/list_regional_company/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>Company Name</th><th>Company Domain</th><th>Country</th><th>Parent Company</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].rID;
		i++;
		tbl_row += "<td><button class='btn btn-info'  onClick='set_rcompany_data("+id+");show_parent(2);'>Edit</button></td>";
		  tbl_row += "<td><button class='btn btn-danger' onClick='delete_rcompany("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#rlist tbody").html(tbl_body);
});

}
function set_rcompany_data(rid)
 {
	
 	$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/get_regional_company/?callback=?' ,"rid="+rid+"", function(array) {
		
		jQuery('#edit_regional_id').val(array.rc_data.rID);
		jQuery('#edit_regional_company_name').val(array.rc_data.name);
		jQuery('#edit_regional_domain_name').val(array.rc_data.domain_name);
		jQuery('#edit_regional_company_country').val(array.rc_data.country);
		
		cio(12);
	});
 }
 
 function edit_regional_company()
 {     
 		var error='';
 		var edit_regional_id=document.getElementById('edit_regional_id').value;
 		var edit_regional_company_name=document.getElementById('edit_regional_company_name').value;
		var edit_regional_domain_name=document.getElementById('edit_regional_domain_name').value;
		var edit_regional_company_country=document.getElementById('edit_regional_company_country').value;
		var editparentid=document.getElementById('editparentid').value;
		if(edit_regional_company_name==''||edit_regional_domain_name==''||edit_regional_company_country=='')
		{
			error+='All fields are required';
		}
		else
		{	
			document.getElementById('editrc_result').innerHTML = "Updating...";
			$('#editrc_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/edit_regional_company/?callback=?',"edit_rid="+edit_regional_id+"&edit_regional_company_name="+edit_regional_company_name+"&edit_regional_domain_name="+edit_regional_domain_name+"&edit_regional_company_country="+edit_regional_company_country+"&edit_regional_parent_company="+editparentid+"",function(res){
				document.getElementById('editrc_result').innerHTML=res.Result;   
				$('#editrc_result').show();
				
			});
		  }
		  if(error)
		  {
			document.getElementById('editrc_result').innerHTML = error;
			$('#editrc_result').show().delay(4000).hide(0);

		  }
 }
 function delete_rcompany(rcid)
{
    var riod=rcid;
	document.getElementById('deletercompany_result').innerHTML = "Deleting...";
	$('#deletercompany_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/manage_companies/delete_regional_company/'+riod+'?callback=?',function(res){
    list_regional_company();
    document.getElementById('deletercompany_result').innerHTML = res.Result;
	$('#deletercompany_result').show();
	});
	
}	


function add_category()
	{
		var error='';
		var cat_name=document.getElementById('cat_name').value;
		var cat_desc=document.getElementById('cat_desc').value;
		
		if(cat_name=='')
		{
			error+='Category name required';
		}
		else
		{
				document.getElementById('add_category_result').innerHTML =  "Saving...";  
				$('#add_category_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/category/add_category/?callback=?',"cat_name="+cat_name+"&cat_desc="+cat_desc+"",function(res){
				document.getElementById('add_category_result').innerHTML=res.Result;
				$('#add_category_result').show();
				jQuery('#cat_desc').val('');
				
				resetform();
				
				
			});
		}
		if(error)
		{
			document.getElementById('add_category_result').innerHTML =  error;  
			$('#add_category_result').show().delay(2000).hide(0);
			
		}
		
				
		
		
}
function resetform()
{
	var x=document.getElementsByTagName("input");
		for(var i=0;i<=x.length;i++)
		{
			x[i].value = '';
               
		}
		
}
function list_category()
{
		cio(14);
		
		$("#catlist tbody").html("<img src=images/animated.gif width='50px' align='center'>");
$.getJSON('http://www.globalprompt.org/sg/cio/category/list_category/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>Category Name</th><th>Category Description</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].catID;
		i++;
		tbl_row += "<td><button class='btn btn-info' onClick='set_category_data("+id+");'>Edit</button></td>";
		tbl_row += "<td><button class='btn btn-danger' onClick='delete_category("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#catlist tbody").html(tbl_body);
});

}

function set_category_data(catid)
 {
	
 	$.getJSON('http://www.globalprompt.org/sg/cio/category/get_category/?callback=?' ,"catid="+catid+"", function(array) {
	
		jQuery('#edit_cat_name').val(array.cat_data.cat_name);
		jQuery('#edit_cat_desc').val(array.cat_data.cat_description);
		jQuery('#edit_cat_ID').val(array.cat_data.catID);
		
		cio(17);
	});
 }
 function edit_category()
 {     
 		var error='';
 		var edit_cat_name=document.getElementById('edit_cat_name').value;
 		var edit_cat_desc=document.getElementById('edit_cat_desc').value;
		var edit_cat_ID=document.getElementById('edit_cat_ID').value;
		
		if(edit_cat_name=='')
		{
			error+='Category name required';
		}
		else
		{	
			document.getElementById('edit_category_result').innerHTML = "Updating...";
			$('#edit_category_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/category/edit_category/?callback=?',"edit_cat_ID="+edit_cat_ID+"&edit_cat_name="+edit_cat_name+"&edit_cat_desc="+edit_cat_desc+"",function(res){
				document.getElementById('edit_category_result').innerHTML=res.Result;   
				$('#edit_category_result').show();
				
			});
		  }
		  if(error)
		  {
			document.getElementById('edit_category_result').innerHTML = error;
			$('#edit_category_result').show().delay(4000).hide(0);

		  }
 }
function delete_category(catid)
{
    var catid=catid;
	document.getElementById('deletecategory_result').innerHTML = "Deleting...";
	$('#deletecategory_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/category/delete_category/'+catid+'?callback=?',function(res){
    list_category();
   	document.getElementById('deletecategory_result').innerHTML = res.Result;
	$('#deletecategory_result').show();
	});
	
}	

function add_item()
	{
		var error='';
		var item_name=document.getElementById('item_name').value;
		var category=document.getElementById('category').value;
		var item_desc=document.getElementById('item_desc').value;
		
	
		if(item_name=='')
		{
			error+='Item name required';
		}
		else
		{
				document.getElementById('add_item_result').innerHTML =  "Saving...";  
				$('#add_item_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/category/add_item/?callback=?',"item_name="+item_name+"&item_desc="+item_desc+"&category="+category+"",function(res){
				document.getElementById('add_item_result').innerHTML=res.Result;
				$('#add_item_result').show();
				jQuery('#item_desc').val('');
				resetform();
				
			});
		}
		if(error)
		{
			document.getElementById('add_item_result').innerHTML =  error;  
			$('#add_item_result').show().delay(2000).hide(0);
		}
		
}

function show_category(h)
{
		$("#cat_opt_"+h).html("Loading...");	
	$.getJSON('http://www.globalprompt.org/sg/cio/category/list_category/?callback=?' , function(array) {
		 var sel_body = "";
		  var optn = "";
		 var name='';
		var i=0;	
		var catID='';
		optn += "<option>Select</option></td>";
		 $.each(array, function(key,val) {
     
        $.each(this, function(k , v) {
          
      
        })
		 name=array[i].cat_name;
		 catID=array[i].catID;
		i++;
		 
		optn += "<option value="+catID+">"+name+"</option></td>"; 
      
              
    })
		 
	sel_body += "<select onChange='get_category_id(this.value);' style='height:40px;width:350px;'>"+optn+"</select>";
	
	//document.getElementById('parentc').html(sel_body);
   	$("#cat_opt_"+h).html(sel_body);
		
	});
}
function get_category_id(catID)
{
		
	jQuery('#category').val(catID);
	jQuery('#edit_category').val(catID);
	
}

function list_item()
{
		cio(16);
		
		$("#itemlist tbody").html("<img src=images/animated.gif width='50px' align='center'>");
$.getJSON('http://www.globalprompt.org/sg/cio/category/list_item/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>Item Name</th><th>Category</th><th>Item Description</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].item_ID;
		i++;
		tbl_row += "<td><button class='btn btn-info' onClick='set_item_data("+id+");show_category(2)'>Edit</button></td>";
		tbl_row += "<td><button class='btn btn-danger' onClick='delete_item("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#itemlist tbody").html(tbl_body);
});

}
function set_item_data(itemid)
 {
	
 	$.getJSON('http://www.globalprompt.org/sg/cio/category/get_item/?callback=?' ,"itemid="+itemid+"", function(array) {
	
		jQuery('#edit_item_name').val(array.item_data.item_name);
		jQuery('#edit_item_desc').val(array.item_data.item_description);
		jQuery('#edit_item_ID').val(array.item_data.item_ID);
		
		cio(18);
	});
 }
  function edit_item()
 {     
 		var error='';
 		var edit_item_name=document.getElementById('edit_item_name').value;
 		var edit_item_desc=document.getElementById('edit_item_desc').value;
		var edit_item_ID=document.getElementById('edit_item_ID').value;
		var edit_category=document.getElementById('edit_category').value;
		
		if(edit_item_name=='')
		{
			error+='item name required';
		}
		else
		{	
			document.getElementById('edit_item_result').innerHTML = "Updating...";
			$('#edit_item_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/category/edit_item/?callback=?',"edit_item_ID="+edit_item_ID+"&edit_item_name="+edit_item_name+"&edit_item_desc="+edit_item_desc+"&edit_category="+edit_category+"",function(res){
				document.getElementById('edit_item_result').innerHTML=res.Result;   
				$('#edit_item_result').show();
				
			});
		  }
		  if(error)
		  {
			document.getElementById('edit_item_result').innerHTML = error;
			$('#edit_item_result').show().delay(4000).hide(0);

		  }
 }
 function delete_item(itemid)
{
    var catid=catid;
	document.getElementById('delete_item_result').innerHTML = "Deleting...";
	$('#delete_item_result').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/category/delete_item/'+itemid+'?callback=?',function(res){
    list_item();
	document.getElementById('delete_item_result').innerHTML=res.Result;   
   $('#delete_item_result').show();
	});
	
}	
function add_currency()
	{
		var error='';
		var country_code=document.getElementById('country_code').value;
		var currency=document.getElementById('currency').value;
		var conversion_rate=document.getElementById('conversion_rate').value;
		
	
		if(country_code==''||currency==''||conversion_rate=='')
		{
			error+='All fields are required';
		}
		else
		{
				document.getElementById('add_currency_result').innerHTML =  "Saving...";  
				$('#add_currency_result').show().delay(5000).hide(0);
				$.getJSON('http://www.globalprompt.org/sg/cio/manage_currency/add_currency/?callback=?',"country_code="+country_code+"&currency="+currency+"&conversion_rate="+conversion_rate+"",function(res){
				document.getElementById('add_currency_result').innerHTML=res.Result;
				$('#add_currency_result').show();
				
				resetform();
				
			});
		}
		if(error)
		{
			document.getElementById('add_currency_result').innerHTML =  error;  
			$('#add_currency_result').show().delay(2000).hide(0);
		}
		
}
function list_currency()
{
		cio(20);
		
		$("#currencylist tbody").html("<img src=images/animated.gif width='50px' align='center'>");
$.getJSON('http://www.globalprompt.org/sg/cio/manage_currency/list_currency/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>Country Code</th><th>Currency Label</th><th>Conversion Rate</th><th>Action</th><th>Delete</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].curr_ID;
		i++;
		tbl_row += "<td><button class='btn btn-info' onClick='set_currency_data("+id+")'>Edit</button></td>";
		tbl_row += "<td><button class='btn btn-danger' onClick='delete_currency("+id+")'>Delete</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#currencylist tbody").html(tbl_body);
});

}
function edit_currency()
 {     
 		var error='';
 		var edit_country_code=document.getElementById('edit_country_code').value;
		var edit_currency_id=document.getElementById('edit_currency_id').value;
 		var edit_currency=document.getElementById('edit_currency').value;
		var edit_conversion_rate=document.getElementById('edit_conversion_rate').value;
		
		if(edit_country_code==''||edit_currency==''||edit_conversion_rate=='')
		{
			error+='All fields are required';
		}
		else
		{	
			document.getElementById('edit_currency_result').innerHTML = "Updating...";
			$('#edit_currency_result').show().delay(5000).hide(0);
			$.getJSON('http://www.globalprompt.org/sg/cio/manage_currency/edit_currency/?callback=?',"edit_currency_id="+edit_currency_id+"&edit_country_code="+edit_country_code+"&edit_currency="+edit_currency+"&edit_conversion_rate="+edit_conversion_rate+"",function(res){
				document.getElementById('edit_currency_result').innerHTML=res.Result;   
				$('#edit_currency_result').show();
				
			});
		  }
		  if(error)
		  {
			document.getElementById('edit_currency_result').innerHTML = error;
			$('#edit_currency_result').show().delay(4000).hide(0);

		  }
 }
 function set_currency_data(currid)
 {
	
 	$.getJSON('http://www.globalprompt.org/sg/cio/manage_currency/get_currency/?callback=?' ,"currid="+currid+"", function(array) {
	
		jQuery('#edit_country_code').val(array.curr_data.country_code);
		jQuery('#edit_currency_id').val(array.curr_data.curr_ID);
		jQuery('#edit_currency').val(array.curr_data.currency_label);
		jQuery('#edit_conversion_rate').val(array.curr_data.conversion_rate);
		
		cio(21);
	});
 }
  function delete_currency(currid)
{
    
	document.getElementById('delete_currency').innerHTML = "Deleting...";
	$('#delete_currency').show().delay(5000).hide(0);
	$.getJSON('http://www.globalprompt.org/sg/cio/manage_currency/delete_currency/'+currid+'?callback=?',function(res){
    list_currency();
	document.getElementById('delete_currency').innerHTML=res.Result;   
   $('#delete_currency').show();
	});
	
}	


function list_pending_vendor()
{
	cio(22);
	$("#pending_user tbody").html("<img src=images/animated.gif width='50px' align=center>");		
$.getJSON('http://www.globalprompt.org/sg/cio/category/list_pending_vendor/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Status</th><th>Action</th><th>Decline</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
	
    $.each(array, function(key,val) {
        tbl_row = "";
        $.each(this, function(k , v) {
		
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].cID;
		i++;
		
		tbl_row += "<td><button class='btn btn-info'  onClick='accept_vendor("+id+")'>Accept</button></td><td><button class='btn btn-danger' onClick='delete_cio("+id+")'>Decline</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#pending_user tbody").html(tbl_body);
});

}
function list_pending_cio()
{
	cio(23);
	$("#pending_cio tbody").html("<img src=images/animated.gif width='50px' align=center>");		
$.getJSON('http://www.globalprompt.org/sg/cio/category/list_pending_cio/?callback=?' , function(array) {
    var tbl_body = "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Status</th><th>Action</th><th>Decline</th></tr>";


	var id='';
	var i=0;
    var odd_even = false;
	
    $.each(array, function(key,val) {
        tbl_row = "";
        $.each(this, function(k , v) {
		
            tbl_row += "<td>"+v+"</td>";
        
        })
		id=array[i].cID;
		i++;
		
		tbl_row += "<td><button class='btn btn-info'  onClick='accept_cio("+id+")'>Accept</button></td><td><button class='btn btn-danger' onClick='delete_cio("+id+")'>Decline</button></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even;               
    })
    $("#pending_cio tbody").html(tbl_body);
});

}
function accept_cio(cid)
{
	$.getJSON('http://www.globalprompt.org/sg/cio/category/accept_cio/?callback=?' ,"cid="+cid+"",function(array) {
		
				mail_cio(array.email_data.firstname,array.email_data.emailID,array.email_data.registration_type,array.email_data.password,cid);
		
	});
}
function mail_cio(firstname,emailID,registration_type,password,cid)
{
	$.post("activation_link2.php" ,{'name':firstname ,'email':emailID,'reg_type':registration_type,'pass':password}).done(function( data ) {   
																																																					
							if(data=="OK")
							{
								$.getJSON('http://www.globalprompt.org/sg/cio/category/cio_accepted/?callback=?' ,"cid="+cid+"",function(array) {
									 list_pending_cio();
									 });
							}
																																																			
	 });
}
function accept_vendor(vid)
{
	$.getJSON('http://www.globalprompt.org/sg/cio/category/accept_vendor/?callback=?' ,"cid="+cid+"",function(array) {
		
				mail_vendor(array.email_data.firstname,array.email_data.emailID,array.email_data.registration_type,array.email_data.password,vid);
		
	});
}
function mail_vendor(firstname,emailID,registration_type,password,vid)
{
		document.getElementById('pvlist').innerHTML="Working...";   
	$.post("vendor_activation.php" ,{'name':firstname ,'email':emailID,'reg_type':registration_type,'pass':password}).done(function( data ) {   
																																																					
							if(data=="OK")
							{
								$.getJSON('http://www.globalprompt.org/sg/cio/category/vendor_accepted/?callback=?' ,"cid="+cid+"",function(array) {
									list_pending_vendor();
									document.getElementById('pvlist').innerHTML=array.result;   
  									 $('#pvlist').show();pclist
									 
									 });
							}
																																																			
	 });
}