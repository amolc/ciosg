<?php

include 'library.php'; // include the library file
include "classes/class.phpmailer.php"; // include the class name
if(isset($_POST["send"])){
	$email = $_POST["email"];
	$mail	= new PHPMailer; // call the class 
	$mail->IsSMTP(); 
	$mail->Host = SMTP_HOST; //Hostname of the mail server
	$mail->Port = SMTP_PORT; //Port of the SMTP like to be 25, 80, 465 or 587
	$mail->SMTPAuth = true; //Whether to use SMTP authentication
	$mail->Username = SMTP_UNAME; //Username for SMTP authentication any valid email created in your domain
	$mail->Password = SMTP_PWORD; //Password for SMTP authentication
	$mail->AddReplyTo("ciochoice.sg@gmail.com", "Cio choice"); //reply-to address
	$mail->SetFrom("ciochoice.sg@gmail.com", "Cio choice"); //From address of the mail 
	// put your while loop here like below, 
	$mail->Subject = "Your SMTP Mail"; //Subject od your mail
	$mail->AddAddress($email, "developer devday7"); //To address who will receive this email
	$mail->MsgHTML("<b>Hi, your first SMTP mail has been received. Great Job!.. <br/><br/>by <a href='http://www.asif18.com/7/php/send-mails-using-smtp-in-php-by-gmail-server-or-own-domain-server/'>Asif18</a></b>"); //Put your body of the message you can place html code here
	// $mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line, 
	$send = $mail->Send(); //Send the mails
	if($send){
		echo '<center><h3 style="color:#009933;">Mail sent successfully</h3></center>';
	}
	else{
		echo '<center><h3 style="color:#FF3300;">Mail error: </h3></center>'.$mail->ErrorInfo;
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send mails using SMTP and PHP in PHP Mailer using our own server or gmail server by Asif18</title>
<meta name="keywords" content="send mails using smpt in php, php mailer for send emails in smtp, use gmail for smtp in php, gmail smtp server name"/>
<meta name="description" content="Send mails using SMTP and PHP in PHP Mailer using our own server or gmail server"/>
<style>
.as_wrapper{
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.mytable{
	padding:20px;
	border:2px dashed #17A3F7;
	width:100%;
}
</style>
<body>
<div class="as_wrapper">
	<h1>Send mails using SMTP and PHP in PHP Mailer using our own server or gmail server</h1>
    <form action="" method="post">
    <table class="mytable">
    <tr>
    	<td><input type="email" placeholder="Email" name="email" /></td>
	</tr>
    <tr>
    	<td><input type="submit" name="send" value="Send via SMTP" /></td>
	</tr>
    </table>
    </form>
</div>
</body>
</html>
<?php
/*
require_once('classes/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = file_get_contents('contents.html');
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "yourusername@gmail.com";  // GMAIL username
$mail->Password   = "yourpassword";            // <span class="f93ata" id="f93ata_3">GMAIL password</span>

$mail->SetFrom('name@yourdomain.com', 'First Last');

$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "<span class="f93ata" id="f93ata_2">John Doe</span>");

$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    */

?>