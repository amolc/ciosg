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
														include('top_header.php');
														
									?>
                                        
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


														function check_input($value)
										                {
										                // Stripslashes
										                if (get_magic_quotes_gpc())
										                  {
										                  $value = stripslashes($value);
										                  }
										                // Quote if not a number
										                if (!is_numeric($value))
										                  {
										                  $value = mysql_real_escape_string($value);
										                  }
										                return $value;
										                }
														

                                                           

													if($_POST['submit'] == "submit")
													{
														$registration_email = check_input($_POST['email']);
																										
														$sql = mysql_query("select registration_email,registration_password from registration where registration_email = '$registration_email' and registration_status='accepted'")or die(mysql_error());					
														$row = mysql_fetch_array($sql);
												
														if($row['registration_email'] == $registration_email)
														{
															$password = $row['registration_password'];	
															
															// $to = $registration_email;
															// $subject = "Forgot Password"; 
															// $message = "Your password is '".$password."'"; 
																			
															// $headers  = 'MIME-Version: 1.0' . "\r\n";
															// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
															// $headers .= 'To: '.$registration_email.'' . "\r\n";
															// $headers .= 'From: apache@iamamol.com' . "\r\n";

															// $mail_sent = mail( $to, $subject, $message, $headers );
															require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
 
																$mail = new PHPMailer;  
																 
																$mail->isSMTP();                                      // Set mailer to use SMTP
                                                            $mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
                                                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                                            $mail->Username = 'dayseven';                   // SMTP username
                                                            $mail->Password = '7sendgrid';               // SMTP password
                                                            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                                                            $mail->Port = 587;


                                                            $mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
                                                            $mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');  //Set an alternative reply-to address
                                                            $mail->addAddress($registration_email);               // Name is optional
																// $mail->addCC('cc@example.com'); 
																// $mail->addBCC('bcc@example.com');
																$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
																// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
																// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
																$mail->isHTML(true);                                  // Set email format to HTML
																 
																$mail->Subject = 'Forgot Password';
																$mail->Body    = '<div style=" height:100%; padding:25px; background:#eaeaea">
														<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
															<div style=" float:left; width:100%; height:225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  center top;">
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
																		 CIO CHOICE Singapore.
																		</h1>
															  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
															  According to our records, you have requested that your password be resend. Your new
												password below</p>
															  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Company Email Address</p>
																		
																		<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_email.'</p>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Your Password </p>
																		
																		<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$password.'</p>
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
																  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
															  </div>
															</div>
															  
														  </div>
														  
															
															
														</div>
														
														<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
														This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
														
														<div style="clear:both;"></div>
												</div>';
																 
																//Read an HTML message body from an external file, convert referenced images to embedded,
																//convert HTML into a basic plain-text alternative body
																// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
																 
																if(!$mail->send()) {
																   echo 'Message could not be sent.';
																   echo 'Mailer Error: ' . $mail->ErrorInfo;
																   exit;
																}
															header("Location:forgot_password.php?sent=ok");
															//echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
														}
														else
														{
															header("Location:forgot_password.php?error=ok");
														}
														
													}
																										
													else 
													{
													?>
													
													<div style="margin-bottom: 40px;line-height: 30px;text-align: center;float: left;width: 100%;line-height: 40px;height: 40px;color: #20201F;display: block;font-size: 30px;font-weight: bold;">
														
														To receive your password, please enter the email address that you registered with below
													</div>
														<?php
															if(isset($_REQUEST['sent']))
															{
															echo '<h3 style="color:green;margin-left: 404px;">Email has been sent.....</h3>';
															}
															if(isset($_REQUEST['error']))
															{
															echo '<h3 style="color:red;margin-left: 373px;">Email You enterd is Invalid !!</h3>';
															}
														?>
													 <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
                                                    	<div class="login_form fl">
                                                        	<div style="margin-left: 230px;margin-right: 230px;"  class="login_box fl">
                                                            	<h1>Email Address</h1>
                                                              <label> Email</label>
                                                                <input name="email" type="email" required>
                                                                <input value="submit" name="submit" type="submit">
                                                        </div>
                                                           
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
