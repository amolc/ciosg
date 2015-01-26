<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>




</head>

<body>
							     <?php
													include('sql_config/database/cio_db.php'); 
														// include('top_header.php');
														
									?>
                                        <div id="top_wrapper">
	<div class="top_container">
	<div class="top_login fl">
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
							
							<a href="registration.php" class="border"><img src="images/register_icon.png" width="12" height="16">REGISTER</a>
					<?php

						}
					?>
	
	  
	
	</div>
	  <div class="social_media fr">
		<!--<p>CONNECT WITH US</p>-->
			<span>
				<a href="http://www.linkedin.com/company/cio-choice-singapore/" title="Linkedin" target="_blank"><img src="images/linkedin.png" alt="Linkedin" title="Linkedin" width="30" height="31"></a>
				<a href="https://twitter.com/CIOCHOICE_SG" title="Twitter" target="_blank"><img src="images/twitter.png" width="30" height="31"></a>
				<a href="https://plus.google.com/+CiochoiceSg1/posts" title="Google Plus" target="_blank"><img src="images/google_plus.png" alt="" width="30" height="31"></a>
				<a href="https://www.facebook.com/ciochoice.sg" title="Facebook" target="_blank"><img src="images/facebook.png" width="30" height="31"></a>
				<a href="http://www.youtube.com/user/CIOCHOICEsingapore" title="Youtube" target="_blank" style="margin-right:0;"><img src="images/play.png" width="30" height="31"></a>
			</span> 
		</div>
	</div>
</div>
<div style="width:100%; height:49px;"></div>


                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch" style="margin-top:15px;">
                                                  <div class="login_main fl">
                                                  	<div class="login_header fl">
                                               	    	<img width="961" height="219" alt="" src="images/register/login-logo.jpg">
                                                    </div>
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
																session_start();
																// store session data
																$_SESSION['username']=$username; 
																$_SESSION['user_name']=$row['registration_name'];
																$_SESSION['ict']=$row['registration_type'];
																$_SESSION['type']='ict_vendor_landing.php';
																$_SESSION['corperate_email']=$row['corperate_email'];
																header("location:ict_vendor_landing.php?action=yes");
															}
															
														}
														else {
															header("location:login.php?wrong=yes");
															// echo "<h1>The UserName or password you entered is incorrect , please rry again</h1>";
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
													
													<div style="text-align: center;float: left;width: 100%;line-height: 40px;height: 40px;color: #20201F;display: block;font-size: 30px;font-weight: bold;">
														 Please use your preferred method of login...
													</div>
													<?php
														if(isset($_REQUEST['wrong']))
															{
																echo "<h1 style='color: #F00;'>The Username or password you entered is incorrect , please try again</h1>";
															}
													?>
													 <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
                                                    	<div class="login_form fl">
                                                        	<div class="login_box fl">
                                                            	<h1>Login using your<br>Username & Password</h1>
                                                              <label> Username</label>
                                                                <input style="font-size: 20px;" name="username" type="email" required>
                                                              <label>Password</label> 
                                                                <input name="password" type="password" required>
																	<a style="color: #FFFFFF; float: left; margin-left: 86px;text-decoration: underline;    width: 222px;" href="forgot_password.php">Forgot your password ?</a>
                                                                <input value="SIGN IN" style="margin-left: 10px;" name="submit" type="submit">
                                                        </div>
                                                       	  <div class="sign_in fr">
                                                           	<h2>Sign in with your account on:</h2>
                                                              <p><a href="auth.php"><img src="images/linkedin_btn.png" width="410" height="70"></a></p>
                                                            </div>
                                                            
                                                            <div style="text-decoration: underline;" class="register_now fl"><img style="margin-right: 10px;" src="images/grey_star.jpg" alt="" /> <a style="color: #616161;text-decoration: underline;" href="registration.php">Not a member? register now!</a><img style="margin-left: 10px;"  src="images/grey_star.jpg" alt="" /></div>
                                                    
                                                  </div>
												  </form>
                                                  <?php
												  
												  }
												  ?>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        	</div>
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
