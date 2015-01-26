<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<!--javascript form validator start-->
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
<!--javascript form validator end-->
                


</head>

<body>

     <?php             
											   include('sql_config/database/cio_db.php'); 
											   include('top_header.php');
											   include('header.php');
									?>
									
                                   
                                        
                                 
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                              <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
										
			
										 <!--<form  action="<?php $_SERVER["PHP_SELF"];?>" method="post">-->
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onsubmit="return validateForm(this.id)" >
                                         
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Get in Touch</h1>
                                                  <div class="contact_details_2 fl">
                                                  	<a href="contact_us.php" class="active">Contact Details</a>
                                                    <a href="faq.php">FAQs</a> 
													<br />
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
									echo "<span style='margin-left: 162px;font-size: 2em;'> Message Send Successful</span>";
									
												
										require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
										 $mail2 = new PHPMailer;
																		 
										$mail2->isSMTP();                                      // Set mailer to use SMTP
										$mail2->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
										$mail2->SMTPAuth = true;                               // Enable SMTP authentication
										$mail2->Username = 'dayseven';                   // SMTP username
										$mail2->Password = '7sendgrid';               // SMTP password
										$mail2->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail2->Port = 587;                                     //Set the SMTP port number - 587 for authenticated TLS
										$mail2->setFrom('registration@cio-honour.sg', 'CIO HONOUR');     //Set who the message is to be sent from
										$mail2->addReplyTo('registration@cio-honour.sg', 'CIO HONOUR');  //Set an alternative reply-to address
										$mail2->addAddress('registration@cio-honour.sg');               // Name is optional
                                        //$mail2->addAddress('mark.lauw@day7.co');
                                        $mail2->WordWrap = 500;
										$mail2->isHTML(true);                                  // Set email format to HTML
										$mail2->Subject = 'Registration Email';
										$mail2->Body    = '
											<html>
											<body style="padding:0px; margin:0px;">
											<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
																<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
																		<div style=" width:210px;height: 225px; margin:0 auto;">
																		<a href="#" style="height:245px;"><img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
																		<div style="clear:both;"></div>
																		</div>
																	</div>
																	<div style="width:100%; height:65px; float:left; background:#20201f;">
																			<div style=" width:115px;text-align:center; float:left;">
																			<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
																			</div>
																  </div>
																	<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																				<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																					
																				</h1>
																	  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
																			
																	  </p>
																	  
																	  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">Name</p>
																				
																				<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$first_name.'</p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">Email </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$email.'</p>
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">Message </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$message.'</p>
																				
																	  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																					<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO CHOICE SINGAPORE</a>
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
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/registration.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Register</a></li>
																													
																			<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																													
																			<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
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
																							$mail2->AltBody = 'hi developer how r u?';										 
										if(!$mail2->send()) 
										{
										   echo 'Message could not be sent.';
										   echo 'Mailer Error: ' . $mail2->ErrorInfo;
										   exit;
										}
										
									
								}
								else 
								{
									echo "error";
								}

						}
					
					

						?>
													
                                                  </div>
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  	<div class="contact_address fl">
                                                    <span>Please feel free to get in touch using these details or the handy form on the right...</span>
                                                      <p>Email: <a href="mailto:contactus@cio-honour.sg">contactus@cio-honour.sg</a><br>
                                                      <br>
                                                        Telephone: +65 9668 2895<br>
                                                        <br>
                                                        Address: 100 Cecil Street,<br>
                                                        #10-01 The Globe, Singapore 069532</p>
                                                    </div>
                                                    
                                                    <div class="contact_form fr">
                                                    	<label>* First Name:</label>
                                                        <input name="first_name" type="text">
                                                        <label>* Last Name:</label>
                                                        <input name="last_name" type="text">
                                                        <label>* Email Address:</label>
                                                        <input name="email" type="text">
                                                        <label>* I'm a...</label>
                                                        <select name="select" id="select">
														<option value="CIO">CIO</option>
                                                        <option value="ICT Vendor">ICT Vendor</option>
                                                        <option value="Partner">Partner</option>
                                                        <option value="Other">Other</option>
                                                        </select>
														<label>* Your Message:</label>
                                                        <textarea name="message" cols="" rows=""></textarea>
                                              			<input name="Submit" value="Submit" type="submit">
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                       </form>
                                           <?php 
           
											include('quick_contact.php');
											include('footer.php');
											
											 ?>


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

</body>
</html>
