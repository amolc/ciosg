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
<?php if($_POST){ 





?>
							     <?php
													include('sql_config/database/cio_db.php'); 
													//include('top_header.php');
													//include('header.php');
														
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
							
							<!--<a href="registration.php" class="border"><img src="images/register_icon.png" width="12" height="16">REGISTER</a>-->
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
<?php 

if(!isset($_SESSION['user_name']))
{ 

	include('header.php');
	
}	
?>


                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch" style="margin-top:15px;">
                                                  <div class="login_main fl"> 
                                                  	
                                                    <?php
													if($_POST['submit'] == "SIGN IN")
													{
					
													// username and password sent from form
														$username = $_POST['username'];
														$password = $_POST['password'];

														

														$sql="SELECT * FROM user_cio WHERE emailID = '$username' and password='$password' and registration_status='accepted' and login_type='email'";
														$rs = mysql_query($sql) or die ("Query failed");

														// $numofrows = mysql_num_rows($rs);
														$row = mysql_fetch_array($rs);

														
													//	$sql="SELECT * FROM registration WHERE registration_email = '$username' and registration_password='$password' and registration_status='accepted' and login_type='email'";
													//	$rs = mysql_query($sql) or die ("Query failed");

														// $numofrows = mysql_num_rows($rs);
														//$row = mysql_fetch_array($rs);

														if($row['emailID'] == $username && $row['password'] == $password)
														{
														
															if($row['registration_type']=='CIO') 
															{
																session_start();
																// store session data
																$_SESSION['username']=$username;
																$_SESSION['user_name']=$row['registration_name'];
																$_SESSION['firstname']=$row['firstname'];
																$_SESSION['lastname']=$row['lastname'];
																$_SESSION['corperate_email']=$row['emailID'];
																$_SESSION['type']='cio_landing.php';
																$_SESSION['cio']=$row['registration_type'];
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
														else 
														{
															header("location:vendor_login.php?wrong=yes");
															
														}
															
													}
																										
													else 
													{ 
												function generateRandomString($length = 10) {
													$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
													$charactersLength = strlen($characters);
													$randomString = '';
													for ($i = 0; $i < $length; $i++) {
														$randomString .= $characters[rand(0, $charactersLength - 1)];
													}
													return $randomString;
												}		
												
												//echo generateRandomString();		
												$str=generateRandomString();	
												//echo $str;	
													
													
													$fname =$_POST["fname"];
													$lname =$_POST["lname"];
													$name=$fname.$lname;
													//echo $name;
													$cname =$_POST["company"];
													$email =$_POST["email"];
													$mno =$_POST["mobile"];
													$pass =$_POST["pwd"];
													$btitle =$_POST["btitle"];
													$rpass =$_POST["rtype"];
													$reg_type="CIO";
													$log_type="email";
													$time = time();
												$admin = 'andre.tan@day7.co';
                        
include('activation_link2.php');	
													
								
		/*$sql ="insert into registration(registration_name,registration_email,corperate_email,registration_password,registration_type,login_type,registration_insert_date,registration_status,regist_mobile,confirm_id) values('".$fname."','".$email."','".$email."','".$pass."','".$reg_type."','".$log_type."','".$time."','pending','".$mno."','".$str."')";*/
								$sql ="insert into user_cio(firstname,lastname,company,emailID,mobile_number,password,company_address,secretary_name,	secretary_email,secretary_phone,registration_type,login_type,registration_insert_date,registration_status,confirm_id) values('".$fname."','".$lname."','".$cname."','".$email."','".$mno."','".$pass."','None','None','None','None','".$reg_type."','".$log_type."','".$time."','pending','".$str."')";
							

								
								
											$web_url ="http://cio.fountaintechies.com";	
													$query = mysql_query( $sql, $con);
									
									//header("Location:registration.php?sent=ok");
                                    
                              $pos1= strpos($email,"@gmail.com");
									$pos2= strpos($email,"@yahoo.com");
												
								
								$sql1="SELECT * FROM parent_company";
								$rs = mysql_query($sql1) or die ("Query failed");
								//$row = mysql_fetch_array($rs);
								while($row = mysql_fetch_array($rs))
								{
								// echo $row['domain_name'];
									$pos3= strpos($email,$row['domain_name']);
								 if($pos3 >0)
								 {
								 break;
								 }
								 
								}
								 //echo  $pos3;
								if($pos3 > 0 || $pos1 < 0 || $pos1 < 0 )
								{
									
								email_to_cio_signup($fname, $email, $web_url,$reg_type,$pass,$str);  //email function for cio
										?>
												<div class="login_box fl" style="width:auto"> 
												<h1>Congratulations!<br><br>
												 You have been successfully registered with CXO HONOUR. <br><br>
												 Please activate your account by clicking on the link provided in the email you receive </h1>
												 </div>
												 </form>
										<?php
												
								
								}
								else
								{
									
										email_to_signup($fname, $email, $web_url,$reg_type,$pass,$str); //email function for cio
                                	?>
									<div class="login_box fl" style="width:auto"> 
									<h1>Your application is under review. We will get back to you shortly</h1>
                                     </div>
									 </form>
                                     <?php		 
											
								
								}
								
								
								
								}
												  ?>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        	</div>
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
<?php } ?>

</body>
</html>
