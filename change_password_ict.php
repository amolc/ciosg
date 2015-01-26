<?php
 session_start();
  // include('../include/database/db.php'); 
if(isset($_SESSION['username']) && isset($_SESSION['ict'])){
	$name = $_SESSION['user_name'];
	$type = $_SESSION['cio'];
}
else {
	header('Location: login.php');
}
?>
<?php
						

						include('sql_config/database/cio_db.php'); 

						if($_POST['Submit'] == "Submit")
						{
					$name = $_SESSION['username'];
							
							$old = mysql_real_escape_string($_POST['old']);
							$new = mysql_real_escape_string($_POST['new']);
							$retype = mysql_real_escape_string($_POST['retype']);
							
							$sql = "select * from registration where registration_email='$name'";
							$res = mysql_query($sql)or die(mysql_error());
							$row = mysql_fetch_array($res);
							$password = $row['registration_password'];
							
							
							if($new != $retype)
							{
							
							header("Location: change_password_ict.php?dm=ok");
							}
							
							elseif($old != $password)
							{
							
							header("Location: change_password_ict.php?old=ok");
							}
							elseif($old == $password)
							{
							$sql2 = "update registration set registration_password='$new' where registration_email='$name'";
							mysql_query($sql2)or die(mysql_error());							
							header("Location: change_password_ict.php?change=ok");
							}
							else
							{
							
							header("Location: change_password_ict.php?error=ok");
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
										//$mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<!--javascript form validator start-->
<script>
function checkEmail(email) {   
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) { return false }
    return true;
}
 
function validateForm(formName)
{    
    var obj = document.getElementById(formName);
    
    	if(obj.first_name.value == ""){ alert("First Name can not be blank."); obj.first_name.focus(); return false; } 
    	if(obj.last_name.value == ""){ alert("Last Name can not be blank."); obj.last_name.focus(); return false; } 
	if(obj.email.value == ""){ alert("Email can not be blank."); obj.email.focus(); return false; } 
    	if(obj.select.value == ""){ alert("'I am a' can not be blank."); obj.select.focus(); return false; } 
	if(checkEmail(obj.email.value) == false){ alert("Email must be valid."); obj.email.focus(); return false; }
	if(obj.message.value == ""){ alert("Message can not be blank."); obj.message.focus(); return false; } 
}            
</script>
<!--javascript form validator end-->
                


</head>

<body>

											<?php             
											   include('sql_config/database/cio_db.php'); 
											   include('top_header.php');
											   include('header.php');
											?>
                                     <div id="black_wrapper">
                                            <div class="inner_nav">
                                              <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
										
			
										 <!--<form  action="<?php $_SERVER["PHP_SELF"];?>" method="post">-->
                        
                                         
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Change Password</h1>
                                                 
						
													
													<?php if(isset($_REQUEST['dm'])){
														echo '<h1 style="color:red;">New and Confirm do not Match !!</h1>';
														}
														if(isset($_REQUEST['old'])){
														echo '<h1 style="color:red;">Old Password do not Match !!</h1>';
														}
														if(isset($_REQUEST['change'])){
														echo '<h1 style="color:green;">Password Changed !!</h1>';
														}
														if(isset($_REQUEST['error'])){
														echo '<h1 style="color:red;">Error !!</h1>';
														}
													
													?>
                                                  <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onsubmit="return validateForm(this.id)" >
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  <!--	<div class="contact_address fl">
                                                    <span>Please feel free to get in touch using these details or the handy form on the right...</span>
                                                      <p>Email: <a href="mailto:contactus@cio-choice.sg">contactus@cio-choice.sg</a><br>
                                                      <br>
                                                        Telephone: +65 9668 2895<br>
                                                        <br>
                                                        Address: 100 Cecil Street,<br>
                                                        #10-01 The Globe, Singapore 069532</p>
                                                    </div> -->
                                                    
                                                    <div style="margin-right: 140px;" class="contact_form fr">
                                                    	<label>* Old Password:</label>
                                                        <input name="old" type="password" required>
                                                        <label>* New :</label>
                                                        <input name="new" type="password" required>
                                                        <label>* Retype:</label>
                                                        <input name="retype" type="password" required>
                                                       														
                                              			<input name="Submit" value="Submit" type="submit">
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                       </form>
                                           <?php
						
           
											include('quick_contact.php');
											include('footer.php');
											
											 ?>


    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$("#content_6").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
				$("#content_7").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
			});
		})(jQuery);
	</script>

</body>
</html>
