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
		$mail->Username = 'gigsterjames';                   // SMTP username
		$mail->Password = 'Gigsteremail78';              // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom($from, 'CIO-HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo($reply, 'CIO-HONOUR ');  //Set an alternative reply-to address
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
			  <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;"><b>Dear&nbsp;'. $registration_name.',</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Thank you for registering with CIO HONOUR!!! </div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Below are the login credentials for your profile.</div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;"><b>Email address : &nbsp;'. $registration_email.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;"><b>Password : &nbsp;'. $pass.'</b></div>
			   <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Please click on the link to activate your account  :  &nbsp; <a  href="http://cio.fountaintechies.com/vendor_accepted.php?id="'.$str.'">Activate you profile </a>.</div>
			    <div style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:17px;  margin:0% 5%; padding:10px;">Need help?  :  &nbsp; <a href="'.$web_url.'/contact_us.php" font-size:13px; text-decoration: underline;>Contact US</a></div>
       
</div>
</body>
</html>
';
    $mail->send();
	echo "OK";
?>