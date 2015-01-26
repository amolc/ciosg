<?php
session_start();
   include('sql_config/database/cio_db.php');
if (isset($_SESSION['username']) && isset($_SESSION['cio']))
{
    $name = $_SESSION['user_name'];
    $type = $_SESSION['cio'];
		if (isset($_SESSION['corperate_email'])) {
		
		$corperate_email = $_SESSION['corperate_email'];
		// $corperate_email = "mark.devday7@day7.co";
		// $disnone="";
	// $login_type_linkedin="";
		 // $login_type_result = mysql_query("SELECT login_type FROM registration WHERE corperate_email ='$corperate_email'");
                                    // while ($login_type_row = mysql_fetch_array($login_type_result))
                                    // {
                                        // $login_type_linkedin = $login_type_row['login_type'];
                                       
									// }
									// if($login_type_linkedin == 'Linkedin')
									// {
										// $disnone = 'none';
									// }
									// else {
									// $disnone = 'block';
									// }
	
}
} else
{
    header('Location: login.php');
}
				// $admin_email = "andre.tan@day7.co";
				$admin_email = "survey@cio-choice.sg";
							require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
 // Matthew.Harper@day7.co
				$mail = new PHPMailer;
				 
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dayseven';                   // SMTP username
				$mail->Password = '7sendgrid';               // SMTP password            // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
				$mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
				$mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');   //Set an alternative reply-to address
				// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
				$mail->addAddress($admin_email);               // Name is optional 
                             
				$mail->addCC('survey@cio-choice.sg');
                                $mail->addCC('preeti@cio-choice.sg');
				// $mail->addBCC('bcc@example.com');
				$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
				// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				 
				$mail->Subject = 'CIO Survey Request Details';
				$mail->Body    = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Survey Monkey Email</title>
</head>

<body style="padding:0px; margin:0px;">

	  <div>
           
            <span style="text-decoration:none;color:#20201f;font-weight:400!important;font-family:Arial,Helvetica,sans-serif">
             '.$corperate_email.', '.$name.'
            </span>
     </div>
	  
    
</div>
</body>
</html>

';
				$mail->AltBody = 'Test Mail';
				 
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				 
				if(!$mail->send()) {
				   // echo 'Message could not be sent.';
				   // echo 'Mailer Error: ' . $mail->ErrorInfo;
				   header("Location: cio_landing.php?error=ok");
				 
				}
				else {
				header("Location: cio_landing.php?send=ok");
				// echo"Email Send Successfull";
				}
						
?>