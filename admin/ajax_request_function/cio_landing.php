<?php
session_start();
   include('sql_config/database/cio_db.php');
if (isset($_SESSION['username']) && isset($_SESSION['cio']))
{
    $name = $_SESSION['user_name'];
    $type = $_SESSION['cio'];
		if (isset($_SESSION['corperate_email'])) {
		
		$corperate_email = $_SESSION['corperate_email'];
		$disnone="";
	$login_type_linkedin="";
		 $login_type_result = mysql_query("SELECT login_type FROM registration WHERE corperate_email ='$corperate_email'");
                                    while ($login_type_row = mysql_fetch_array($login_type_result))
                                    {
                                        $login_type_linkedin = $login_type_row['login_type'];
                                       
									}
									if($login_type_linkedin == 'Linkedin')
									{
										$disnone = 'none';
									}
									else {
									$disnone = 'block';
									}
	
}
} else
{
    header('Location: login.php');
}
?> 

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cio Choice</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/rcarousel.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <link href="css/tinycarousel.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.tinycarousel.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // alert('okk');
                $("#slider5").tinycarousel({
                    axis: "y"
                });
            });
        </script>
		
			<script type="text/javascript">
		$(document).ready(function(){
			
				$('.change_pass').click(function(){
				
				var old_pass = $('.old_pass').val();
				var new_pass = $('.new_pass' ).val();
				var re_pass = $( '.re_pass' ).val();

				$.ajax({
						type: 'post',
						url: 'ajax_change_password.php',
						data: {old_pass:old_pass,new_pass:new_pass,re_pass:re_pass,},
 
						success: function(mesg) {
							alert(mesg);
							$('.mesg').empty().append(mesg);
							 // $('#photo_detail').append(mesg);

						}

				});

			});		
			/*$('.keyup-email-2').keyup(function() {
				$('span.error-keyup-8').remove();
				var inputVal = $(this).val();
				var emailFreeReg= /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)(?!aol.com)([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailFreeReg.test(inputVal)) {
					$(this).after('<span style="position: absolute;height: 22px;margin-left: -38px;margin-top: 45px;color: #F00;" class="error error-keyup-8">No Free Email Addresses.</span>');
					// $('.enter_form_send').hide();
					 // $(".enter_form_send").prop('disabled', 'true');
				}
				else { 
				// $('.enter_form_send').show();
				 // $(".enter_form_send").prop('disabled', 'false');
				}
			});*/
			
			
		});
	</script>
<script type="text/javascript">
$(document).ready(function(){
 
     $(".logincontainer").click(function () {
 
     $(".logbar").toggle("slow");
 
  });
	
});
</script>
        <style type="text/css">
            #container {
                width:918px;
                position: relative;
                margin: 0 auto;
                background:#e73535;
            }

            #carousel {
                width:918px;
                margin: 0 auto;
            }

            #ui-carousel-next, #ui-carousel-prev {
                width: 60px;
                height:60px;
                background: url(images/arrow-left.png) #fff center center no-repeat;
                display: block;
                position: absolute;
                top: 0;
                z-index: 100;
            }

            #ui-carousel-next {
                right: 0;
                top:45%;
                background-image: url(images/arrow-right.png);
            }

            #ui-carousel-prev {
                left: 0;
                top:45%;
            }

            #ui-carousel-next > span, #ui-carousel-prev > span {
                display: none;
            }

            .slide {
                margin: 0;
                position: relative;
            }

            .slide  h1 {
                font: 45px/1 'Source Sans Pro';	
                color: #fff;
                font-weight:bold;
                margin:83px 0px 0px 140px;
                height:auto;
                line-height:50px;
                padding: 0;
                width:630px;
                text-transform:uppercase;
            }

            .slide  p {
                font: 45px/1 'Source Sans Pro';	
                color: #fff;
                font-weight:300;
                margin:83px 0px 0px 140px;
                height:auto;
                line-height:50px;
                padding: 0;
                width:630px;
                text-align:center;
                text-transform:uppercase;
            }

            #slide01 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide01 > .text {
                position: absolute;
                left:0px;
                top: 115px;
            }

            #slide02 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide02 > .text {
                position: absolute;
                left:0px;
                top:115px;
            }

            #slide03 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide03 > .text {
                position: absolute;
                left:0px;
                top:115px;
            }

            #slide04 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide04 > .text {
                position: absolute;
                left:0px;
                top:115px;
            }

            #slide05 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide05 > .text {
                position: absolute;
                left:0px;
                top:115px;
            }

            #slide06 > img {
                position: absolute;
                top:45px;
                right:200px;
            }

            #slide06 > .text {
                position: absolute;
                left:0px;
                top:115px;
            }

            #pages {
                bottom: 25px;
                left: 400px;
                margin: 0 auto;
                position: absolute;
                width: 150px;
            }

            .bullet {
                background: url(images/page-off.png) center center no-repeat;
                display: block;
                width: 18px;
                height: 18px;
                margin: 0;
                margin-right: 5px;
                float: left;				
            }

        </style>
