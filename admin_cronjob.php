<?php
	include('sql_config/database/cio_db.php'); 
	require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
	$today=date("Y-m-d"); 
	$new_company=array();
	$result=mysql_query("select name from parent_company where inserted_date='$today' ")or die(mysql_error());
	while($row=mysql_fetch_array($result))
	{
		array_push($new_company,$row['name']);
	}
	$count=sizeof($new_company);
	
	$registration_email="jyoti61390@gmail.com";
	
	
		$mail = new PHPMailer;
		  
		$mail->isSMTP();  
		$mail->Host = 'smtp.mandrillapp.com';                                      // Set mailer to use SMTP
		//$mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;    
		$mail->Username = 'ankush.lomte@fountaintechies.com';             // Enable SMTP authentication
	//	$mail->Username = 'gigsterjames';   
		$mail->Password = 'dvZ19kPylIgqIO6QvDLN5g';                // SMTP username
		//$mail->Password = 'Gigsteremail78';               // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('registration@ciohonour.com', 'CIO HONOUR');     //Set who the message is to be sent from
		$mail->addReplyTo('registration@ciohonour.com', 'CIO HONOUR');  //Set an alternative reply-to address
		// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
		$mail->addAddress($registration_email); 
		$mail->WordWrap = 500;      
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'List of new companies';
		$mail->Body    = '
					<div style=" height:870px; padding:25px; background:#eaeaea">
						<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
							<div style="width:100%; height:65px; float:left; background:#20201f;">
								<div style=" width:115px;text-align:center; float:left;">
									The new companies which are added by cio:
										'.for($i=0;$i<$count;$i++)
										  {
										  	 echo $new_company[$i];
										  }.'
								</div>
							</div> 
													
							<div style="float:left; width:100%;">
								<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
									<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
										<div style="float:left; margin:0px; width:96%;">
											<p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2015 CIO HONOUR Singapore. All Rights Reserved.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
';

		$mail->AltBody = 'Check Attachment'; 
		 // $mail->msgHTML(file_get_contents('email_template.php'), dirname(__FILE__));
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
    $mail->ClearAllRecipients();
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
    $mail->addAddress('$from'); 
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
	
	
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	