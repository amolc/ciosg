<?php 
	//email send to cio when sign up
	
													include('sql_config/database/cio_db.php'); 
													$sql="SELECT * FROM `mail_settings`";
														$rs = mysql_query($sql) or die ("Query failed");

														// $numofrows = mysql_num_rows($rs);
														$row = mysql_fetch_array($rs);
													    $from=$row['from'];
														$reply=$row['reply'];
										
    require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
		
	function email_to_cio_signup($registration_name , $registration_email ,$web_url,$registration_type,$pass,$str) {
	
		$mail = new PHPMailer;
		  
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;               // Enable SMTP authentication
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';               // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('registration@ciohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@ciohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		$confirm_url="<a  href='http://cio.fountaintechies.com/accepted.php?id=".$str."'>click here to activate your account</a>";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO HONOUR';
		$mail->Body    = '
		<div style=" height:870px; padding:25px; background:#eaeaea">
														<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
															<div style=" float:left; width:100%; height:225px; background:url(http://cio.fountaintechies.com/images/cio_choice_head_bg.png) repeat-x  center top;">
																<div style=" width:210px;height: 225px; margin:0 auto;">
																<a href="#" style="height:245px;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="100%" height="100%"></a>
																<div style="clear:both;"></div>
																</div>
															</div>
															<div style="width:100%; height:65px; float:left; background:#20201f;">
																	<div style=" width:115px;text-align:center; float:left;">
																	<a href="#" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url(http://cio.fountaintechies.com/images/border.jpg) no-repeat right">home</a>
																	</div>
														  </div> 
															<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																		<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																		 CIO HONOUR Singapore.
																		</h1>
															  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
															  <b>Dear&nbsp;'. $registration_name.',</b><br>
															  </p>
															   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
															   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Below are the login credentials for your profile.</div>
															  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Company Email Address</p><br>
																		
																		<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'. $registration_email.'</p>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Your Password </p><br>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'. $pass.'</p>
															  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																			<a href="http://cio.fountaintechies.com/cio_accepted.php?id='.$str.'" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">Please click here to activate your account</a>
																		</div>
														  </div>
															<div style="float:left; width:100%;">
															<div style="float:left; width:42.1%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
															<div style="float:left; margin:18px 0px 0px 0px;"><img src="http://cio.fountaintechies.com/images/star_rating.jpg" width="82" height="11"></div>
															<div style="float:left; width:46.3%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
															</div>
															<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
															<div style="width:80%; float:left; height:80px;">
																	<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="41" height="41"></span>
																	<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
																  <a href="http://cio.fountaintechies.com/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
															  </div>
															<div style="width:170px; float:right; margin-top:22px;">
																<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/linkedin.png"></a>
																<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/twitter.png"></a>
																<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/google_plus.png"></a>
																<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/facebook.png"></a>
																<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/play.png"></a>
															</div>
															
															<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
																<div style="float:left; margin:0px; width:96%;">
																
																  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2015 CIO HONOUR Singapore. All Rights Reserved.</p>
															  </div>
															</div>
															  
														  </div>
														  
															
															
														</div>
														
														<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
														This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO HONOUR account. This is a one-time email. You received this email because you signed up for a CIO HONOUR account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
														
														<div style="clear:both;"></div>
												</div>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->Subject = 'A new member has just registered using the Cio-Honour.sg network.';
     $mail->Body='
    <html>
    <body>
     <ul style="  float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
                                                          
					<li style="float:left; list-style-type: none;"> Type : '.$registration_type.'</li>						  
                    <li style=" float:left; list-style-type: none;"> Name : '.$registration_name.'</li>                               
                    <li style="clear:both; float:left; list-style-type: none; ">Email : '.$registration_email.'</li>
                 
                  </ul>
    </body>
    </html>';
    $mail->send();
	}
	//ict sign up email
	function email_to_vendor_signup($registration_name , $registration_email ,$web_url,$registration_type,$pass,$str) {

		$mail = new PHPMailer;
		  
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('registration@ciohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@ciohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 $confirm_url="<a  href='http://cio.fountaintechies.com/vendor_accepted.php?id=".$str."'>click here to activate your account</a>";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO Honour';
		$mail->Body    = '
		<div style=" height:770px; padding:25px; background:#eaeaea">
														<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
															<div style=" float:left; width:100%; height:225px; background:url(http://cio.fountaintechies.com/images/cio_choice_head_bg.png) repeat-x  center top;">
																<div style=" width:210px;height: 225px; margin:0 auto;">
																<a href="#" style="height:245px;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="100%" height="100%"></a>
																<div style="clear:both;"></div>
																</div>
															</div>
															<div style="width:100%; height:65px; float:left; background:#20201f;">
																	<div style=" width:115px;text-align:center; float:left;">
																	<a href="#" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url(http://cio.fountaintechies.com/images/border.jpg) no-repeat right">home</a>
																	</div>
														  </div> 
															<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																		<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																		 CIO HONOUR Singapore.
																		</h1>
															  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
															  <b>Dear&nbsp;'. $registration_name.',</b><br>
															  </p>
															   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
															   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Below are the login credentials for your profile.</div>
															  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Company Email Address</p><br>
																		
																		<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'. $registration_name.'</p>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Your Password </p><br>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'. $pass.'</p>
															  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																			<a href="http://cio.fountaintechies.com/vendor_accepted.php?id='.$str.'" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">Please click here to activate your account</a>
																		</div>
														  </div>
															<div style="float:left; width:100%;">
															<div style="float:left; width:40%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
															<div style="float:left; margin:18px 0px 0px 0px;"><img src="http://cio.fountaintechies.com/images/star_rating.jpg" width="82" height="11"></div>
															<div style="float:left; width:46.3%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
															</div>
															<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
															<div style="width:80%; float:left; height:80px;">
																	<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="41" height="41"></span>
																	<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
																  <a href="http://cio.fountaintechies.com/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
															  </div>
															<div style="width:170px; float:right; margin-top:22px;">
																<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/linkedin.png"></a>
																<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/twitter.png"></a>
																<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/google_plus.png"></a>
																<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/facebook.png"></a>
																<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/play.png"></a>
															</div>
															
															<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
																<div style="float:left; margin:0px; width:96%;">
																
																  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2015 CIO HONOUR Singapore. All Rights Reserved.</p>
															  </div>
															</div>
															  
														  </div>
														  
															
															
														</div>
														
														<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
														This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO HONOUR account. This is a one-time email. You received this email because you signed up for a CIO HONOUR account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
														
														<div style="clear:both;"></div>
												</div>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->Subject = 'A new member has just registered using the Cio-Honour.sg network.';
     $mail->Body='
    <html>
    <body>
     <ul style="  float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
                                                          
					<li style="float:left; list-style-type: none;"> Type : '.$registration_type.'</li>						  
                    <li style=" float:left; list-style-type: none;"> Name : '.$registration_name.'</li>                               
                    <li style="clear:both; float:left; list-style-type: none; ">Email : '.$registration_email.'</li>
                 
                  </ul>
    </body>
    </html>';
    $mail->send();
	}
	
	
	
	function email_to_signup($registration_name , $registration_email ,$web_url,$registration_type,$pass,$str) {

		$mail = new PHPMailer;
		  
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';                // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('registration@ciohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@ciohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 $confirm_url="Your application is under review. We will get back to you in a shortly";
		$mail->Subject = 'Your application is under review!';
		$mail->Body    = '
		<div style=" height:870px; padding:25px; background:#eaeaea">
														<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
															<div style=" float:left; width:100%; height:225px; background:url(http://cio.fountaintechies.com/images/cio_choice_head_bg.png) repeat-x  center top;">
																<div style=" width:210px;height: 225px; margin:0 auto;">
																<a href="#" style="height:245px;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="100%" height="100%"></a>
																<div style="clear:both;"></div>
																</div>
															</div>
															<div style="width:100%; height:65px; float:left; background:#20201f;">
																	<div style=" width:115px;text-align:center; float:left;">
																	<a href="#" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url(http://cio.fountaintechies.com/images/border.jpg) no-repeat right">home</a>
																	</div>
														  </div> 
															<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																		<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																		 CIO HONOUR Singapore.
																		</h1>
															  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
															  <b>Dear&nbsp;'. $registration_name.',</b><br>
															  </p>
															   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! Your request is under review, we shall get back to you shortly . </div>
															 </div>
															<div style="float:left; width:100%;">
															<div style="float:left; width:35%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
															<div style="float:left; margin:18px 0px 0px 0px;"><img src="http://cio.fountaintechies.com/images/star_rating.jpg" width="82" height="11"></div>
															<div style="float:left; width:40%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
															</div>
															<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
															<div style="width:80%; float:left; height:80px;">
																	<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="http://cio.fountaintechies.com/images/logo3.png" alt="" width="41" height="41"></span>
																	<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
																  <a href="http://cio.fountaintechies.com/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
															  </div>
															<div style="width:170px; float:right; margin-top:22px;">
																<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/linkedin.png"></a>
																<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/twitter.png"></a>
																<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/google_plus.png"></a>
																<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/facebook.png"></a>
																<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="http://cio.fountaintechies.com/images/play.png"></a>
															</div>
															
															<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
																<div style="float:left; margin:0px; width:96%;">
																
																  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2015 CIO HONOUR Singapore. All Rights Reserved.</p>
															  </div>
															</div>
															  
														  </div>
														  
															
															
														</div>
														
														<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
														This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO HONOUR account. This is a one-time email. You received this email because you signed up for a CIO HONOUR account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
														
														<div style="clear:both;"></div>
												</div>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('registration@ciohonour.com'); 
    $mail->addAddress('registration@ciohonour.com'); 
    $mail->addAddress('registration@ciohonour.com'); 
    $mail->addAddress('registration@ciohonour.com'); 
    $mail->Subject = 'A new member has just registered using the Cio-Honour.sg network.';
     $mail->Body='
    <html>
    <body>
     <ul style="  float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
                                                          
					<li style="float:left; list-style-type: none;"> Type : '.$registration_type.'</li>						  
                    <li style=" float:left; list-style-type: none;"> Name : '.$registration_name.'</li>                               
                    <li style="clear:both; float:left; list-style-type: none; ">Email : '.$registration_email.'</li>
                 
                  </ul>
    </body>
    </html>';
    $mail->send();
	}
	

?>
