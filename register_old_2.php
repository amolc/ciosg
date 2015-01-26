<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>cio-choice.sg</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<!-- Required CSS -->

	<!--[if lt IE 9]>
	<link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
	<![endif]-->
	
	<!-- Required script -->
	<!-- <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<script type="text/javascript" src="js/jquery.js"></script>
	<!--<link rel="stylesheet" href="slider_style.css">
	
	<script type="text/javascript" src="js/jcarousellite.js"></script>-->
	<script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>

	
<!--<script type="text/javascript" async="" src="js/ga.js"></script>-->
<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/mytweets.js"></script>-->
<link href="css/developerdevday7.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.sky.carousel-1.0.2.min.js"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
<!--  added for the video player -->
<!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "video-js.swf";
  </script>
  
<!-- added for the video player -->


<script type="text/javascript">
	$(function() {
		$('.sky-carousel').carousel({
			itemWidth: 260,
			itemHeight: 260,
			distance: 12,
			selectedItemDistance: 75,
			selectedItemZoomFactor: 1,
			unselectedItemZoomFactor: 0.5,
			unselectedItemAlpha: 0.6,
			motionStartDistance: 210,
			topMargin: 115,
			circular: true,
			loop: true,
			preload: true,
			loopRewind: true,
			gradientStartPoint: 0.35,
			gradientOverlayColor: "#ebebeb",
			gradientOverlaySize: 190,
			selectByClick: false
		});
	});	
