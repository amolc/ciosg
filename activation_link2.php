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
		$mail->setFrom($from, 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo($reply, 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		$confirm_url="<a  href='http://cio.fountaintechies.com/accepted.php?id=".$str."'>click here to activate your account</a>";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO HONOUR';
		$mail->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
           
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
				<img src="http://cio.fountaintechies.com/images/logo2.png" align="center" width="160px"/>
              </div>      
			  <!--Acoount Details-->
			  <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Dear&nbsp;'. $registration_name.',</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Below are the login credentials for your profile.</div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Email address : &nbsp;'. $registration_email.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Password : &nbsp;'. $pass.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;">Please click on the link to activate your account  :  &nbsp; <a  href="http://cio.fountaintechies.com/vendor_accepted.php?id="'.$str.'">Activate you profile </a>.</div>
			    <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;">Need help?  :  &nbsp; <a href="'.$web_url.'/contact_us.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Contact US</a></div>
       
</div>
</body>
</html>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
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
		$mail->setFrom('registration@cxohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@cxohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 $confirm_url="<a  href='http://cio.fountaintechies.com/vendor_accepted.php?id=".$str."'>click here to activate your account</a>";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO Honour';
		$mail->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
           
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
				<img src="http://cio.fountaintechies.com/images/logo2.png" align="center" width="160px"/>
              </div>      
			  <!--Acoount Details-->
			  <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Dear&nbsp;'. $registration_name.',</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Below are the login credentials for your profile.</div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Email address : &nbsp;'. $registration_email.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Password : &nbsp;'. $pass.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;">Please click on the link to activate your account  :  &nbsp; <a  href="http://cio.fountaintechies.com/vendor_accepted.php?id="'.$str.'">Activate you profile </a>.</div>
			    <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;">Need help?  :  &nbsp; <a href="'.$web_url.'/contact_us.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Contact US</a></div>
       
</div>
</body>
</html>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
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
		$mail->setFrom('registration@cxohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@cxohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 $confirm_url="Your application is under review. We will get back to you in a shortly";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO Honour';
		$mail->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
           
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
				<img src="http://cio.fountaintechies.com/images/logo2.png" align="center" width="160px"/>
              </div>      
			  <!--Acoount Details-->
			  <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; margin:0% 5%; padding:10px;"><b>Dear&nbsp;'. $registration_name.',</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
			    <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Your request is under review, we shall get back to you shortly .
 </div>
            
            <div style="float:left; width:100%;">
            	<div style="float:left; margin:51px; width:96%;">
               	  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
                                                        	
                    <li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858;  padding:0px 10px 0px 0px;">Need help?</a></li>
                                                            
                    <li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/contact_us.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Contact US</a></li>
                  </ul>
                 
              </div>
            </div>
       
</div>
</body>
</html>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
    $mail->addAddress('registration@cxohonour.com'); 
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
