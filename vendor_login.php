<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
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
	var phoneno = /^\d{12}$/;  
	
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
<script>
function passwordvalid()
{

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
							
							<!--<a href="registration.php" class="border"><img src="images/register_icon.png" width="12" height="16">REGISTER</a>-->
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
                                                  	
                                                    <a href="vendor_login.php" class="active">Login</a>
													<a href="vendor_registration.php">Registration</a> 
													<br />
																				
													
                                                  </div>
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  	<div class="contact_address fl" style="height:auto;">
                                                     <span>Login as a Vendor</span>
                                                      <p>Subscribe and get visibility with CIO's in Singapore</p>
                                                    </div>
                                                    <?php
														if(isset($_REQUEST['wrong']))
															{
																echo "<h2 style='color: #F00;padding:15px;'>The Username or password you entered is incorrect , please try again</h2>";
															}
													?>
                                                  
                                                         <div class="contact_form fr">
														 <form action="vendor_sucess.php" method="post">
                                                            	
                                                              <label> Username</label>
                                                                <input name="username" type="text" required>
                                                              <label>Password</label> 
                                                                <input name="password" type="password" required>
																
																	<a style="color: #FFFFFF; float: left; margin-left: 138px;text-decoration: underline;    width: 222px;" href="forgot_password.php">Forgot your password ?</a>
                                                                <input value="SIGN IN" style="margin-left: 10px;" name="submit" type="submit">
																</form>
                                                        </div>
																						
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                       </form>
									   
									                          
                                                  	
                                                    
													
													
													 
                                                    	
														
														
														
														<?php
													if($_POST['submit'] == "SIGN IN")
													{
					
													// username and password sent from form
														$username = $_POST['username'];
														$password = $_POST['password'];

														// $username = strip_tags(stripslashes(mysql_real_escape_string($username)));
														// $password = sha1(strip_tags(stripslashes(mysql_real_escape_string($password))));

														$sql="SELECT * FROM registration WHERE registration_email = '$username' and registration_password='$password' and registration_status='accepted' and login_type='email'";
														$rs = mysql_query($sql) or die ("Query failed");

														// $numofrows = mysql_num_rows($rs);
														$row = mysql_fetch_array($rs);

														if($row['registration_email'] == $username && $row['registration_password'] == $password)
														{ 
														// if($numofrows > 0){
															// session_register("username");
															// echo $row['registration_type'];
															if($row['registration_type']=='CIO') 
															{
																session_start();
																// store session data
																$_SESSION['username']=$username;
																$_SESSION['user_name']=$row['registration_name'];
																$_SESSION['cio']=$row['registration_type'];
																$_SESSION['corperate_email']=$row['corperate_email'];
																$_SESSION['type']='cio_landing.php';
																header("location:cio_landing.php?action=yes");
															 
															}
															else if($row['registration_type']=='ICTVendor') 
															{
																/*session_start();
																// store session data
																$_SESSION['username']=$username; 
																$_SESSION['user_name']=$row['registration_name'];
																$_SESSION['ict']=$row['registration_type'];
																$_SESSION['type']='ict_vendor_landing.php';
																$_SESSION['corperate_email']=$row['corperate_email'];
																header("location:ict_vendor_landing.php?action=yes");*/
																header("location:login.php?wrong=yes");
															}
															
														}
														else {
														
															header("location:login.php?wrong=yes");
														 echo "<h1 style='color: #DC3522;'>The UserName or password you entered is incorrect , please try again</h1>";
														
														
														
														}
															// $sql = mysql_query('SELECT * FROM registration where registration_email ="'.$username.'" AND registration_password ="'.$password.'"');


																	// $row = mysql_fetch_array($sql);

																	// if($row['registration_email'] == $name && $row['registration_password'] == $password)
																		// {
																			
																			// session_start();
																			// $_SESSION['user_name'] = $row['username'];
																			 // header("location:advisory_detail.php?action=yes");
																			
																		// }
																		// else 
																		// {
																			 // echo "<h1>user name wrong</h1>";
																		// } 
														
													}
																										
													else 
													{ 
													?>
													
													<!--<div style="text-align: center;float: left;width: 100%;line-height: 40px;height: 40px;color: #20201F;display: block;font-size: 30px;font-weight: bold;">
														 Please use your preferred method of login...
													</div>-->
													
														
														
														
														
														
														
														
                                                       	  
                                                            
                                                            
                                                    
                                                  
												  
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
