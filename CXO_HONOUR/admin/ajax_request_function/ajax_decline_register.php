
<?php
include('../../sql_config/database/cio_db.php'); 

$registration_id = mysql_real_escape_string($_POST['registration_id']);
// echo $registration_id;
	$sql = mysql_query("UPDATE registration SET registration_status = 'declined' WHERE  registration_id = $registration_id");
	$result2 = mysql_query("select registration_name,registration_email,registration_type from registration  WHERE  registration_id = $registration_id");
		while ($row = mysql_fetch_array($result2)) 
		{ 
			$registration_email = $row['registration_email'];
			$registration_name = $row['registration_name'];
			$registration_type = $row['registration_type'];
			
		}
	if($sql)
	{
		
	// $registration_email = 'bilal@day7.co';
				require '../classes/PHPMailer-master/PHPMailerAutoload.php';
 
				$mail = new PHPMailer;  
				 
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dayseven';                   // SMTP username
				$mail->Password = '7sendgrid';               // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
				$mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
				$mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');   //Set an alternative reply-to address
				// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
				$mail->addAddress($registration_email);               // Name is optional
				// $mail->addCC('cc@example.com'); 
				// $mail->addBCC('bcc@example.com');
				$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
				// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				 
				$mail->Subject = 'Your Membership To Cio-Choice is Declined';
				$mail->Body    = '
				<html>
				<body style="padding:0px; margin:0px;">
				<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
    		<div style=" float:left; width:100%; height:225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
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
                    	<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0px 5%; padding:0px;">Sorry, we are unable to accept your CIO CHOICE Singapore application this time.</h1>
           	  <p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">Your Membership Application may have failed due to a number of reasons. Please ensure that you have provided the following valid details:</p>
            
              <div style="float:left; width:90%; margin:30px 5% 0px 5%;"> 
                       		<a href="#" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">return TO CIO CHOICE SINGAPORE</a>
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
                                                            
                    <li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li> 
                  </ul>
                  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
              </div>
            </div>
              
          </div>
          
          	
             
        </div>
        
        <div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
       	This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
        
        <div style="clear:both;"></div>
</div>
</body>
</html>';
				$mail->AltBody = 'hi developer how r u?';
				 
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				 
				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				 
// echo 'Message has been sent';
					/*
											$from = "marketing@day7.co";
								$to = $registration_email ;	
								$subject = "Registration Email"; 
								$message = "Dear $registration_name
											
											registration decline
											Regards
											cio-choice.sg
											"; 
											
											$mg_api = 'key-4vyeldmso9oe3t8gitphksdwz9p0tpw5';
											$mg_version = 'api.mailgun.net/v2/';
											$mg_domain = "day7.co";
											$mg_from_email = "info@samples.com";
											$mg_message_url = "https://".$mg_version.$mg_domain."/messages";
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
											curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
											curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
											curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt ($ch, CURLOPT_VERBOSE, 0);
											curl_setopt ($ch, CURLOPT_HEADER, 1);
											curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
											curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
											curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
											curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_POST, true); 
											//curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
											curl_setopt($ch, CURLOPT_HEADER, false); 
											//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
											curl_setopt($ch, CURLOPT_URL, $mg_message_url);
											curl_setopt($ch, CURLOPT_POSTFIELDS,                
													array(  'from'      => '<' . $from . '>',
															'to'        => $to, 
															'subject'   => $subject,
															'text'      => $message

														));
											$result = curl_exec($ch);
											curl_close($ch);
											$res = json_decode($result,TRUE);
											if (!empty($res))
											{
												// echo "Mail Sent ";
											}
											else
											{
												echo "Mail Failed ";
											}	*/
/*								
								$subject = "Registration";
								$message = '<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>Tour bookings</title>
									<style>
									body { margin:0px; padding:0px;}
									</style>
									</head>

									<body>
										<div>email message here decline </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$registration_email.'' . "\r\n";
									$headers .= 'From: apache@iamamol.com' . "\r\n";					
									mail( $to, $subject, $message, $headers );*/
		echo "declined";
	}
	else {
		echo "error";
	}

?>