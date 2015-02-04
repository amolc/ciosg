<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>CXO HONOUR</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	
	<script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	
	<script src="js/ie-emulation-modes-warning.js"></script>
   
   <script>
function checkEmail(email) {   
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) { return false }
    return true;
}
 
function validateForm(formName)
{    
    var obj = document.getElementById(formName);
    
    	if(obj.first_name.value == ""){ alert("First Name can not be blank."); obj.first_name.focus(); return false; } 
    	if(obj.last_name.value == ""){ alert("Last Name can not be blank."); obj.last_name.focus(); return false; } 
	if(obj.email.value == ""){ alert("Email can not be blank."); obj.email.focus(); return false; } 
    	if(obj.select.value == ""){ alert("'I am a' can not be blank."); obj.select.focus(); return false; } 
	if(checkEmail(obj.email.value) == false){ alert("Email must be valid."); obj.email.focus(); return false; }
	if(obj.message.value == ""){ alert("Message can not be blank."); obj.message.focus(); return false; } 
}            
</script>

  </head>
  <body>
	<div class="clsWrapper">
		<div class="clsHeader">
				<?php include('header.php');?>
			<div class="clsLogo_ban">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="row">
							<div class="col-md-12">
								<div class="clsLogo"><img src="images/logo.png"/></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="clsData_cont">
									<div class="clsTlt"><h1 style="margin-right:350px">Contact Us</h1></div>
									<div class="row">
										<div class="col-md-8">
											<div class="clsForm">
												<div class="row">
												<form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onsubmit="return validateForm(this.id)" >
												<?php
																			
												error_reporting(0);

										include('sql_config/database/cio_db.php'); 

						if($_POST['Submit'] == "Submit")
						{
					
							
							$first_name = mysql_real_escape_string($_POST['first_name']);
							$last_name = mysql_real_escape_string($_POST['last_name']);
							$email = mysql_real_escape_string($_POST['email']);
							$select = mysql_real_escape_string($_POST['select']);
							$message = $_POST['message'];

                            strip_tags($first_name);
                            strip_tags($last_name);
                            strip_tags($email);
                            strip_tags($select);
                            strip_tags($message);

							$message= nl2br($message);
						
							$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$current_date = date("m/d/Y", $today_date);
							
								$sql   = "insert into contact_us(contact_us_first_name,contact_us_last_name,contact_us_email,contact_us_im,contact_us_message,contact_us_insert_date) values('".$first_name."','".$last_name."','".$email."','".$select."','".$message."','".$current_date."')";
						
								$query = mysql_query($sql);
								if($query)
								{
									
									
												
										require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
										 $mail = new PHPMailer;
		  
										$mail->isSMTP();                                      // Set mailer to use SMTP
										$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
										$mail->SMTPAuth = true;                               // Enable SMTP authentication
										$mail->Username = 'gigster';                   // SMTP username
										$mail->Password = '10gXWOqeaf';               // SMTP password
										$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
										$mail->setFrom($email,''.$first_name.'' .$last_name.'');     //Set who the message is to be sent from
										$mail->addReplyTo('contactus@cio-honour.sg', 'CXO HONOUR');  //Set an alternative reply-to address
										$mail->addAddress('contactus@cio-honour.sg','CXO HONOUR'); 
										$mail->WordWrap = 500;      
										$mail->isHTML(true);                                  // Set email format to HTML
										$confirm_url="<a  href='http://cio.fountaintechies.com/accepted.php?id=".$str."'>click here to activate your account</a>";
										$mail->Subject = 'Contact Us Enquiry.';
										
										$mail->Body    = '
											<html>
											<body style="padding:0px; margin:0px;">
											<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
																<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	
																		<div style=" width:210px;height: 100px;margin-left:200px">
																		<a href="http://cio.fountaintechies.com/CXO_HONOUR/" style="height:245px;"><img src="http://cio.fountaintechies.com/CXO_HONOUR/images/logo.png" alt="" width="350" height="180"></a>
																		<div style="clear:both;"></div>
																		</div>
																	
																	<div style="width:100%; height:5px; float:left; background:#20201f;"></div>
																	<div style="width:100%; float:left; padding:0px 0px;">
																				<br /><br />
																																					
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%;">You have one Contact Request,</p>
																				<br />
																	  
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%;">Name: '.$first_name.'' .$last_name.'</p>
																				
																				
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%;">Email: '.$email.' </p>
																				
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%;">Message: '.$message.' </p>
																				
																				
																				
																	  
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
																		  <a href="http://cio.fountaintechies.com/CXO_HONOUR/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161; font-weight:bold;">Send us your question</a>
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
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/registration.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Register</a></li>
																													
																			<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/login.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																													
																			<li style="	float:left; list-style-type: none; margin:0px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/privacy_policy.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
																		  </ul>
																		  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright © 2014 CIO HONOUR Singapore. All Rights Reserved.</p>
																	  </div>
																	</div>
																	  
																  </div>
																  
																	
																	
																</div>
																
																<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
																This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO HONOUR account. This is a one-time email. You received this email because you signed up for a CIO HONOUR account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
																
																<div style="clear:both !important;"></div>
														</div></body></html>'; 
										$mail->AltBody = 'hi developer how r u?';
										$mail->send();										
										if(!$mail->send()) 
										{
										   echo 'Message could not be sent.';
										   echo 'Mailer Error: ' . $mail->ErrorInfo;
										   exit;
										}
										else
										{	echo "<span style='margin-left: 162px;font-size: 2em;'> Your contact enquiry send successfully.<br /></span>";
											
										}
										
									
								}
								else 
								{
									echo "error";
								}

						}
					
					

						?>
													
													<div class="col-xs-6" style="margin-bottom:15px;">
													<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* First Name:</label>
														<input type="text" name="first_name" id="first_name" class="form-control " placeholder="First Name">
													</div>
																 
													<div class="col-xs-6" style="margin-bottom:15px;">
													 <label>* Last Name:</label>
														<input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name">
													</div>
																  
													<div class="col-xs-6" style="margin-bottom:15px;">
													<label>* Email Address:</label>
														<input type="text" name="email" id="email" class="form-control " placeholder="Email Address">
													</div>
													                                                     
													<div class="col-xs-6" style="margin-bottom:15px;">
													<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* I'm a...</label>
														<select name="select" id="select" class="form-control ">
														<option value="CIO">CIO</option>
                                                        <option value="ICT Vendor">ICT Vendor</option>
                                                        <option value="Partner">Partner</option>
                                                        <option value="Other">Other</option>
                                                        </select>		
													</div>
													<div class="col-xs-12" style="margin-bottom:15px;">
													<label>&nbsp;* Your Message:</label>
														<textarea type="text" name="message" id="message" class="form-control " placeholder="Message" rows="4"></textarea>
													</div>
													<div class="col-xs-12" style="margin-bottom:5px;">
														<input class="btn_edit_dr btn btn-danger btn-lg col-xs-4" name="Submit" value="Submit" type="submit" style="margin-left: 250px;margin-top: 30px;">
													</div>
												</div>
											</div>
										</div>
										 </form>
										<div class="col-md-4">
											<div class="well" style="background:white">
												<div class="clsCont_data" style="padding:0px;">
													<div class="cls_img" style="text-align:center;"><img src="images/abt_ico4.png" width="90px;"/></div>
													<div class="clsLine"></div>
													<h1>Address</h1>
													<p>
														<b>CXO Honour Headquaters</b><br/>
														100 Cecil Street, #10-01<br/>
														The Globe, Singapore 069532<br/>
													</p>
													<div class="clsLine"></div>
													<p>
														<b>CIO Honour</b><br/>
														Graha BIP, 7th Floor<br/>
														Jl. Gatot Subroto Kav 23 Jakarta 12930,<br/> Indonesia
													</p>
												</div>	<!--clsCont_data-->
											</div>
										</div>
										
										
									</div>	<!--clsCxo_logo_cont-->
									
								</div>	<!--clsData_cont-->
							</div>
						</div>
					</div>	<!--clsPadding_cont-->
				</div>	<!--container-->
			</div>	<!--clsLogo_ban-->
		</div>	<!--clsHeader-->
		
		
		<?php include("footer.php")?>
		
		
	</div>	<!--clsWrapper-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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
  </body>
</html>