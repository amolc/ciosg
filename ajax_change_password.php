<?php
		 session_start();

		include('sql_config/database/cio_db.php'); 

			$name = $_SESSION['username'];
			
			$old = mysql_real_escape_string($_POST['old_pass']);
			
			$new = mysql_real_escape_string($_POST['new_pass']);
			$retype = mysql_real_escape_string($_POST['re_pass']);
			if($old =='' || $new =='' || $retype =='') {
				echo"Please Fill The Required Fields";
			}
			
			else {
			
			$sql = "select * from registration where registration_email='$name'";
			$res = mysql_query($sql)or die(mysql_error());
			$row = mysql_fetch_array($res);
			$password = $row['registration_password'];
			// echo $password ;
			 
			if($new != $retype)
			{			
				// header("Location: change_password_ict.php?dm=ok");
				echo"Match Password Wrong";
			}
			
			elseif($old != $password)
			{
				// header("Location: change_password_ict.php?old=ok");
					echo"Old Password Wrong";
			}
			elseif($old == $password)
			{
				$sql2 = "update registration set registration_password='$new' where registration_email='$name'";
				mysql_query($sql2)or die(mysql_error());							
				// header("Location: change_password_ict.php?change=ok");
					echo"Password Change Successful";
			}
			else
			{
			
				// header("Location: change_password_ict.php?error=ok");
			}
		
			// $today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
			// $current_date = date("m/d/Y", $today_date);
			
				// $sql   = "insert into contact_us(contact_us_first_name,contact_us_last_name,contact_us_email,contact_us_im,contact_us_message,contact_us_insert_date) values('".$first_name."','".$last_name."','".$email."','".$select."','".$message."','".$current_date."')";
		
				// $query = mysql_query($sql);
				// if($query)
				// {
					// echo "<span style='margin-left: 162px;font-size: 2em;'> successful</span>";
													
									// require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';
						// $mail4 = new PHPMailer;
														 
						// $mail4->isSMTP();                                      // Set mailer to use SMTP
						// $mail4->Host = 'smtp.gmail.com';                       // Specify main and backup server
						// $mail4->SMTPAuth = true;                               // Enable SMTP authentication
						// $mail4->Username = 'ciochoice.sg@gmail.com';                   // SMTP username
						// $mail4->Password = '9cXWOqeaf';               // SMTP password
						// $mail4->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
						// $mail4->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
						// $mail4->setFrom('ciochoice.sg@gmail.com', 'Cio choice');     //Set who the message is to be sent from
						// $mail4->addReplyTo('ciochoice.sg@gmail.com', 'Cio choice');  //Set an alternative reply-to address
						// $mail4->addAddress('contactus@cio-choice.sg');               // Name is optional
						// $mail4->WordWrap = 500;                                 // Set word wrap to 50 characters
						// $mail4->isHTML(true);                                  // Set email format to HTML
						 
						// $mail4->Subject = 'Registration Email';
							// $mail4->Body    = 'Dear Admin <br />
												// Name: '.$first_name.'<br />
												// Email: '.$email.' <br />
												// Message: '.$message.'
												 
												// '; 
						// $mail4->AltBody = 'hi developer how r u?';												 
						// if(!$mail4->send())
						// {
						   // echo 'Message could not be sent.';
						   // echo 'Mailer Error: ' . $mail4->ErrorInfo;
						   // exit;
						// }
					
				// }
				// else 
				// {  
					// echo "error";
				// }

		}
	
	

		?>