<style type="text/css">
.logout a:hover {
    color: #ADADAD!important;
	
	}
</style>

    <script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                //alert('developer');
                $('#tab-container').easytabs(); 
				
            });
        </script> 


    </head>

    <body>
        <?php
        // include('sql_config/database/cio_db.php');
        include('top_header.php');
        ?>


        <div id="shadow_wrapper"></div>
        <div id="black_wrapper">
            <div class="inner_nav">
                <?php include('navigation.php'); ?>
            </div>
        </div>
        <div id="advisory_wrapper">
            <div class="landing_head" style="margin-top:0px;">
                <p><img src="images/Landing_logo.jpg" width="240" height="238"></p>
                <h1>Hi</h1>
                <h2><?php echo $name; ?><strong style="color:#20201f;">,</strong> </h2>
                <h3>Welcome to CIO CHOICE <span>SINGAPORE</span></h3>
            </div>
        </div>
        <div id="cio_area">
            <div class="landing_head" style="margin-top:0px;height:50px;">
                <div class="cio_area_head fl">
                    <div class="cio_area fl">
                        <h6><img src="images/cio_area_icon.jpg" width="41" height="34">  THE CIO area</h6>
                    </div>

                    <!--<div class="logout fr">
                        <a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
                    </div>-->
						<div style="width:115px;display:<?php echo $disnone; ?>;" class="logout fr">
                     <!--   <a href="change_password_ict.php">changePassword</a>-->
						<a class="logincontainer"><img src="images/change_pass_icon.png" width="22" height="25">Password</a>
						  
					<div class="logbar  change_pass_wrraper" style="display: none;">
						
						                      
						<div style="" class="">
							<label>Old Password:</label>
							<input name="old"  class="old_pass" type="password" required>
							<label>New Password:</label>
							<input name="new"  class="new_pass" type="password" required>
							<label style="width:180px;">Confirm New Password:</label>
							<input name="retype"  class="re_pass" type="password" required>
																				
							<input name="Submit" class="change_pass" value="Submit" type="submit">
							<span style="color:red" class="mesg"></span>
						</div>
					</div>
                    </div> 

                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div id="advisory_wrapper">
            <div class="get_in_touch mrgn_top">
                <div id="tab-container">  
			  <ul class='etabs' style="width:100%;">
				<li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab1">NOTICES</a></li>
				<li class='tab'><a href="#tab2" class="mrgn">REQUEST THE SURVEY</a></li>
			  </ul>
			<?php
			  if(isset($_REQUEST['add']))
											{
											echo '<div class="your_register">
                                                    	<h1>Your Registration form will be <span>emailed to you to be stamped</span>, <span>signed</span> and <span>authorized</span> by a representative of the company. </h1>
                                                        <p>Please return your a scanned copy to <a href="#">registration@cio-choice.sg</a>.</p>
                                                    </div><br /><br />';
											}
			  ?>
				<div id="tab1"  style="height: auto;width: auto;" class="content three_tabs fl">
						 <div class="online_voting_main fl">
                    <div class="online_voting fl">
                        <!--carousel start-->
                        <div id="container">
                            <div id="carousel">
           
                            <?php $slide = mysql_query("select * from cio_landing");  ?>
                            <?php  while ($row = mysql_fetch_array($slide)): ?>
                                <div id="slide01" class="slide">
                                    <div class="text">
                                        <h1> <?php echo $row['title'] ?></h1>
                                        <p> <?php echo $row['description'] ?></p>
                                    </div>
                                    <img src="admin/<?php echo $row['path'] ?>" alt="" border="0" />
                                </div>
							<?php endwhile;?>	

                            </div>
                            <div id="pages"></div>
                        </div>
                        <!--carousel end-->
                    </div>
                    <div class="news fl">
                        <h1>News</h1>
                        <div id="slider5">
                            <a class="prev" href="#"></a>
                            <div class="viewport">
                                <ul class="overview">


                                    <?php
                                    $result2 = mysql_query("SELECT * FROM news");
                                    while ($row2 = mysql_fetch_array($result2))
                                    {
                                        $title = $row2['news_title'];
                                        if (strlen($title) > 30)
                                        {
                                            $stringCut = substr($title, 0, 30);
                                            $title = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                        }
                                        $description = $row2['news_description'];
                                        if (strlen($description) > 50)
                                        {
                                            $stringCut = substr($description, 0, 100);
                                            $description = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                        }
                                        //echo '<a style="line-height:22px;" href="view_news.php?id='.$row2['news_id'].'" target="_blank">'.$title.'</a>';
                                        echo '<li><div class="news_detail fl">';
                                        echo '<h2>' . $title . '</h2>';
                                        echo '<h3>' . $row2['news_inserted_date'] . '</h3>';
                                        echo '<p>' . $description . '<a href="view_news.php?id=' . $row2['news_id'] . '" target="_blank">read more</a></p>';
                                        echo '</div></li>';
                                    }
                                    ?>        
                                </ul>
                            </div>
                            <a class="next" href="#"></a>
                        </div> 
                    </div>
                    <div class="message_board fr">
                        <h2><img src="images/message_icon.jpg" width="29" height="32">Message Board</h2>
                        <span><img src="images/double_dot1.jpg" width="24" height="18"></span>
                        <p>We have an <a href="upcoming_events.php" style="text-decoration:underline; color:#fff;">up and coming event</a> planned for the 30th February: THE CIO CHOICE Red Carpet Night 2014! To get the latest information, please get in touch and we’ll keep you posted.<br>
                        <br>
                        We hope to see you there.<br>
                        <br>
                        <strong>The CIO CHOICE team</strong><img style="float:right; margin:9px 280px 0px 0px;" src="images/double_dot2.jpg" width="24" height="18"></p>
                    </div>
                </div>
                                                            
				</div><!--tab1 close--> 
															  
				<div id="tab2"  style="height: auto;width: auto;" class="content three_tabs fl">
						<?php
						function send_email() {
							require '../classes/PHPMailer-master/PHPMailerAutoload.php';
 // Matthew.Harper@day7.co
				$mail = new PHPMailer;
				 
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'ciochoice.sg@gmail.com';                   // SMTP username
				$mail->Password = '9cXWOqeaf';               // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
				$mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
				$mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');   //Set an alternative reply-to address
				// $mail->addAddress('developer@day7.co', 'developer devday7');  // Add a recipient
				$mail->addAddress($corperate_email);               // Name is optional 
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
				$mail->WordWrap = 500;                                 // Set word wrap to 50 characters
				// $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
				// $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				 
				$mail->Subject = 'Survey';
				$mail->Body    = '<div style=" height:100%; padding:25px;">
									<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
										<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
											<div style=" width:210px;height: 225px; margin:0 auto;">
												<a href="#" style="height:245px;">
													<img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="222">
												</a>
												<div style="clear:both;"></div>
											</div>
										</div>
										<div style="width:100%; height:65px; float:left; background:#20201f;">
											<div style=" width:115px;text-align:center; float:left;">
												<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">
													home
												</a>
											</div>
											
											<div style="float:right; margin:15px 20px 0px 0px;">
												<a href="'.$web_url.'/auth.php" style="width:117px; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div>
										</div>
										<div style="width:100%; float:left; padding:20px 0px; text-align:center;">
											<h1 style=" float:left; width:90%;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">
												Thanks for Registering, you have been accepted as an '.$registration_type.' Member!
											</h1>
											<p style=" float:left; width:90%; display:block; font-family:Source Sans Pro; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
												Let&acute;s get started straight away, here are your login details to access the exclusive CIO CHOICE '.$registration_type.' AREA:
											</p>
										</div>
										<div style="width:98.5%; float:left; background:#20201f; margin-left:10px; ">
											<div style=" float:left; width:256px; text-decoration:none; line-height:55px; font-family: Lato; color:#FFF; font-size:14px; font-weight:400; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px;">
												<img style="float:left; margin:10px 10px 0px 15px;" src="'.$web_url.'/images/cio_area_icon.jpg" width="41" height="34">
												YOUR ACCOUNT dETails
											</div> 
												
											<div style="float:right; margin:10px 20px 15px 0px;">
												<a href="'.$web_url.'/auth.php?email='.$registration_email.'" style="width:117px; line-height:35px; float:left; text-shadow:0px 2px #4b0e0e; color:#FFF;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
												<img src="'.$web_url.'/images/login_icon_1.png" width="18" height="24" style="margin: 6px 10px 0 13px; float:left;">
													Login
												</a>
											</div> 
										</div>
										<div style="float:left; border-left:#CCC solid 1px; border-right:#CCC solid 1px; border-bottom:#CCC solid 1px; width:96.9%; padding:0px 10px 10px 10px; margin-left:10px">
											<div style=" float:left; width:100%; border-bottom:#EAEAEA solid 1px; text-decoration:none; line-height:65px; font-family: Lato; color:#20201f; font-size:18px; font-weight:bold; letter-spacing:1px; margin:0px;">
												<br />
												<a href="'.$web_url.'/auth.php?email='.$registration_email.'" target="_blank">
													<img src="'.$web_url.'/images/linkedin_btn.png" width="410" height="70">
												</a> 
											</div>
											
											
											
									  </div>
										<div style="float:left; width:100%;">
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
										<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
										</div>
										<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
										<div style="width:60%; float:left; height:80px;">
												<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
												<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161">Need help?</span>
											  <a href="'.$web_url.'/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family:Source Sans Pro; color:#616161;">Send us your question</a>
										  </div>
										<div style="width:170px; float:right; margin-top:22px;">
											<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/linkedin.png"></a>
											<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/twitter.png"></a>
											<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/google_plus.png"></a>
											<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/facebook.png"></a>
											<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/play.png"></a>
										</div>
										
										<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
											<div style="float:left; margin:0px; width:96%;">
											  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																						
												<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																						
												<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																						
												<li style="	float:left; list-style-type: none; margin:0px;"><a href="#" style="float:left; font-family:Source Sans Pro; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
											  </ul>
											  <p style=" float:left; font-family:Source Sans Pro; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright © 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
										  </div>
										</div>
										  
									  </div>
									  
										
										
									</div>
									
									<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161;  font:Lato; font-family:Arial, Helvetica, sans-serif; font-weight:400px;">
									This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
									
									<div style="clear:both;"></div> 
							</div>';
				$mail->AltBody = 'hi developer how r u?';
				 
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
				 
				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				echo"Email Send Successfull";
						}
						?>

                    <div class="online_voting_main fl">
														<!--
														<div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=R7gdr4H4ovq9Y_2bo2OYufQw_3d_3d"> </script></div>Create your free online surveys with <a href="https://www.surveymonkey.com">SurveyMonkey</a> , the world's leading questionnaire tool.</div>
														-->
														<div class="online_survey fl">
                                                        	<div class="send_btn fl"><a href="" onclick="send_email()" ><img src="images/send_survey.png" width="263" height="263"></a></div>
                                                            <div class="online_survey_text fl">
                                                            	<h1>CIO CHOICE <span>ONLINE SURVEY</span></h1>
                                                                <p>To request the survey, or if you would like to be re-sent a reminder </p>
                                                             <a href=""> <h2>HIT THE &acute;<span>SEND ME THE SURVEY</span>&acute; BUTTON</a></h2>
                                                              <p>and we’ll have it delivered to your registered email address<br><br>
                                                                <strong>Registered Email Address: <a href="#" style="color:red;"><?php echo $corperate_email;?></a></strong></p>
                                                          </div>
                                                        </div>
                                                        <div class="having_problems fl">
                                                        	<h3>Having Problems with your Survey?</h3>
                                                            <p>Please feel free to get in touch by emailing <a href="#" style=" color:#616161; font-weight:bold; text-decoration:underline;">survey@cio-choice.sg</a></p>
                                                        </div>

												 </div>
														
				</div><!--tab2 close-->
			</div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php
        include('quick_contact.php');
        include('footer.php');
        ?>    




        <!--
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/scripts.js"></script> -->



        <!-- Google CDN jQuery with fallback to local -->
        <!--<script type="text/javascript" src="js/jquery.min.js"></script>
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
    
    <script>
    $("#accordion > li").click(function(){
      $("#accordion li").removeClass("active");
            $(this).addClass("active");
        if(false == $(this).next().is(':visible')) {
            $('#accordion > ul').slideUp(300);
        }
        $(this).next().slideToggle(300);
    });
    
    $('#accordion > ul:eq(0)').show();
    
    </script> -->

        <!--<script type="text/javascript" src="js/jquery-1.7.1.js"></script>--> 
        <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jquery.ui.rcarousel.js"></script>
        <script type="text/javascript">
        jQuery(function($) {
            function generatePages() {
                var _total, i, _link;

                _total = $("#carousel").rcarousel("getTotalPages");

                for (i = 0; i < _total; i++) {
                    _link = $("<a href='#'></a>");

                    $(_link)
                            .bind("click", {page: i},
                            function(event) {
                                $("#carousel").rcarousel("goToPage", event.data.page);
                                event.preventDefault();
                            }
                            )
                            .addClass("bullet off")
                            .appendTo("#pages");
                }

                // mark first page as active
                $("a:eq(0)", "#pages")
                        .removeClass("off")
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");

            }

            function pageLoaded(event, data) {
                $("a.on", "#pages")
                        .removeClass("on")
                        .css( "background-image", "url(images/page-off.png)");

                $("a", "#pages")
                        .eq(data.page)
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");
            }

            $("#carousel").rcarousel(
                    {
                        visible: 1,
                        step: 1,
                        speed: 700,
                        auto: {
                            enabled: true
                        },
                        width: 918,
                        height: 358,
                        start: generatePages,
                        pageLoaded: pageLoaded
                    }
            );

            $( "#ui-carousel-next")
                    .add("#ui-carousel-prev")
                    .add( ".bullet")
                    .hover(
                            function() {
                                $(this).css( "opacity", 0.7);
                            },
                            function() {
                                $(this).css( "opacity", 1.0);
                            }
                    );
        });
        </script>


    </body>
</html>
