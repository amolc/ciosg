<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>cio-choice.sg</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>

</head>

<body>
	<?php
		// Turn off all error reporting
		error_reporting(1);
		include('sql_config/database/cio_db.php'); 
		include('top_header.php');
	?>
	<div class="header-nav">                                              
		<div class="wrapper">                                                   
			<?php include('navigation.php'); ?>
			<div class="clear"></div>                                 
		</div>
	</div>



  <div class="wrapper">              
    <div class="register-page">
    	<div class="register-logo">
            <img src="images/register/register-logo.jpg" width="961" height="219" alt="">
        </div>
        <!--register-logo-->
				<?php

						// include('sql_config/database/cio_db.php'); 
						// include('../vendor/autoload.php');
					include('email_function.php');
						// use Mailgun\Mailgun;
						
						
						if(isset($_POST['Submit']) && ($_POST['Submit'] == "Submit")) 
						{ 
							
							$registration_type = mysql_real_escape_string($_POST['Which_You_Are']);
							$login_type = $_POST['Which_Way'];
							
							$registration_name = mysql_real_escape_string($_POST['name']);
							$registration_email = mysql_real_escape_string($_POST['email']);
							$filter = explode("@",$registration_email);
							if(($filter[1] != "gmail.com") || ($filter[1] != "yahoo.com") ) {
							$admin ='mark.devday7@day7.co';
							function randomPassword()
							{
								$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
								$pass = array(); //remember to declare $pass as an array
								$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
								for ($i = 0; $i < 8; $i++) {
									$n = rand(0, $alphaLength);
									$pass[] = $alphabet[$n];
								}
								return implode($pass); //turn the array into a string
							}
							$registration_password = randomPassword();
							//curent date
							$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$current_date = date("m/d/Y", $today_date);

							// if ($registration_type == 'CIO' && $login_type == 'email')
							if ($registration_type == 'CIO')
							{
								$result= mysql_query("SELECT registration_email FROM registration WHERE registration_email='$registration_email'");
								if (mysql_num_rows($result) > 0)
								{
									// echo "<h1 style='margin-bottom: 22px;text-align: center;'>Sorry this email address is already register with CIO CHOICE Singapore, please enter a new email address.</h1>";
									header("Location:registration.php?exit=ok");
								}
								else 
								{
									$sql   = "insert into registration(registration_name,registration_email,corperate_email,registration_password,registration_type,login_type,registration_insert_date,registration_status) values('".$registration_name."','".$registration_email."','".$registration_email."','".$registration_password."','".$registration_type."','".$login_type."','".$current_date."','pending')";
									$query = mysql_query($sql);
									if($query)
									{
										// email_to_cio_signup($registration_name , $registration_email , $web_url); //email function for cio
																					
										// echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'>Thank you for registering with CIO CHOICE Singapore, our moderators will review your account and keep you posted. Please check your email in the next 12-24 hours.</h1>";
									
										// email_admin_to_cio( ); //admin
										require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
										$mail2 = new PHPMailer;
																		 
										$mail2->isSMTP();                                      // Set mailer to use SMTP
										$mail2->Host = 'smtp.gmail.com';                       // Specify main and backup server
										$mail2->SMTPAuth = true;                               // Enable SMTP authentication
										$mail2->Username = 'ciochoice.sg@gmail.com';                   // SMTP username
										$mail2->Password = '9cXWOqeaf';               // SMTP password
										$mail2->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail2->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
										$mail2->setFrom('ciochoice.sg@gmail.com', 'Cio choice');     //Set who the message is to be sent from
										$mail2->addReplyTo('ciochoice.sg@gmail.com', 'Cio choice');  //Set an alternative reply-to address
										// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
										$mail2->addAddress($admin);               // Name is optional
										$mail2->WordWrap = 500;       
										$mail2->isHTML(true);                                  // Set email format to HTML
										$mail2->Subject = 'Thank you for joining us!';
										$mail2->Body    = '<div style=" height:1000px; padding:25px; background:#eaeaea;">
																<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  center top;">
																		<div style=" width:210px;height: 225px; margin:0 auto;">
																		<a href="#" style="height:245px;"><img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="100%" height="100%"></a>
																		<div style="clear:both;"></div>
																		</div>
																	</div>
																	<div style="width:100%; height:65px; float:left; background:#20201f;">
																			<div style=" width:115px;text-align:center; float:left;">
																			<a href="#" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
																			</div>
																  </div>
																	<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																				<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																					Accept your CIO CHOICE Singapore registration request.
																				</h1>
																	  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
																		New CIO CHOICE Singapore Membership Applictaion recieved from '.$registration_type.'
														Click on the link give below to activate account of this user.'.$web_url.'/admin/admin_pending_register.php
																	  </p>
																	  
																	  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Your Full Name</p>
																				
																				<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_name.'</p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Company Email Address </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_email.'</p>
																				
																	  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																					<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO CHOICE SINGAPORE</a>
																				</div>
																  </div>
																	<div style="float:left; width:100%;">
																	<div style="float:left; width:46.1%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
																	<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
																	<div style="float:left; width:46.3%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
																	</div>
																	<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
																	<div style="width:80%; float:left; height:80px;">
																			<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
																			<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
																		  <a href="#" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
																	  </div>
																	<div style="width:170px; float:right; margin-top:22px;">
																		<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/linkedin.png"></a>
																		<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/twitter.png"></a>
																		<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/google_plus.png"></a>
																		<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/facebook.png"></a>
																		<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/play.png"></a>
																	</div>
																	
																	<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
																		<div style="float:left; margin:0px; width:96%;">
																		  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/registration.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Register</a></li>
																													
																			<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																													
																			<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
																		  </ul>
																		  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
																	  </div>
																	</div>
																	  
																  </div>
																  
																	
																	
																</div>
																
																<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
																This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">deepak.sharma@cio-choice.sg</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
																
																<div style="clear:both !important;"></div>
														</div>'; 
																							$mail2->AltBody = 'hi developer how r u?';										 
										if(!$mail2->send()) 
										{
										   echo 'Message could not be sent.';
										   echo 'Mailer Error: ' . $mail2->ErrorInfo;
										   // exit;
										}
	header("Location:registration.php?sent=ok");
										
													
									}
								}
							}
							else if($registration_type == 'ICTVendor')
							{
								$result1= mysql_query("SELECT registration_email FROM registration WHERE registration_email='$registration_email'");
								if (mysql_num_rows($result1) > 0)
								{
									// echo "<h1 style='margin-bottom: 22px;text-align: center;'>Sorry this email address is already register with CIO CHOICE Singapore, please enter a new email address.</h1>";
									header("Location:registration.php?exit=ok");
								}
								else 
								{
									$sql1   = "insert into registration(registration_name,registration_email,registration_password,registration_type,login_type,registration_insert_date,registration_status) values('".$registration_name."','".$registration_email."','".$registration_password."','".$registration_type."','".$login_type."','".$current_date."','pending')";
									$query1 = mysql_query($sql1);
									
									if($query1)
									{
										// email_to_ict_signup($registration_name , $registration_email , $web_url); //email function for ict
										// email_admin_to_ict( ); //for admin
										// echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'>Thank you for registering with CIO CHOICE Singapore, our moderators will review your account and keep you posted. Please check your email in the next 12-24 hours.</h1>";
											
										require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
										$mail4 = new PHPMailer;
																		 
										$mail4->isSMTP();                                      // Set mailer to use SMTP
										$mail4->Host = 'smtp.gmail.com';                       // Specify main and backup server
										$mail4->SMTPAuth = true;                               // Enable SMTP authentication
										$mail4->Username = 'ciochoice.sg@gmail.com';                   // SMTP username
										$mail4->Password = '9cXWOqeaf';               // SMTP password
										$mail4->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail4->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
										$mail4->setFrom('ciochoice.sg@gmail.com', 'Cio choice');     //Set who the message is to be sent from
										$mail4->addReplyTo('ciochoice.sg@gmail.com', 'Cio choice');  //Set an alternative reply-to address
										// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
										$mail4->addAddress($admin);               // Name is optional
										$mail4->WordWrap = 500;                                 // Set word wrap to 50 characters
										$mail4->isHTML(true);                                  // Set email format to HTML
										 
										$mail4->Subject = 'Registration Email';
											$mail4->Body    = '<div style=" height:100%; padding:25px; background:#eaeaea">
																<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  center top;">
																		<div style=" width:210px;height: 225px; margin:0 auto;">
																		<a href="#" style="height:245px;"><img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="100%" height="100%"></a>
																		<div style="clear:both;"></div>
																		</div>
																	</div>
																	<div style="width:100%; height:65px; float:left; background:#20201f;">
																			<div style=" width:115px;text-align:center; float:left;">
																			<a href="#" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
																			</div>
																  </div>
																	<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																				<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																					Accept your CIO CHOICE Singapore registration request.
																				</h1>
																	  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
																		New CIO CHOICE Singapore Membership Applictaion recieved from '.$registration_type.'
														Click on the link give below to activate account of this user.'.$web_url.'/admin/admin_pending_register.php
																	  </p>
																	  
																	  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Your Full Name</p>
																				
																				<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_name.'</p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Company Email Address </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_email.'</p>
																				
																	  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																					<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO CHOICE SINGAPORE</a>
																				</div>
																  </div>
																	<div style="float:left; width:100%;">
																	<div style="float:left; width:46.1%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
																	<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
																	<div style="float:left; width:46.3%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
																	</div>
																	<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
																	<div style="width:80%; float:left; height:80px;">
																			<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
																			<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
																		  <a href="#" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
																	  </div>
																	<div style="width:170px; float:right; margin-top:22px;">
																		<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/linkedin.png"></a>
																		<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/twitter.png"></a>
																		<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/google_plus.png"></a>
																		<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/facebook.png"></a>
																		<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/play.png"></a>
																	</div>
																	
																	<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
																		<div style="float:left; margin:0px; width:96%;">
																		  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/registration.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Register</a></li>
																													
																			<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																													
																			<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
																		  </ul>
																		  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
																	  </div>
																	</div>
																	  
																  </div>
																  
																	
																	
																</div>
																
																<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
																This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">deepak.sharma@cio-choice.sg</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
																
																<div style="clear:both;"></div>
														</div>'; 
										$mail4->AltBody = 'hi developer how r u?';												 
										if(!$mail4->send())
										{
										   echo 'Message could not be sent.';
										   echo 'Mailer Error: ' . $mail4->ErrorInfo;
										   // exit;
										}
											header("Location:registration.php?sent=ok");							
										// echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'> Thank you for registering, our moderators would approve your account and keep you posted. Please check your email in the next 12-24 hrs.</h1>";
																						
									}
									else 
									{
										echo "error";
									}
									
									
							
									}
								}	
							
							}
							else
							{
							header("Location: registration.php?email_error=ok");
							}

						}
						else
						{
					
															if(isset($_REQUEST['sent']))
															{
																echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'>Thank you for registering with CIO CHOICE Singapore, our moderators will review your account and keep you posted. Please check your email in the next 12-24 hours.</h1>";
															}
															if(isset($_REQUEST['exit']))
															{
																echo "<h1 style='margin-bottom: 22px;text-align: center;line-height: 30px;'>Sorry this email address is already register with CIO CHOICE Singapore, please enter a new email address.</h1>";
									
															}
															// if(isset($_REQUEST['not_reg']))
															// {
																// echo "<h1 style='color:red;margin-bottom: 22px;text-align: center;line-height: 30px;'>Error: Your email address is not found in our system. Please register </h1>";
									
															// }
														
					

						?>
        <form class="register-form" id="myform2" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
          <div class="black-box">
            <h2>1 <span>I'm a...</span></h2>
            
            <div class="radio">
                <div class="form-radio radio1">
                <input id="male" type="radio" name="Which_You_Are" value="CIO" required>
                <label for="male">CIO</label>
                </div>
                
                <div class="form-radio radio2">
                <input id="female" type="radio" name="Which_You_Are" value="ICTVendor" required>
                <label for="female">ICT Vendor</label>
                </div>
                
            </div>
            <!--radio-->
            
            </div>
            <!--black-box-->
            
          <div class="black-box black-box2">
            <h2>2 <span>I'd like to connect by...</span></h2>
            
            <div class="radio">
                <div class="form-radio radio3">
                <input id="corporate-email" type="radio" name="Which_Way" value="email" required>
                <label for="corporate-email">Corporate Email</label>
                </div>
                
                <div class="form-radio radio4">
                <input id="linkedin" type="radio" name="Which_Way" value="Linkedin">
                <label for="linkedin">Linkedin</label>
                </div>
                
            </div>
            <!--radio-->
            
            </div>
            <!--black-box-->
            		<div class="clear"></div>
          
          
          <div class="red-box">
          	<h2>3 <span>Send us your details...</span></h2>			
            <div class="form-row">
                    Full Name <input name="name" style="width: 278px;" type="text" required>
                   Corporate Email <input style="margin-right:0;width: 278px;" name="email" id="email" type="email" class="no-margin" required >
            </div>
            <!--form-row-->
                
				<?php if(isset($_REQUEST['email_error'])) { 
				echo '<div style="background:#c5090a;" class="red_strip fl">';
				echo '<h1>SORRY WE ONLY ACCEPT YOUR COMPANY EMAIL ADDRESS</h1>';
				echo '<script type="text/javascript">
				$(function()
				{
						$("#email").focus();
				});
				</script>';
				}
				?>
															
                	
                 <div class="form-submit">
                <input name="Submit" type="image" value="Submit" src="images/register/send-button.png">
				</div>
				</div>
                
            
            <!--form-row--> 
                
        </div>
        <!--red-box-->
          	
                    
            
        </form>
        <?php
		}
		?>
    </div>
    <!--register-page-->
</div>
<!--wrapper-->                                            
                                           
                                            <?php

											include('quick_contact.php');
                                                    include('footer.php');
													
                                              ?>                                   
                                            

 

    <!-- Google CDN jQuery with fallback to local 
	<script type="text/javascript" src="js/jquery.min.js"></script>-->
	<!--<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
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
	</script>-->

</body>
</html>
