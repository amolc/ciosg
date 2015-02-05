<?php
include('sql_config/cio_db.php'); 
	$sql="SELECT * FROM `mail_settings`";
	$rs = mysql_query($sql) or die ("Query failed");
	$row = mysql_fetch_array($rs);
	$from=$row['from'];
	$reply=$row['reply'];
   
 		require 'admin/PHPMailerAutoload.php';
		 
		$registration_name=$_POST['name'];
		$registration_email=$_POST['email'];
		$web_url ="http://cio-choice.sg";
		$registration_type=$_POST['reg_type'];
		$pass=$_POST['pass'];
		$length=10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$str=$randomString;

		$mail = new PHPMailer;
		  
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'gigster';                   // SMTP username
		$mail->Password = '10gXWOqeaf';               // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom($from, 'CIO-HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo($reply, 'CIO-HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 $confirm_url="<a  href='http://cio.fountaintechies.com/vendor_accepted.php?id=".$str."'>click here to activate your account</a>";
		$mail->Subject = 'Congratulations! Your Have Registered With CIO-HONOUR';
		$mail->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
    		
            	
            
            <div style="width:100%; height:65px; float:left; background:#20201f;">
                	
          </div>
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
                    	<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">Thank you for your CIO-HONOUR Singapore Membership application</h1>
              <hr>
			  <hr>
			  
			  <!--Acoount Details-->
			  <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family:Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;"><span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family:Arial, Helvetica, sans-serif;">Your Account Details </span></div>
			  <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family:Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Email: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family:Arial, Helvetica, sans-serif;">'.$registration_email.'</span></div>
			  <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family:Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Password: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family:Arial, Helvetica, sans-serif;">'.$pass.'</span></div>
			  <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family:Arial, Helvetica, sans-serif; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;"> <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family:Arial, Helvetica, sans-serif;">'.$confirm_url.'</span></div>
			
		  
		  
		  
		  
		  
		  
            <div style="float:left; width:100%;">
          	<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
            <div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
            </div>
       	  	<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
            <div style="width:60%; float:left; height:80px;">
                	<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
                    <span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161">Need help?</span>
				  <a href="'.$web_url.'/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161; font-weight:bold;">Send us your question</a>
              </div>
            
            
            <div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
            	<div style="float:left; margin:0px; width:96%;">
               	  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
                                                        	
                    <li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
                                                            
                    <li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
                  </ul>
                  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO-HONOUR Singapore. All Rights Reserved.</p>
              </div>
            </div>
              
          </div>
          
          	
            
        </div>
        
        <div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
       	This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO-HONOUR account. This is a one-time email. You received this email because you signed up for a CIO-HONOUR account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
        
        <div style="clear:both !important;"></div>
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
    $mail->Subject = 'A new member has just registered using the Cio-Choice.sg network.';
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
	echo "OK";
	?>