<?php
// Server Name:
// email-smtp.us-west-2.amazonaws.com

// SMTP Username:
// AKIAIO5B5XFK2NHGS6EA
// SMTP Password:
// AuDC4IS/5n7Fa1JrEvL2bxThoVjCG9bEnLgvw3k1AdUZ 

// Port:25, 465 or 587
// Use Transport Layer Security (TLS):Yes
// [4/1/2014 1:13:41 PM] day7techies: email_function.php
// [4/1/2014 1:13:46 PM] day7techies: 9,11, 12
// [4/1/2014 1:14:17 PM] day7techies: $mail->setFrom('ciochoice.sg@gmail.com', 'Cio choice');     //Set who the message is to be sent from
  // $mail->addReplyTo('ciochoice.sg@gmail.com', 'Cio choice');
  
  
  
require_once('ses.php');
$ses = new SimpleEmailService('AKIAIO5B5XFK2NHGS6EA', 'AuDC4IS/5n7Fa1JrEvL2bxThoVjCG9bEnLgvw3k1AdUZ ');
$m = new SimpleEmailServiceMessage();
$m->addTo('developer@day7.co');
$m->setFrom('ciochoice.sg@gmail.com');
$m->setSubject('Hello, world!');
$m->setMessageFromString('This is the message body.');

print_r($ses->sendEmail($m));

?>