</script>
<style type="text/css">
	@media only screen and (min-width: 960px) {#portfolio-wrapper img {min-height: 147px;}} 
	@media only screen and (min-width: 768px) and (max-width: 959px) {#portfolio-wrapper img {min-height: 115px;}}
</style>

</head>

<body>
<?php

// Turn off all error reporting
error_reporting(0);
?>  
       
                                        		<?php
													include('sql_config/database/cio_db.php'); 
														include('top_header.php');
														
													?>
<div class="header-nav">                                              
<div class="wrapper">                                                   
											<?php include('navigation.php'); ?>
      <div class="clear"></div>                                 
</div>
</div>



                                                          <div class="wrapper">              
    <div class="register-page">
    	<div class="register-logo">
            <img src="images/register/register-logo.jpg" width="961" height="219" alt="">
        </div>
        <!--register-logo-->
        				<?php

						include('sql_config/database/cio_db.php'); 

						// if($_POST['Submit'] == "Submit")
						if(isset($_POST['Submit']) && ($_POST['Submit'] == "Submit")) 
						{ 
						
					

							$selected_radio = $_POST['Which_Way'];

							if ($selected_radio = = 'email') {

								// $male_status = 'checked';
								echo "okkkk checkkkk";

							}
							// else if ($selected_radio = = 'Linkedin') {

							// $female_status = 'checked';

							// }
						
												
							
							$registration_name = mysql_real_escape_string($_POST['name']);
							$registration_email = mysql_real_escape_string($_POST['email']);
							$registration_type = mysql_real_escape_string($_POST['Which_You_Are']);
							function randomPassword() {
								$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
								$pass = array(); //remember to declare $pass as an array
								$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
								for ($i = 0; $i < 8; $i++) {
									$n = rand(0, $alphaLength);
									$pass[] = $alphabet[$n];
								}
								return implode($pass); //turn the array into a string
							}

							$registration_password = randomPassword();
							// $registration_password = rand(0,10000000000000000000);
					
								// echo $name;
								// echo $email;
						// $message = "email has been sent";
							$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
							$current_date = date("m/d/Y", $today_date);
							$result= mysql_query("SELECT registration_email FROM registration WHERE registration_email='$registration_email'");
							if (mysql_num_rows($result) > 0)
							{
							 // header("Location: register.php?status=3");
								// header("Location: register.php");
								 // exit();
							 echo "<h1 style='margin-bottom: 22px;text-align: center;'>Already Email Exit Please Enter New Email</h1>";
							}
							else 
							{
						
							 	$sql   = "insert into registration(registration_name,registration_email,registration_password,registration_type,registration_insert_date,registration_status) values('".$registration_name."','".$registration_email."','".$registration_password."','".$registration_type."','".$current_date."','pending')";
							$query = mysql_query($sql);
							if($query)
								{
									echo "<h1 style='line-height: 30px;text-align: center;margin-bottom: 52px;'> Thank you for registering, our moderators would approve your account and keep you posted. Please check your email in the next 12-24 hrs.</h1>";
																	
											/*$mg_api = 'key-4vyeldmso9oe3t8gitphksdwz9p0tpw5';
											$mg_version = 'api.mailgun.net/v2/';
											$mg_domain = "staging.cio-choice.sg";
											$mg_from_email = "info@samples.com";
											$mg_message_url = "https://".$mg_version.$mg_domain."/messages";
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
											curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
											curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
											curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt ($ch, CURLOPT_VERBOSE, 0);
											curl_setopt ($ch, CURLOPT_HEADER, 1);
											curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
											curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
											curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
											curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $mg_api);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_POST, true);
											//curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
											curl_setopt($ch, CURLOPT_HEADER, false);
											//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
											curl_setopt($ch, CURLOPT_URL, $mg_message_url);
											curl_setopt($ch, CURLOPT_POSTFIELDS,               
													array(  'from'      => '<' . $from . '>',
															'to'        => $registration_email,
															'subject'   => $subject.time(),
															'text'      => $message

														));
											$result = curl_exec($ch);
											curl_close($ch);
											$res = json_decode($result,TRUE);*/
											
								$to = $registration_email ;					
								$subject = "Registration";
								$message = '<!doctype html>
									<html>
									<head>
									<meta charset="utf-8">
									<title>Tour bookings</title>
									<style>
									body { margin:0px; padding:0px;}
									</style>
									</head>

									<body>
										<div>email message here </div>
									</body>
									</html>';								
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									$headers .= 'To: '.$registration_email.'' . "\r\n";
									$headers .= 'From: apache@iamamol.com' . "\r\n";					
									mail( $to, $subject, $message, $headers );
		// echo "confirm tour Deposit";
									
								}
								else 
								{
									echo "error";
								}
							
							}
								// $sql   = "insert into registration(registration_name,registration_email,registration_type,registration_insert_date,registration_status) values('".$registration_name."','".$registration_email."','".$registration_type."','".$current_date."','pending')";
						
								
							// $_POST['Submit'] = "Submit2";

						}
						// else {
					
					

						?>
        <form class="register-form" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
          <div class="black-box">
            <h2>1 <span>Select which you are...</span></h2>
            
            <div class="radio">
                <div class="form-radio radio1">
                <input id="male" type="radio" name="Which_You_Are" value="CIO" required>
                <label for="male">CIO</label>
                </div>
                
                <div class="form-radio radio2">
                <input id="female" type="radio" name="Which_You_Are" value="ICTVendor" required>
                <label for="female">ICT Vendor</label>
                </div>
                
            </div>
            <!--radio-->
            
            </div>
            <!--black-box-->
            
          <div class="black-box black-box2">
            <h2>2 <span>Which way...</span></h2>
            
            <div class="radio">
                <div class="form-radio radio3">
                <input id="corporate-email" type="radio" name="Which_Way" value="email">
                <label for="corporate-email">Corporate Email</label>
                </div>
                
                <div style="display:none;" class="form-radio radio4">
                <input id="linkedin" type="radio" name="Which_Way" value="Linkedin">
                <label for="linkedin">Linkedin</label>
                </div>
                
            </div>
            <!--radio-->
            
            </div>
            <!--black-box-->
            		<div class="clear"></div>
          
          
          <div class="red-box">
          	<h2>3 <span>Send us your details...</span></h2>			
            <div class="form-row">
                    Name <input name="name" type="text" required>
                    Email <input style="margin-right:0;" name="email" type="email" class="no-margin" required>
            </div>
            <!--form-row-->
                
            <div class="form-submit">
                <input name="Submit" type="image" value="Submit" src="images/register/send-button.png">
            </div>
            <!--form-row-->
                
        </div>
        <!--red-box-->
          	
                    
            
        </form>
        <?php
		// }
		?>
    </div>
    <!--register-page-->
</div>
<!--wrapper-->                                            
                                           
                                            <?php   include('quick_contact.php');
                                                    include('footer.php');
                                              ?>                                   
                                            

 

    <!-- Google CDN jQuery with fallback to local 
	<script type="text/javascript" src="js/jquery.min.js"></script>-->
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
