<?php

//include phpmailer
require_once('class.phpmailer.php');

//SMTP Settings
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true; 
$mail->SMTPSecure = "tls";  
$mail->Host       = "email-smtp.us-east-1.amazonaws.com";
$mail->Username   = "AKIAIO5B5XFK2NHGS6EA";
$mail->Password   = "AuDC4IS/5n7Fa1JrEvL2bxThoVjCG9bEnLgvw3k1AdUZ";
//


$mail->SetFrom('registration@cio-choice.sg', 'Sender Name'); //from (verified email address)
$mail->Subject = "Email Subject"; //subject

//message
$body = "This is a test message.";
$body = eregi_replace("[\]",'',$body);
$mail->MsgHTML($body);
//

//recipient
$mail->AddAddress("developer@day7.co", "Test Recipient"); 

//Success
if ($mail->Send()) { 
	echo "Message sent!"; die; 
}

//Error
if(!$mail->Send()) { 
	echo "Mailer Error: " . $mail->ErrorInfo; 
} 

?>
