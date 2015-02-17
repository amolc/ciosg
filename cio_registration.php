<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link rel="icon" type="image/png" href="http://cio.fountaintechies.com/cxo_fav_ico.png">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script>

function validate()
{
	var pass1 = document.forms["register_venor"]["pwd"].value;
    var pass2 = document.forms["register_venor"]["rtype"].value;
	 if (pass1 != pass2) {
        
		alert("Confirm Password does Not Match");
        return false;
    } 
	
	var x = document.forms["register_venor"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
	
	var mobile = document.forms["register_venor"]["mobile"].value;
	 
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
	else if(document.getElementById('mobile').value.length<=12)  
	{  
	  return true;  
	}  
	else  
	{  
		alert("Mobile Number is not greater than 12 Digit");  
		return false;  
	}  
	
	
    
	
}

</script>


</head>

<body>
							     <?php
													include('sql_config/database/cio_db.php'); 
													include('top_header.php');
													include('header.php');
														
									?>
                                       
					<?php
						session_start();
						if(isset($_SESSION['user_name']))
						{ 
							$username = $_SESSION['user_name'];
					?>	
							<li><a href=""></a></li>
							<a href="logout.php"><img src="images/login_icon.png" width="12" height="16">LOGOUT</a>
							<a href="#" class="border"><img src="images/register_icon.png" width="12" height="16"><?php echo strtoupper($username); ?></a>

					<?php
						}
						else
						{
					?>
							
							
					<?php

						}
					?>
	
	  
	
	

                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
										
										<div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  
                                                  <div class="contact_details_2 fl">
                                                  
                                                    <a href="cio_login.php">Login</a> 
													<a href="cio_registration.php" class="active">Registration</a>
													<br />
																				
													
                                                  </div>
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  	
                                                  
												   
													<div class="contact_form fr" > 
															<form name="register_venor" action="cio_sucess.php" method="post" onSubmit="return validate();">
                                                            	
                                                              <label> First name</label>
                                                                <input style="font-size: 15px;" name="fname" type="text" required>
                                                              <label> Last name</label>
                                                                <input style="font-size: 15px;" name="lname" type="text" required>
															  <label> Company</label>
                                                                <input style="font-size: 15px;" name="company" type="text" required>
																<label> Mobile No.</label>
                                                                <input style="font-size: 15px;" name="mobile" type="text" id="mobile"required >
																<label> Email</label>
                                                                <input style="font-size: 15px;" name="email" type="text" required>
															   <label> Password</label>
                                                                <input style="font-size: 15px;" name="pwd" type="password" required>
															   <label>Confirm Password</label>
                                                                <input style="font-size: 15px;" name="rtype" type="password" required>
												
                                                                <input value="Register" style="margin-left: 10px;" name="submit" type="submit">
																</form>
															</div>
																						
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
										
										
                                            
                                                  	
                                                    <?php
													if($_POST['submit'] == "SIGN IN")
													{
					
													// username and password sent from form
														$username = $_POST['username'];
														$password = $_POST['password'];

														

														$sql="SELECT * FROM all_users WHERE emailID = '$username' and password='$password' and registration_type='CIO' and registration_status='accepted' and login_type='email'";
														$rs = mysql_query($sql) or die ("Query failed");

														
														$row = mysql_fetch_array($rs);

														if($row['emailID'] == $username && $row['password'] == $password)
														{
														
															if($row['registration_type']=='CIO') 
															{
																session_start();
																// store session data
																$_SESSION['username']=$username;
																$_SESSION['firstname']=$row['firstname'];
																$_SESSION['lastname']=$row['lastname'];
																$_SESSION['cio']=$row['registration_type'];
																$_SESSION['emailID']=$row['emailID'];
																$_SESSION['type']='cio_landing.php';
																header("location:cio_landing.php?action=yes");
															 
															}
															else if($row['registration_type']=='ICTVendor') 
															{
																
																header("location:login.php?wrong=yes");
															}
															
														}
														else {
															header("location:login.php?wrong=yes");
															
														}
															
														
													}
																										
													else 
													{ 
													?>
													
													
													<?php
														if(isset($_REQUEST['wrong']))
															{
																echo "<h1 style='color: #F00;'>The Username or password you entered is incorrect , please try again</h1>";
															}
													?>
													
													
													 
                                                    	
														
                                                        	
														
														
														
														
														
														
														
														
														
                                                       	  
                                                            
                                                            
                                                    
                                                  
												  
                                                  <?php
												  
												  }
												  ?>
                                                
                                                
											<?php 
           
											include('quick_contact.php');
											include('footer.php');
											
											 ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script>



    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$("#content_6").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
				$("#content_7").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
			});
		})(jQuery);
	</script>

<script>
$("#accordion > li").click(function(){
  $("#accordion li").removeClass("active");
        $(this).addClass("active");
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

$('#accordion > ul:eq(0)').show();

</script>

</body>
</html>
