<?php 
	$str=$_GET["id"];
	// echo $str;
	$status="accepted";
	//$str="".$str."";
	$con = mysql_connect('localhost','ciochoice', '10gXWOqeaf');
	
	 $db	 = mysql_select_db('cio_choice_db');
	 
	$sql = "UPDATE user_cio SET registration_status='Active' WHERE confirm_id='$str'";
	
	   
	$query = mysql_query($sql,$con);
	
	
	if($query)
	{
		//echo "executed";
	}
	else{
	//echo "Not executed";
	}
		

?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CIO HONOUR</title>
		<link rel="icon" type="image/png" href="cxo_fav_ico.png">
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
             <!--   <div class="register-logo">
                    <img src="images/register/register-logo.jpg" width="961" height="219" alt="">
                </div>-->
                <!--register-logo-->
                <?php
                // include('sql_config/database/cio_db.php'); 
                // include('../vendor/autoload.php');
                include('email_function.php');
                // use Mailgun\Mailgun;

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
														


                if (isset($_POST['Submit']))
                {
                    $registration_type = check_input($_POST['Which_You_Are']);
                    $login_type = $_POST['Which_Way'];

                    $registration_name = check_input($_POST['name']);
                    $registration_email = check_input($_POST['email']);
                    $filter = explode("@", $registration_email);
                    if ($filter[1] == "gmail.com" || $filter[1] == "yahoo.com" || $filter[1] == "hotmail.com" || $filter[1] == "day7.co" )
                    {
                        header("Location: registration.php?email_error=ok"); 
                    } else
                    {

                         
                        $admin = 'andre.tan@day7.co';
                        

                        function randomPassword()
                        {
                            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                            $pass = array(); //remember to declare $pass as an array
                            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                            for ($i = 0; $i < 8; $i++)
                            {
                                $n = rand(0, $alphaLength);
                                $pass[] = $alphabet[$n];
                            }
                            return implode($pass); //turn the array into a string
                        }

                        $registration_password = randomPassword();
                        //curent date
                        $today_date = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
                        $current_date = date("m/d/Y", $today_date);

                        // if ($registration_type == 'CIO' && $login_type == 'email')
                       
						
						
                        
                        if ($registration_type == 'CIO')
                        {
                            $result = mysql_query("SELECT registration_email FROM registration WHERE registration_email='$registration_email'");
                            if (mysql_num_rows($result) > 0)
                            {
                                
                                header("Location:registration.php?exit=ok");
                            } else
                            {
                                $sql = "insert into registration(registration_name,registration_email,corperate_email,registration_password,registration_type,login_type,registration_insert_date,registration_status) values('" . $registration_name . "','" . $registration_email . "','" . $registration_email . "','" . $registration_password . "','" . $registration_type . "','" . $login_type . "','" . $current_date . "','pending')";
                                $query = mysql_query($sql);
                                if ($query)
                                {
									header("Location:registration.php?sent=ok");
                                    email_to_cio_signup($registration_name, $registration_email, $web_url,$registration_type); //email function for cio
                                   $mail2 = new PHPMailer;
																		 
										$mail2->isSMTP();                                      // Set mailer to use SMTP
										$mail2->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
										$mail2->SMTPAuth = true;                               // Enable SMTP authentication
										$mail2->Username = 'dayseven';                   // SMTP username
										$mail2->Password = '7sendgrid';               // SMTP password
										$mail2->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail2->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
										$mail2->setFrom('registration@cio-honour.sg', 'CIO HONOUR');     //Set who the message is to be sent from
										$mail2->addReplyTo('registration@cio-honour.sg', 'CIO HONOUR');  //Set an alternative reply-to address
										$mail2->addAddress($admin);                // Name is optional
										$mail2->addAddress('preeti@cio-honour.sg'); 
                                                                                $mail2->WordWrap = 500;       
										$mail2->isHTML(true);                                  // Set email format to HTML
										$mail2->Subject = 'Thank you for joining us!';
										$mail2->Body    = '
											<html>
											<body style="padding:0px; margin:0px;">
											<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
																<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
																		<div style=" width:210px;height: 225px; margin:0 auto;">
																		<a href="'.$web_url.'/index.php" style="height:245px;"><img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
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
																					Accept your CIO Honour Singapore registration request.
																				</h1>
																	  <p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
																		Accept your CIO Honour Singapore registration request. <a href="'.$web_url.'/admin/admin_pending_register.php">Accept</a>
																		Please accept a new '.$registration_type.' registration request for cio-choice.sg
																	  </p>
																	  
																	  <p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Your Full Name</p>
																				
																				<p style=" float:left; width:86%; display:block;  font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_name.'</p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Company Email Address </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family:Source Sans Pro; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_email.'</p>
																				
																	  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																					<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO Honour SINGAPORE</a>
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
																		  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO Honour Singapore. All Rights Reserved.</p>
																	  </div>
																	</div>
																	  
																  </div>
																  
																	
																	
																</div>
																
																<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family:Source Sans Pro; font-weight:400px;">
																This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO Honour account. This is a one-time email. You received this email because you signed up for a CIO Honour account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
																
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
                            }
                        } else if ($registration_type == 'ICTVendor')
                        {
                            $result1 = mysql_query("SELECT registration_email FROM registration WHERE registration_email='$registration_email'");
                            if (mysql_num_rows($result1) > 0)
                            {
                            	echo "wrongendpoint" ;
                               	header("Location:registration.php?exit=ok");
                            } else
                            {
                            	echo "endpoint1" ;
								
								
                                $sql1 = "insert into registration(registration_name,registration_email,corperate_email,registration_password,registration_type,login_type,registration_insert_date,registration_status) values('" . $registration_name . "','" . $registration_email . "','" . $registration_email . "','" . $registration_password . "','" . $registration_type . "','" . $login_type . "','" . $current_date . "','pending')";
                                $query1 = mysql_query($sql1);

                                if ($query1)
                                {
                                   // header("Location:registration.php?sent=ok");
                                   
									 
				                      
			                     	echo $registration_type ;
			                     	echo "<br>" ;
			                     	echo $login_type ;
									
                                    email_to_cio_signup($registration_name, $registration_email, $web_url,$registration_type); //email function for ict
                                    
                                    echo "endpoint5" ;
                                    
                                
                                    header("Location:registration.php?sent=ok");
                                    
									//exit(); 
									
                                	$mail4 = new PHPMailer; 
																		 
										$mail4->isSMTP();                                      // Set mailer to use SMTP
										$mail4->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
										$mail4->SMTPAuth = true;                               // Enable SMTP authentication
										$mail4->Username = 'dayseven';                   // SMTP username
										$mail4->Password = '7sendgrid';               // SMTP password
										$mail4->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
										$mail4->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
										$mail4->setFrom('registration@cio-Honour.sg', 'CIO Honour');     //Set who the message is to be sent from
										$mail4->addReplyTo('registration@cio-Honour.sg', 'CIO Honour');  //Set an alternative reply-to address
										$mail4->addAddress($admin);               // Name is optional
										$mail4->WordWrap = 500;                                 // Set word wrap to 50 characters
										$mail4->isHTML(true);                                  // Set email format to HTML
										 
										$mail4->Subject = 'Registration Email';
											$mail4->Body    = '
											<html>
											<body style="padding:0px; margin:0px;">
											<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
												<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
																	<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
																		<div style=" width:210px;height: 225px; margin:0 auto;">
																		<a href="'.$web_url.'/index.php" style="height:245px;"><img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
																		<div style="clear:both;"></div>
																		</div>
																	</div>
																	<div style="width:100%; height:65px; float:left; background:#20201f;">
																			<div style=" width:115px;text-align:center; float:left;">
																			<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
																			</div>
																  </div>
																	<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
																				<h1 style=" float:left; width:90%; font-family: Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">
																					Accept your CIO Honour Singapore registration request.
																				</h1>
																	  <p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
																			Accept your CIO Honour Singapore registration request. <a href="'.$web_url.'/admin/admin_pending_register.php">Accept</a>
																		Please accept a new ICT Vendor registration request for cio-Honour.sg
																	  </p>
																	  
																	  <p style=" float:left; width:86%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">1. Your Full Name</p>
																				
																				<p style=" float:left; width:86%; display:block;  font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_name.'</p>
																				
																				<p style=" float:left; width:86%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:15px 7% 0% 7%; padding:0px; font-size:18px; font-weight:bold;">2. Company Email Address </p>
																				
																				<p style=" float:left; width:86%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:5px 7% 0% 7%; padding:0px; font-size:15px; font-weight:400;">'.$registration_email.'</p>
																				
																	  <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
																					<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO HONOUR SINGAPORE</a>
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
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																													
																			<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/registration.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Register</a></li>
																													
																			<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																													
																			<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
																		  </ul>
																		  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2015 CIO HONOUR Singapore. All Rights Reserved.</p>
																	  </div>
																	</div>
																	  
																  </div>
																  
																	
																	
																</div>
																161
																<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
																This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO Honour account. This is a one-time email. You received this email because you signed up for a CIO Honour account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
																
																<div style="clear:both;"></div>
														</div></body></html>'; 
										$mail4->AltBody = 'hi developer how r u?';												 
										if(!$mail4->send())
										{
										   echo 'Message could not be sent.';
										   echo 'Mailer Error: ' . $mail4->ErrorInfo;
										   exit;
										}

                                } else
                                {
                                    echo "error";
                                }
                            }
                        }
                    }
                } else
                {

                    if (isset($_REQUEST['sent']))
                    {
                        echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'>Thank you for registering with CIO HONOUR Singapore, our moderators will review your account and keep you posted. Please check your email in the next 12-24 hours.</h1>";
                    }
                    if (isset($_REQUEST['exit']))
                    {
                        echo "<h1 style='margin-bottom: 22px;text-align: center;line-height: 30px;'>Sorry this email address is already register with CIO Honour Singapore, please enter a new email address.</h1>";
                    }
                    // if(isset($_REQUEST['not_reg']))
                    // {
                    // echo "<h1 style='color:red;margin-bottom: 22px;text-align: center;line-height: 30px;'>Error: Your email address is not found in our system. Please register </h1>";
                    // }
                    ?>
                    <form class="register-form" id="myform2" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                      <!--black-box-->
                      <!--black-box-->
<div class="clear"></div>


                        <div class="red-box">
                            <h2><span>Congratulations! Your account has been successfully activated with CXO HONOUR for use.</span></h2>	
								<h4><a style="text-decoration:underline" href="index.php">Click here to login</a></h4>	
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


</body>
</html>
