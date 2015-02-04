<?php 
	//email send to cio when sign up
    require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
		$web_url ="http://google.com";
	function email_to_cio_signup($registration_name , $registration_email ,$web_url,$registration_type) {

		$mail = new PHPMailer;
		  
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		 
		$mail->Subject = 'Congratulations! Your Have Registered With CIO Choice';
		$mail->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">
    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
    		
            	
            
            <div style="width:100%; height:65px; float:left; background:#20201f;">
                	<div style=" width:115px;text-align:center; float:left;">
                   	<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
                    </div>
          </div>
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
                    	<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">Thank you for your CIO CHOICE Singapore Membership application</h1>
              <hr>
			  <hr>
			  
			  <!--Acoount Details-->
			  
			  
			  <div style="float:left; border-left:#CCC solid 1px; border-right:#CCC solid 1px; border-bottom:#CCC solid 1px; width:508px; padding:0px 10px 10px 10px; margin-left:10px">
                <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family: "Lato"; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Email: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: "Source Sans Pro"!important;">Deepak.Sharma@cio-choice.sg</span></div>
                
                
            <div style=" float:left; width:508px; text-decoration:none; line-height:75px; font-family: "Lato"; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Password: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: "Source Sans Pro"!important;">xsYI9723b</span></div>
                
                
          </div>
			  
			  
			  
			  
			  
			  
                        
              <div style="float:left; width:90%; margin:30px 5% 0px 5%;"> 
                       		<a href="'.$web_url.'/index.php" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">Click Here To Confirm Your Registration!</a>
                        </div>
          </div>
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
                  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
              </div>
            </div>
              
          </div>
          
          	
            
        </div>
        
        <div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
       	This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
        
        <div style="clear:both !important;"></div>
</div>
</body>
</html>
';

		$mail->AltBody = 'hi developer how r u?'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('andre.tan@day7.co'); 
    $mail->addAddress('registration@cio-choice.sg'); 
    $mail->addAddress('matthew.harper@day7.co'); 
    $mail->addAddress('preeti@cio-choice.sg'); 
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
	}
	//ict sign up email
	function email_to_ict_signup($registration_name , $registration_email , $web_url) 
	{
		
		
		 require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
		 
		 echo "endpoint2" ;
		 
		$mail3 = new PHPMailer;
		 
		$mail3->isSMTP();                                      // Set mailer to use SMTP
		$mail3->Host = 'smtp.gmail.com';                       // Specify main and backup server
		$mail3->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';            // SMTP password
		$mail3->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail3->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail3->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from 
		$mail3->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');  //Set an alternative reply-to address
		$mail3->addAddress($registration_email);
    

		$mail3->isHTML(true);                                   // Set email format 
		$mail3->Subject = 'Thank You for joining cio-choice.sg';
		$mail3->Body    = '
		<html>
		<body style="padding:0px; margin:0px;">
		<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">

    	<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
    		
            <div style="width:100%; height:65px; float:left; background:#20201f;">
                	<div style=" width:115px;text-align:center; float:left;">
                   	<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">home</a>
                    </div>
          </div>
            <div style="width:100%; float:left; padding:20px 0px; text-align:center;">
                    	<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">Thank you for your CIO CHOICE Singapore Membership application</h1>
                        
              <center>  <div style="width:530px; height:55px; float:left; background:#20201f; margin-left:10px;">
                	<div style=" float:left;text-decoration:none; line-height:55px; font-family: "Lato"; color:#FFF; font-size:15px; font-weight:400; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px;"><img style="float:left; margin:10px 10px 0px 15px;" src="http://staging.cio-choice.sg/images/cio_area_icon.jpg" width="41" height="34">Your Account Details</div>
                    
                    	<div style="float:right; margin:10px 20px 0px 0px;">
                       		<a href="#" style="width:117px; line-height:35px; float:left; text-shadow:0px 2px #4b0e0e; color:#FFF; font-family:"Lato"; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */"><img src="http://staging.cio-choice.sg/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">Login</a>
                        </div>
          </div>
          	<div style="float:left; border-left:#CCC solid 1px; border-right:#CCC solid 1px; border-bottom:#CCC solid 1px; width:508px; padding:0px 10px 10px 10px; margin-left:10px">
                <div style=" float:left; width:508px; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family: "Lato"; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Email: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: "Source Sans Pro"!important;">Deepak.Sharma@cio-choice.sg</span></div>
                
                
            <div style=" float:left; width:508px; text-decoration:none; line-height:75px; font-family: "Lato"; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">Password: <span style="text-decoration:none; color:#20201f; font-weight:400 !important; font-family: "Source Sans Pro"!important;">xsYI9723b</span></div>
                
                
          </div>  </center>      
        
                        
              <div style="float:left; width:90%; margin:30px 5% 0px 5%;">
                       		<a href="'.$web_url.'/index.php" style="width:100%; line-height:22px; padding:15px 0px; text-align:center; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:5px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">Click Here To Confirm Your Registration</a>
                        </div> 
          </div>
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
		$mail3->AltBody = 'test';

		$mail3->send() ;
		
    
		echo "endpoint3" ;
		
 		    //$mail3->ClearAllRecipients();
		   // $mail3->addAddress('andre.tan@day7.co'); 
		   // $mail3->addAddress('mark.devday7@day7.co'); 
		   // $mail3->Subject = 'A new member has just registered using the Cio-Choice.sg network.';
		   // $mail3->Body='
		   // <html>
		   // <body>
		   //  <ul style="  float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
		   //                                                       
		   //                 <li style=" float:left; list-style-type: none;"> Name : '.$registration_name.'</li>
		   //                                                         
		   //                 <li style="clear:both; float:left; list-style-type: none; margin:0px;">Email : '.$registration_email.'</li>
		   //               </ul>
		   // </body>
		   // </html>';
		   // $mail3->send();
	
												
	}
	


?>