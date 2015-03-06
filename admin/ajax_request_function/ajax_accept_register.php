
<?php
	include('../../sql_config/database/cio_db.php'); 
	$registration_id = mysql_real_escape_string($_POST['registration_id']);
	

	$sql = mysql_query("UPDATE all_users SET registration_status = 'accepted' WHERE  registration_id = $registration_id");
	$result2 = mysql_query("select firstname,lastname,password,emailID,registration_type ,login_type from all_users  WHERE  registration_id = $registration_id");
		while ($row = mysql_fetch_array($result2)) 
		{ 
			$registration_email = $row['emailID'];
			$registration_name = $row['firstname']." ".$row['lastname'];
			$registration_password = $row['password'];
			$registration_type = $row['registration_type'];
			if($registration_type="ICTVendor"){
				$registration_type="ICT Vendor";
			}
			
			$login_type = $row['login_type'];
			
			
		}
		if($sql) 
		{
			if($login_type =='Linkedin') 
			{
				require '../classes/PHPMailer-master/PHPMailerAutoload.php';
 
				$mail = new PHPMailer;
				 
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dayseven';                   // SMTP username
				$mail->Password = '7sendgrid';               // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
				$mail->setFrom('registration@cio-honour.sg', 'CIO Honour');     //Set who the message is to be sent from
				$mail->addReplyTo('registration@cio-honour.sg', 'CIO Honour');   //Set an alternative reply-to address
				// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
				$mail->addAddress($registration_email);               // Name is optional 
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
				$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
				// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				 
				$mail->Subject = 'Congratulations! Your membership is approved';
				$mail->Body    = '
				<html>
				<body style="padding:0px; margin:0px;">
				<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
									<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
										<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
											<div style=" width:210px;height: 225px; margin:0 auto;">
												<a href="'.$web_url.'/index.php" style="height:245px;">
													<img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
												<div style="clear:both;"></div>
											</div>
										</div>
										<div style="width:100%; height:65px; float:left; background:#20201f;">
											<div style=" width:115px;text-align:center; float:left;">
												<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">
													home
												</a>
											</div>
											
											<div style="float:right; margin:15px 20px 0px 0px;">
												<a href="'.$web_url.'/linkLogin.php" style="width:117px; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div>
										</div>
										<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
											<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">
												Your Registration has been accepted, welcome to CIO Honour Singapore
											</h1>
											<p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
												Let&acute;s get started straight away, here are your login details to access the exclusive CIO Honour '.$registration_type.' AREA:
											</p>
										</div>
										<div style="width:98.5%; float:left; background:#20201f; margin-left:10px; ">
											<div style=" float:left; width:270px; text-decoration:none; line-height:55px; font-family: Arial, Helvetica, sans-serif; color:#FFF; font-size:14px; font-weight:400; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px;">
												<img style="float:left; margin:10px 10px 0px 15px;" src="'.$web_url.'/images/cio_area_icon.jpg" width="41" height="34">
												YOUR ACCOUNT DETAILS
											</div> 
												
											<div style="float:right; margin:10px 20px 15px 0px;">
												<a href="'.$web_url.'/linkLogin.php?email='.$registration_email.'" style="width:117px; line-height:35px; float:left; text-shadow:0px 2px #4b0e0e; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
												<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div> 
										</div>
										<div style="float:left; border-left:#CCC solid 1px; border-right:#CCC solid 1px; border-bottom:#CCC solid 1px; width:96.9%; padding:0px 10px 10px 10px; margin-left:10px">
											<div style=" float:left; width:100%; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family: Lato; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">
												<br />
												<a href="'.$web_url.'/linkLogin.php?email='.$registration_email.'" target="_blank">
													<img src="'.$web_url.'/images/linkedin_btn.png" width="410" height="70">
												</a> 
											</div>
											
											
											
									  </div>
										<div style="float:left; width:100%;">
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
										<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
										</div>
										<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
										<div style="width:60%; float:left; height:80px;">
												<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
												<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161">Need help?</span>
											  <a href="'.$web_url.'/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161; font-weight:bold;">Send us your question</a>
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
																						
												<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																						
												<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																						
												<li style="	float:left; list-style-type: none; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
											  </ul>
											  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO Honour Singapore. All Rights Reserved.</p>
										  </div>
										</div>
										  
									  </div>
									  
										
										
									</div>
									
									<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:400px;">
									This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO Honour account. This is a one-time email. You received this email because you signed up for a CIO Honour account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
									
									<div style="clear:both;"></div> 
							</div></body></html>';
				$mail->AltBody = 'hi developer how r u?';
				 
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				 
				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				echo "Accepted";
			}
			else 
			{
				require '../classes/PHPMailer-master/PHPMailerAutoload.php';
 
				$mail = new PHPMailer;
				 
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dayseven';                   // SMTP username
				$mail->Password = '7sendgrid';               // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
				$mail->setFrom('registration@CIO Honour.sg', 'CIO Honour');     //Set who the message is to be sent from
				$mail->addReplyTo('registration@CIO Honour.sg', 'CIO Honour');   //Set an alternative reply-to address 
				// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
				$mail->addAddress($registration_email);               // Name is optional
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
				$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
				// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				  
				$mail->Subject = 'Congratulations! Your membership is approved';
				$mail->Body    = '
				<html>
				<body style="padding:0px; margin:0px;">
				<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
									<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
										<div style=" float:left; width:100%; height:225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
											<div style=" width:210px;height: 225px; margin:0 auto;">
												<a href="'.$web_url.'/index.php" style="height:245px;min-height: 245px;">
													<img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
												<div style="clear:both;"></div>
											</div>
										</div>
										<div style="width:100%; height:65px; float:left; background:#20201f;">
											<div style=" width:115px;text-align:center; float:left;">
												<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">
													home
												</a>
											</div>
											
											<div style="float:right; margin:15px 20px 0px 0px;">
												<a href="'.$web_url.'/login.php" style="width:117px; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div>
										</div>
										<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
											<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">
												Your Registration has been accepted, welcome to CIO Honour Singapore
											</h1>
											<p style=" float:left; width:90%; display:block;  font:Lato; font-family:Arial, Helvetica, sans-serif; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
												Let&acute;s get started straight away, here are your login details to access the exclusive CIO Honour  AREA:
											</p>
										</div>
										<div style="width:98.5%; float:left; background:#20201f; margin-left:10px; ">
											<div style=" float:left; width:270px; text-decoration:none; line-height:55px; font-family: Lato, Arial, Helvetica, sans-serif; color:#FFF; font-size:14px; font-weight:400; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px;">
												<img style="float:left; margin:10px 10px 0px 15px;" src="'.$web_url.'/images/cio_area_icon.jpg" width="41" height="34">
												YOUR ACCOUNT DETAILS
											</div>
												
											<div style="float:right; margin:10px 20px 15px 0px;">
												<a href="'.$web_url.'/login.php" style="width:117px; line-height:35px; float:left; text-shadow:0px 2px #4b0e0e; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
												<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div>
										</div>
										<div style="float:left; border-left:#CCC solid 1px; border-right:#CCC solid 1px; border-bottom:#CCC solid 1px; width:96.9%; padding:0px 10px 10px 10px; margin-left:10px">
											<div style=" float:left; width:100%; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family: Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">
												Email:
												<span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: Arial, Helvetica, sans-serif;">
													'.$registration_email.'
												</span>
											</div>
											
											
											<div style=" float:left; width:100%; text-decoration:none; line-height:75px; font-family: Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">
												Password: 
												<span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: Lato, Arial, Helvetica, sans-serif;">
													'.$registration_password.'
												</span>
											</div>
											
											
									  </div>
										<div style="float:left; width:100%;">
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
										<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
										</div>
										<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
										<div style="width:60%; float:left; height:80px;">
												<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
												<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase;  font:Lato; font-family:Arial, Helvetica, sans-serif; color:#616161">Need help?</span>
											  <a href="'.$web_url.'/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase;  font:Lato; font-family:Arial, Helvetica, sans-serif; color:#616161; font-weight:bold;">Send us your question</a>
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
																						
												<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left;  font:Lato; font-family:Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																						
												<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left;  font:Lato; font-family:Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																						
												<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left;  font:Lato; font-family:Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
											  </ul>
											  <p style=" float:left;  font:Lato; font-family:Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO Honour Singapore. All Rights Reserved.</p>
										  </div>
										</div>
										  
									  </div>
									  
										
										 
									</div>
									
									<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:400px;">
									This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO Honour account. This is a one-time email. You received this email because you signed up for a CIO Honour account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
									
									<div style="clear:both;"></div>
							</div></body></html>'; 
				$mail->AltBody = 'Test';
				 
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				 
				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				echo "Accepted";
			}
		}
		else
		{
			echo "error";
		}

?>