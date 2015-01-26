<?php

//include phpmailer
require_once('class.phpmailer.php');

//SMTP Settings
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true; 
$mail->SMTPSecure = "tls"; 
$mail->Host       = "email-smtp.us-west-2.amazonaws.com";
$mail->Username   = "AKIAIBQYKU7SEX5RXM3A";
$mail->Password   = "ApQwdn5F5bMRWarvirPEhQTaS8dnnCi8KDdVx/0EYOT5";
//

$mail->SetFrom('registration@cio-choice.sg', 'CIO Choice'); //from (verified email address)
$mail->Subject = "Email Subject"; //subject

//message
$body = "test ";
$body = eregi_replace("[\]",'',$body);
$mail->MsgHTML($body);
//

//recipient
$mail->AddAddress("mark.lauw@day7.co", "Test Recipient"); 

//Success
if ($mail->Send()) { 
	echo "Message sent!"; die; 
}

//Error
if(!$mail->Send()) { 
	echo "Mailer Error: " . $mail->ErrorInfo; 
} 

?>
