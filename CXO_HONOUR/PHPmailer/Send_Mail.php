<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "registration@cio-choice.sg";
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host= "tls://email-smtp.us-west-1.amazonaws.com"; // Amazon SES
$mail->Port = 465;  // SMTP Port
$mail->Username = "AKIAIO5B5XFK2NHGS6EA";  // SMTP  Username
$mail->Password = "AuDC4IS/5n7Fa1JrEvL2bxThoVjCG9bEnLgvw3k1AdUZ ";  // SMTP Password
$mail->SetFrom($from, 'From Name');
$mail->AddReplyTo($from,'9lessons Labs');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return false;
else
return true;

}
?>
